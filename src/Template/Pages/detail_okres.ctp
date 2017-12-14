<?php

use Cake\Cache\Cache;
use Cake\I18n\Number;

$this->set('title', $okres->okresNazev);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#obce">Obce v okresu (dle CEDR)</a></li>
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
                <td><?= $this->Html->link($okres->Kraj->krajNazev, '/detail-kraje/' . $okres->Kraj->krajKod) ?></td>
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
    </div>
    <div id="obce">
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
    </div>
    <div id="historie">
        <h2>Historie Okresu v evidenci CEDR</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název Okresu</th>
                <th data-type="date">Platnost Od</th>
                <th data-type="date">Platnost Do</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($historie as $h) { ?>
                <tr>
                    <td><?= $h->okresNazev ?></td>
                    <td><?= date('d. m. Y', $h->zaznamPlatnostOdDatum->timestamp) ?></td>
                    <td><?= date('d. m. Y', $h->zaznamPlatnostDoDatum->timestamp) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název Okresu</td>
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
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>