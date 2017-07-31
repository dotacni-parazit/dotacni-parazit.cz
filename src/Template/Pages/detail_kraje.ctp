<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;

$this->set('title', $kraj->krajNazev . ' - Detail Kraje');
?>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th>Vlastnost</th>
        <th>Hodnota</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Kód Kraje</td>
        <td><?= $kraj->krajKod ?></td>
    </tr>

    <tr>
        <td>Název Kraje</td>
        <td><?= $kraj->krajNazev ?></td>
    </tr>

    <tr>
        <td>Platnost Od</td>
        <td><?= $kraj->zaznamPlatnostOdDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Platnost Do</td>
        <td><?= $kraj->zaznamPlatnostDoDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Odkaz CEDR-III</td>
        <td><?= $this->Html->link($kraj->id) ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td>Hodnota</td>
    </tr>
    </tfoot>
</table>

<hr/>
<h2>Okresy v kraji (dle CEDR)</h2>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th data-type="html">Okres</th>
        <th data-type="currency" style="text-align: right;">Součet rozhodnutí</th>
        <th data-type="currency" style="text-align: right;">Součet spotřebovaných</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($okresy as $o) { ?>
        <?php

        $cache_tag_okres_soucet = 'soucet_okres_' . sha1($o->okresKod);
        $cache_tag_okres_soucet_spotrebovano = 'soucet_okres_spotrebovano_' . sha1($o->okresKod);

        $soucet_okres = Cache::read($cache_tag_okres_soucet, 'long_term');
        $soucet_okres_spotrebovano = Cache::read($cache_tag_okres_soucet_spotrebovano, 'long_term');
        ?>
        <tr>
            <td><?= $this->Html->link($o->okresNazev, '/detail-okres/' . $o->okresKod) ?></td>
            <td style="text-align: right;"><?= $this->Html->link(Number::currency($soucet_okres), '/detail-okres/' . $o->okresKod) ?></td>
            <td style="text-align: right;"><?= $this->Html->link(Number::currency($soucet_okres_spotrebovano), '/detail-okres/' . $o->okresKod) ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Okres</td>
        <td style="text-align: right;">Součet rozhodnutí</td>
        <td style="text-align: right;">Součet spotřebovaných</td>
    </tr>
    </tfoot>
</table>