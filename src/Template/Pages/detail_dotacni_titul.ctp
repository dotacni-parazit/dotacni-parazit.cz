<?php

use Cake\I18n\Number;

$this->set('title', $titul->dotaceTitulNazev . ' - Dotační Titul');
$props = [
    "dotaceTitulKod" => "Kód Dotačního Titulu",
    "dotaceTitulVlastniKod" => "Vlastní kód Dotačního Titulu",
    "statniRozpocetKapitolaKod" => "Kód kapitoly státního rozpočtu",
    "dotaceTitulNazev" => "Název Dotačního Titulu",
    "dotaceTitulNazevZkraceny" => "Zkrácený název Dotačního Titulu",
    "zaznamPlatnostOdDatum" => "Začátek platnosti",
    "zaznamPlatnostDoDatum" => "Konec platnosti"
];

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#historie">Historie Dotačního Titulu</a></li>
        <li><a href="#rozhodnuti">Rozhodnutí / Dotace</a></li>
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
            <?php foreach ($props as $key => $val) { ?>
                <tr>
                    <td><?= $val ?></td>
                    <td><?= $titul->{$key} ?></td>
                </tr>
            <?php } ?>

            <tr>
                <td>Kapitola Státního Rozpočtu</td>
                <td><?= $this->Html->link(
                        $titul->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaNazev
                        . " (" . $titul->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod . ")",
                        "/podle-poskytovatelu/" . $titul->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod) ?></td>
            </tr>

            <tr>
                <td>Ukazatel Státního Rozpočtu</td>
                <td><?= $this->Html->link(
                        $titul->StatniRozpocetUkazatel->StatniRozpocetUkazatel->statniRozpocetUkazatelNazev
                        . " (" . $titul->StatniRozpocetUkazatel->StatniRozpocetUkazatel->statniRozpocetUkazatelKod . ")",
                        "/kapitoly-statniho-rozpoctu-ukazatele/" . $titul->StatniRozpocetUkazatel->StatniRozpocetUkazatel->zaznamPlatnostOdDatum->year . "/"
                        . $titul->StatniRozpocetUkazatel->StatniRozpocetUkazatel->statniRozpocetUkazatelKod) ?></td>
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
        <h2>Historie dotačního titulu</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Rok</th>
                <th>Název Dotačního Titulu</th>
                <th data-type="currency" style="text-align: right;">Součet Rozhodnutí</th>
                <th data-type="currency" style="text-align: right;">Součet Spotřebovaných částek</th>
                <th>Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($roky as $r) { ?>
                <tr>
                    <td><?= $r->zaznamPlatnostOdDatum->year . ' - ' . $r->zaznamPlatnostDoDatum->year ?></td>
                    <td><?= $r->dotaceTitulNazev ?></td>
                    <td style="text-align: right;"><?= Number::currency($soucty[$r->idDotaceTitul]['soucetRozhodnuto']) ?></td>
                    <td style="text-align: right;"><?= Number::currency($soucty[$r->idDotaceTitul]['soucetSpotrebovano']) ?></td>
                    <td><?= $this->Html->link('Otevřít', '/detail-dotacni-titul/' . $titul->dotaceTitulKod . '/rok/?id=' . $r->idDotaceTitul) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Rok</td>
                <td>Název Dotačního Titulu</td>
                <th style="text-align: right;">Součet Rozhodnutí</th>
                <th style="text-align: right;">Součet Spotřebovaných částek</th>
                <th>Otevřít</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="rozhodnuti">
        <h2>Až 5.000 nejvyšších rozhodnutí/dotací</h2>
        <table id="datatable">
            <thead>
            <tr>
                <th data-type="html" class="nosearch medium-1 large-1">Rozhodnutí</th>
                <th data-type="html">Dotace</th>
                <th data-type="html">Jméno příjemce</th>
                <th class="medium-1 large-1">Rozpočtové Období</th>
                <th data-type="currency" class="nosearch" style="text-align: right;">Částka rozhodnutá</th>
                <th data-type="currency" class="nosearch" style="text-align: right;">Částka spotřebovaná</th>
                <th>Poskytovatel Dotace</th>
                <th class="medium-3 large-3">Finanční Zdroj</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($top_rozpoctove_obdobi as $r) {
                $dotaceNazev = (empty($r->Rozhodnuti->Dotace->projektNazev) ? $r->Rozhodnuti->Dotace->projektIdnetifikator : $r->Rozhodnuti->Dotace->projektNazev);
                $jmeno_prijemce = empty($r->Rozhodnuti->Dotace->PrijemcePomoci->obchodniJmeno) ? $r->Rozhodnuti->Dotace->PrijemcePomoci->jmeno . ' ' . $r->Rozhodnuti->Dotace->PrijemcePomoci->prijmeni : $r->Rozhodnuti->Dotace->PrijemcePomoci->obchodniJmeno;
                ?>
                <tr>
                    <td class="medium-1 large-1"><?= $this->Html->link('[R]', '/detail-rozhodnuti/' . $r->idRozhodnuti) ?></td>
                    <td><?= $this->Html->link($dotaceNazev, '/detail-dotace/' . $r->Rozhodnuti->idDotace); ?></td>
                    <td><?= $this->Html->link($jmeno_prijemce, '/detail-prijemce-pomoci/' . $r->Rozhodnuti->Dotace->PrijemcePomoci->idPrijemce) ?></td>
                    <td class="medium-1 large-1"><?= $r->rozpoctoveObdobi ?></td>
                    <td style="text-align: right;"><?= Number::currency($r->Rozhodnuti->castkaRozhodnuta) ?></td>
                    <td style="text-align: right;"><?= Number::currency($r->castkaSpotrebovana) ?></td>
                    <td><?= $this->Html->link($r->Rozhodnuti->PoskytovatelDotace->dotacePoskytovatelNazev, '') ?></td>
                    <td class="medium-3 large-3"><?= $this->Html->link($r->Rozhodnuti->CleneniFinancnichProstredku->financniProstredekCleneniNazev, '') ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Rozhodnutí</td>
                <td>Dotace</td>
                <td>Jméno příjemce</td>
                <td>Rozpočtové Období</td>
                <td style="text-align: right;">Částka rozhodnutá</td>
                <td style="text-align: right;">Částka spotřebovaná</td>
                <td>Poskytovatel Dotace</td>
                <td>Finanční Zdroj</td>
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