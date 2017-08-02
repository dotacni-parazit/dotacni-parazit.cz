<?php

use Cake\I18n\Number;

$this->set('title', $obec->obecNazev . ' - Detail Obce');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#historie">Historie kraje v evidenci CEDR</a></li>
        <li><a href="#biggest">100 nejvyšších rozhodnutí</a></li>
    </ul>
    <div id="obecne">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Vlastnost</th>
                <th>Hodnota</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Kód Obce</td>
                <td><?= $obec->obecKod ?></td>
            </tr>
            <tr>
                <td>Kód NUTS</td>
                <td><?= $obec->obecNutsKod ?></td>
            </tr>

            <tr>
                <td>Název Obce</td>
                <td><?= $obec->obecNazev ?></td>
            </tr>

            <tr>
                <td>Platnost Od</td>
                <td><?= $obec->zaznamPlatnostOdDatum->nice() ?></td>
            </tr>

            <tr>
                <td>Platnost Do</td>
                <td><?= $obec->zaznamPlatnostDoDatum->nice() ?></td>
            </tr>

            <tr>
                <td>Nadřazený Okres</td>
                <td><?= $this->Html->link($obec->Okres->okresNazev, '/detail-okres/' . $obec->Okres->okresKod) ?></td>
            </tr>

            <tr>
                <td>Odkaz CEDR-III</td>
                <td><?= $this->Html->link($obec->id) ?></td>
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
    <div id="historie">
        <h2>Historie Obce v evidenci CEDR</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název Obce</th>
                <th data-type="date">Platnost Od</th>
                <th data-type="date">Platnost Do</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($historie as $h) { ?>
                <tr>
                    <td><?= $h->obecNazev ?></td>
                    <td><?= date('d. m. Y', $h->zaznamPlatnostOdDatum->timestamp) ?></td>
                    <td><?= date('d. m. Y', $h->zaznamPlatnostDoDatum->timestamp) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název Obce</td>
                <td>Platnost Od</td>
                <td>Platnost Do</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="biggest">
        <table class="datatable datatable_simple">
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
            <?php foreach ($biggest as $b) { ?>
                <?php
                $b = (object)$b;
                $b->Dotace = (object)$b->Dotace;
                $b->Dotace->PrijemcePomoci = (object)$b->Dotace->PrijemcePomoci;
                $b->RozpoctoveObdobi = (object)$b->RozpoctoveObdobi;

                $dotace_nazev = (empty($b->Dotace->projektNazev) ? $b->Dotace->projektIdnetifikator : $b->Dotace->projektNazev);
                ?>
                <tr>
                    <td><?= $this->Html->link('[R]', '/detail-rozhodnuti/' . $b->idRozhodnuti) ?></td>
                    <td><?= $this->Html->link($dotace_nazev, '/detail-dotace/' . $b->Dotace->idDotace) ?></td>
                    <td><?= $this->Html->link($b->Dotace->PrijemcePomoci->obchodniJmeno, '/detail-dotace/' . $b->Dotace->idPrijemce) ?></td>
                    <td class="text-right"><?= Number::currency($b->castkaRozhodnuta) ?></td>
                    <td class="text-right"><?= isset($b->RozpoctoveObdobi->castkaSpotrebovana) ? Number::currency($b->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A' ?></td>
                    <td><?= isset($b->RozpoctoveObdobi->rozpoctoveObdobi) ? $b->RozpoctoveObdobi->rozpoctoveObdobi : 'N/A' ?></td>
                </tr>
            <?php } ?>
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