<?php

use Cake\I18n\Number;

$this->set('title', $stat->statNazevZkraceny . ' - Detail Státu');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#historie">Historie státu v evidenci CEDR</a></li>
        <li><a href="#biggest">100 nejvyšších rozhodnutí</a></li>
    </ul>
    <div id="obecne">
        <h2>Obecné informace</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Vlastnost</th>
                <th>Hodnota</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Název úplný (CZ)</td>
                <td><?= $stat->statNazev ?></td>
            </tr>
            <tr>
                <td>Název zkrácený (CZ)</td>
                <td><?= $stat->statNazevZkraceny ?></td>
            </tr>
            <tr>
                <td>Název úplný (EN)</td>
                <td><?= $stat->statNazevEn ?></td>
            </tr>
            <tr>
                <td>Název zkrácený (EN)</td>
                <td><?= $stat->statNazevZkracenyEn ?></td>
            </tr>
            <tr>
                <td>Kód Státu (3 znaky)</td>
                <td><?= $stat->statKod3Znaky ?></td>
            </tr>
            <tr>
                <td>Kód Státu (3 čísla)</td>
                <td><?= $stat->statKod3Cisla ?></td>
            </tr>
            <tr>
                <td>Kod Státu omezený</td>
                <td><?= $stat->statKodOmezeny ?></td>
            </tr>
            <tr>
                <td>Platnost Od</td>
                <td><?= $stat->zaznamPlatnostOdDatum->year ?></td>
            </tr>
            <tr>
                <td>Platnost Do</td>
                <td><?= $stat->zaznamPlatnostDoDatum->year ?></td>
            </tr>
            <tr>
                <td>Odkaz CEDR</td>
                <td><?= $this->Html->link($stat->id) ?></td>
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
        <h2>Historie Státu v evidenci CEDR</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název Státu</th>
                <th data-type="date">Platnost Od</th>
                <th data-type="date">Platnost Do</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($historie as $h) { ?>
                <tr>
                    <td><?= $h->statNazev ?></td>
                    <td><?= date('d. m. Y', $h->zaznamPlatnostOdDatum->timestamp) ?></td>
                    <td><?= date('d. m. Y', $h->zaznamPlatnostDoDatum->timestamp) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název Státu</td>
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
                    <td><?= $this->Html->link($b->Dotace->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $b->Dotace->idPrijemce) ?></td>
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