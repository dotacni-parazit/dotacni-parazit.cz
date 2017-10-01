<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;

$this->set('title', $kraj->krajNazev);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#okresy">Okresy v kraji</a></li>
        <li><a href="#historie">Historie kraje v evidenci CEDR</a></li>
        <li><a href="#biggest">Dotační Rozhodnutí</a></li>
    </ul>
    <div id="obecne">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
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
    </div>
    <div id="okresy">
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
    </div>
    <div id="historie">
        <h2>Historie Kraje v evidenci CEDR</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název kraje</th>
                <th data-type="date">Platnost Od</th>
                <th data-type="date">Platnost Do</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($historie as $h) { ?>
                <tr>
                    <td><?= $h->krajNazev ?></td>
                    <td><?= date('d. m. Y', $h->zaznamPlatnostOdDatum->timestamp) ?></td>
                    <td><?= date('d. m. Y', $h->zaznamPlatnostDoDatum->timestamp) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název kraje</td>
                <td>Platnost Od</td>
                <td>Platnost Do</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="biggest">
        <div>Až 20.000 rozhodnutí</div>
        <hr/>
        <table class="datatable" data-ajax="<?= $this->request->here(false) ?>">
            <thead>
            <tr>
                <th data-type="html">Rozhodnutí</th>
                <th data-type="html">Název Dotace</th>
                <th data-type="html">Příjemce pomoci</th>
                <th data-type="currency" class="text-right">Částka rozhodnuta</th>
                <th data-type="currency" class="text-right">Částka spotřebovaná</th>
                <th data-type="number">Rok</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
                <td>Rozhodnutí</td>
                <td>Název Dotace</td>
                <td>Příjemce pomoci</td>
                <td>Částka rozhodnuta</td>
                <td>Částka spotřebovaná</td>
                <td>Rok</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>