<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;

$this->set('title', $okres->okresNazev . ' - Detail Okresu');
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
        <td>Kód Okresu</td>
        <td><?= $okres->okresKod ?></td>
    </tr>

    <tr>
        <td>Kód NUTS</td>
        <td><?= $okres->okresNutsKod ?></td>
    </tr>

    <tr>
        <td>Název Okresu</td>
        <td><?= $okres->okresNazev ?></td>
    </tr>

    <tr>
        <td>Platnost Od</td>
        <td><?= $okres->zaznamPlatnostOdDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Platnost Do</td>
        <td><?= $okres->zaznamPlatnostDoDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Nadřazený Kraj</td>
        <td><?= $this->Html->link($okres->Kraj->krajNazev, '/detail-kraj/' . $okres->Kraj->krajKod) ?></td>
    </tr>

    <tr>
        <td>Odkaz CEDR-III</td>
        <td><?= $this->Html->link($okres->id) ?></td>
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
<h2>Obce v okresu (dle CEDR)</h2>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th data-type="html">Obec</th>
        <th data-type="currency" style="text-align: right;">Součet rozhodnutí</th>
        <th data-type="currency" style="text-align: right;">Součet spotřebovaných</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($obce as $o) { ?>
        <?php
        $cache_tag_obec_soucet = 'obec_soucet_' . sha1($o->obecKod);
        $cache_tag_obec_soucet_spotrebovano = 'obec_soucet_spotrebovano_' . sha1($o->obecKod);

        $obec_soucet = Cache::read($cache_tag_obec_soucet, 'long_term');
        $obec_soucet_spotrebovano = Cache::read($cache_tag_obec_soucet_spotrebovano, 'long_term');
        ?>
        <tr>
            <td><?= $this->Html->link($o->obecNazev, '/detail-obce/' . $o->obecKod) ?></td>
            <td style="text-align: right;"><?= $this->Html->link(Number::currency($obec_soucet), '/detail-obce/' . $o->obecKod) ?></td>
            <td style="text-align: right;"><?= $this->Html->link(Number::currency($obec_soucet_spotrebovano), '/detail-obce/' . $o->obecKod) ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Obec</td>
        <td style="text-align: right;">Součet rozhodnutí</td>
        <td style="text-align: right;">Součet spotřebovaných</td>
    </tr>
    </tfoot>
</table>