<?php

use Cake\I18n\Number;
use Cake\Routing\Router;

/** @var \App\Model\Entity\Dotace $dotace */
$this->set('title', \App\View\DPUTILS::dotaceNazev($dotace));


$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#hlidacsmluv">Smlouvy (Hlídač Smluv)</a></li>
        <li><a href="#prijemce">Příjemce pomoci</a></li>
        <li><a href="#rozhodnuti">Rozhodnutí</a></li>
    </ul>
    <div id="hlidacsmluv">
        <div class="alert alert-info">Smlouvy jsou indexovány a vyhledávány v systému
            <a href="https://www.hlidacsmluv.cz/" target="_blank">Hlídač Smluv</a>, originál informací o smlouvách
            mezi poskytovateli a příjemci dotací eviduje <a href="https://smlouvy.gov.cz/" target="_blank">Registr Smluv
                - Ministerstvo Vnitra</a></div>
        <table class="datatable"
               data-ajax="<?= Router::url(['controller' => 'Pages', 'action' => 'hlidacSmluv', 'projektIdentifikator' => $dotace->projektIdnetifikator, 'ico' => $dotace->PrijemcePomoci->ico, 'podpisDatum' => $dotace->podpisDatum->format("Y-m-d\TH:i:s")]) ?>">
            <thead>
            <tr>
                <th class="nosearch">Míra Shody</th>
                <th data-type="html">Název Smlouvy</th>
                <th data-type="html">Vkladatel</th>
                <th data-type="currency">Hodnota Smlouvy</th>
                <th data-type="html">Plátce</th>
                <th data-type="html">Příjemce</th>
                <th class="nosearch">Odkazy</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Míra Shody</td>
                <td>Název Smlouvy</td>
                <td>Vkladatel</td>
                <td>Hodnota Smlouvy</td>
                <td>Plátce</td>
                <td>Příjemce</td>
                <td>Odkazy</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="obecne">
        <table>
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Identifikátor Projektu</td>
                <td><?= $dotace->projektIdnetifikator ?></td>
            </tr>

            <tr>
                <td>Kód Projektu</td>
                <td><?= $dotace->projektKod ?></td>
            </tr>

            <tr>
                <td>Datum Podpisu</td>
                <td><?= $dotace->podpisDatum->nice() ?></td>
            </tr>

            <tr>
                <td>Příjemce Pomoci</td>
                <td><?= $this->Html->link($dotace->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $dotace->PrijemcePomoci->idPrijemce) ?></td>
            </tr>

            <tr>
                <td>Datum Zahájení (Plánované)</td>
                <td><?= $dotace->zahajeniPlanovaneDatum ?></td>
            </tr>

            <tr>
                <td>Datum Zahájení (Skutečné)</td>
                <td><?= $dotace->zahajeniSkutecneDatum ?></td>
            </tr>

            <tr>
                <td>Datum Ukončení (Plánované)</td>
                <td><?= $dotace->ukonceniPlanovaneDatum ?></td>
            </tr>

            <tr>
                <td>Datum Ukončení (Skutečné)</td>
                <td><?= $dotace->ukonceniSkutecneDatum ?></td>
            </tr>

            <?php
            $operacni_program_label = $operacni_program_value
                = $grantove_schema_label = $grantove_schema_value
                = $opatreni_label = $opatreni_value
                = $pod_opatreni_label = $pod_opatreni_value
                = $priorita_label = $priorita_value = "";

            if (!empty($dotace->MmrOperacniProgram)) {
                $operacni_program_label = 'MMR: Operační Program';
                $operacni_program_value = $this->Html->link(
                    $dotace->MmrOperacniProgram->operacaniProgramNazev .
                    ' ( kód: ' . $dotace->MmrOperacniProgram->operacaniProgramKod . ' )',
                    '/detail-mmr-operacni-program/?id=' . $dotace->MmrOperacniProgram->idOperacniProgram
                );
            } else if (!empty($dotace->CedrOperacniProgram)) {
                $operacni_program_label = 'CEDR: Operační Program';
                $operacni_program_value = $this->Html->link(
                    $dotace->CedrOperacniProgram->operacaniProgramNazev .
                    ' ( kód: ' . $dotace->CedrOperacniProgram->operacaniProgramKod . ' )',
                    '/detail-cedr-operacni-program/?id=' . $dotace->CedrOperacniProgram->idOperacniProgram
                );
            }

            if (!empty($dotace->MmrGrantoveSchema)) {
                $grantove_schema_label = 'MMR: Grantové Schéma';
                $grantove_schema_value = $this->Html->link(
                    $dotace->MmrGrantoveSchema->grantoveSchemaNazev . ' ( kód: '
                    . $dotace->MmrGrantoveSchema->grantoveSchemaKod . ' )',
                    '/detail-mmr-grantove-schema/?id=' . $dotace->MmrGrantoveSchema->idGrantoveSchema
                );
            } else if (!empty($dotace->CedrGrantoveSchema)) {
                $grantove_schema_label = 'CEDR: Grantové Schéma';
                $grantove_schema_value = $this->Html->link(
                    $dotace->CedrGrantoveSchema->grantoveSchemaNazev . ' ( kód: '
                    . $dotace->CedrGrantoveSchema->grantoveSchemaKod . ' )',
                    '/detail-cedr-grantove-schema/?id=' . $dotace->CedrGrantoveSchema->idGrantoveSchema
                );
            }

            if (!empty($dotace->MmrPriorita)) {
                $priorita_label = 'MMR: Priorita';
                $priorita_value = $this->Html->link(
                    $dotace->MmrPriorita->prioritaNazev .
                    ' ( kód: ' . $dotace->MmrPriorita->prioritaKod . ')',
                    '/detail-mmr-priorita/?id=' . $dotace->MmrPriorita->idPriorita
                );
            } else if (!empty($dotace->CedrPriorita)) {
                $priorita_label = 'CEDR: Priorita';
                $priorita_value = $this->Html->link(
                    $dotace->CedrPriorita->prioritaNazev .
                    ' ( kód: ' . $dotace->CedrPriorita->prioritaKod . ')',
                    '/detail-cedr-priorita/?id=' . $dotace->CedrPriorita->idPriorita
                );
            }

            if (!empty($dotace->MmrOpatreni)) {
                $opatreni_label = 'MMR: Opatření';
                $opatreni_value = $this->Html->link(
                    $dotace->MmrOpatreni->opatreniNazev .
                    ' ( kód: ' . $dotace->MmrOpatreni->opatreniKod . ')',
                    '/detail-mmr-opatreni/?id=' . $dotace->MmrOpatreni->idOpatreni
                );
            } else if (!empty($dotace->CedrOpatreni)) {
                $opatreni_label = 'CEDR: Opatření';
                $opatreni_value = $this->Html->link(
                    $dotace->CedrOpatreni->opatreniNazev .
                    ' ( kód: ' . $dotace->CedrOpatreni->opatreniKod . ')',
                    '/detail-cedr-opatreni/?id=' . $dotace->CedrOpatreni->idOpatreni
                );
            }

            if (!empty($dotace->MmrPodOpatreni)) {
                $opatreni_label = 'MMR: PodOpatření';
                $opatreni_value = $this->Html->link(
                    $dotace->MmrPodOpatreni->podOpatreniNazev .
                    ' ( kód: ' . $dotace->MmrPodOpatreni->podOpatreniKod . ')',
                    '/detail-mmr-opatreni/?id=' . $dotace->MmrPodOpatreni->idPodOpatreni
                );
            } else if (!empty($dotace->CedrPodOpatreni)) {
                $opatreni_label = 'CEDR: Opatření';
                $opatreni_value = $this->Html->link(
                    $dotace->CedrPodOpatreni->podOpatreniNazev .
                    ' ( kód: ' . $dotace->CedrPodOpatreni->podOpatreniKod . ')',
                    '/detail-cedr-opatreni/?id=' . $dotace->CedrPodOpatreni->idPodOpatreni
                );
            }
            ?>

            <?php if (!empty($operacni_program_label)) { ?>
                <tr>
                    <td><?= $operacni_program_label ?></td>
                    <td><?= $operacni_program_value ?></td>
                </tr>
            <?php } ?>

            <?php if (!empty($grantove_schema_label)) { ?>
                <tr>
                    <td><?= $grantove_schema_label ?></td>
                    <td><?= $grantove_schema_value ?></td>
                </tr>
            <?php } ?>

            <?php if (!empty($priorita_label)) { ?>
                <tr>
                    <td><?= $priorita_label ?></td>
                    <td><?= $priorita_value ?></td>
                </tr>
            <?php } ?>

            <?php if (!empty($opatreni_label)) { ?>
                <tr>
                    <td><?= $opatreni_label ?></td>
                    <td><?= $opatreni_value ?></td>
                </tr>
            <?php } ?>


            <?php if (!empty($pod_opatreni_label)) { ?>
                <tr>
                    <td><?= $pod_opatreni_label ?></td>
                    <td><?= $pod_opatreni_value ?></td>
                </tr>
            <?php } ?>

            <tr>
                <td>Dotační Titul</td>
                <td><?= (count($dotace->Rozhodnuti) > 0 && !empty($dotace->Rozhodnuti[0]->RozpoctoveObdobi->CiselnikDotaceTitulv01)) ? $this->Html->link($dotace->Rozhodnuti[0]->RozpoctoveObdobi->CiselnikDotaceTitulv01->dotaceTitulNazev . ' ( kód: ' . $dotace->Rozhodnuti[0]->RozpoctoveObdobi->CiselnikDotaceTitulv01->dotaceTitulKod . ' )', '/detail-dotacni-titul/' . $dotace->Rozhodnuti[0]->RozpoctoveObdobi->CiselnikDotaceTitulv01->dotaceTitulKod) : "Nevyplněno" ?></td>
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
    <div id="prijemce">
        <h2>Příjemce
            Pomoci <?= $this->Html->link('(Otevřít detail)', '/detail-prijemce-pomoci/' . $dotace->PrijemcePomoci->idPrijemce) ?></h2>
        <table>
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Název Příjemce (obchodní jméno)</td>
                <td><?= $dotace->PrijemcePomoci->obchodniJmeno ?></td>
            </tr>

            <tr>
                <td>IČ (IČO)</td>
                <td><?= \App\View\DPUTILS::ico($dotace->PrijemcePomoci->ico) ?></td>
            </tr>

            <tr>
                <td>Právní Forma</td>
                <td><?= empty($dotace->PrijemcePomoci->PravniForma) ? 'Nevyplněno' : $dotace->PrijemcePomoci->PravniForma->pravniFormaNazev ?></td>
            </tr>

            <tr>
                <td>Stát</td>
                <td><?= $dotace->PrijemcePomoci->Stat->statNazev ?></td>
            </tr>

            <tr>
                <td>Ekonomický Subjekt</td>
                <td><?= !empty($dotace->PrijemcePomoci->EkonomikaSubjekt) ? $dotace->PrijemcePomoci->EkonomikaSubjekt->id : 'Nevyplněno' ?></td>
            </tr>

            <tr>
                <td>Rok Narození</td>
                <td><?= $dotace->PrijemcePomoci->rokNarozeni == 0 ? '' : $dotace->PrijemcePomoci->rokNarozeni ?></td>
            </tr>

            <tr>
                <td>Jméno</td>
                <td><?= $dotace->PrijemcePomoci->jmeno ?></td>
            </tr>

            <tr>
                <td>Příjmení</td>
                <td><?= $dotace->PrijemcePomoci->prijmeni ?></td>
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
    <div id="rozhodnuti">
        <h2>Rozhodnutí o udělení dotace</h2>
        <hr/>
        <span id="soucet"></span><br/>
        <span id="soucetSpotrebovana"></span>
        <hr/>
        <table id="datatable">
            <thead>
            <tr>
                <th>Dílčí Rozhodnutí</th>
                <th>Rok Rozhodnutí</th>
                <th data-type="currency">Částka Požadovaná</th>
                <th data-type="currency">Částka Rozhodnutá</th>
                <th data-type="currency">Částka Spotřebovaná</th>
                <th>Poskytovatel Dotace</th>
                <th>Členění Finančních Prostředků</th>
                <th>Finanční Zdroj</th>
                <th>Investice?</th>
                <th>Návratnost?</th>
                <th>Refundace?</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $counter = 1;
            foreach ($rozhodnuti as $r) {
                ?>
                <tr>
                    <td><?= $this->Html->link($counter, '/detail-rozhodnuti/' . $r->idRozhodnuti) ?></td>
                    <td><?= $r->rokRozhodnuti ?></td>
                    <td style="text-align: right"><?= Number::currency($r->castkaPozadovana) ?></td>
                    <td style="text-align: right"><?= Number::currency($r->castkaRozhodnuta) ?></td>
                    <td style="text-align: right"><?= !empty($r->RozpoctoveObdobi) ? Number::currency($r->RozpoctoveObdobi->castkaSpotrebovana) : "N/A" ?></td>
                    <td><?= $r->PoskytovatelDotace->dotacePoskytovatelNazev ?></td>
                    <td><?= $r->CleneniFinancnichProstredku->financniProstredekCleneniNazev ?></td>
                    <td><?= $r->FinancniZdroj->financniZdrojNazev ?></td>
                    <td><?= $r->investiceIndikator ? 'ANO' : 'NE' ?></td>
                    <td><?= $r->navratnostIndikator ? 'ANO' : 'NE' ?></td>
                    <td><?= $r->refundaceIndikator ? 'ANO' : 'NE' ?></td>
                </tr>
                <?php
                $counter++;
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Dílčí Rozhodnutí</td>
                <td>Rok Rozhodnutí</td>
                <td>Částka Požadovaná</td>
                <td>Částka Rozhodnutá</td>
                <td>Částka Spotřebovaná</td>
                <td>Poskytovatel Dotace</td>
                <td>Členění Finančních Prostředků</td>
                <td>Finanční Zdroj</td>
                <td>Investice?</td>
                <td>Návratnost?</td>
                <td>Refundace?</td>
            </tr>
            </tfoot>
        </table>

        <script type="text/javascript">
            $(document).ready(function () {
                function printSum() {
                    var soucet = 0, soucetSpotrebovano = 0;

                    $("#datatable").dataTable().api().rows().every(function (index, tableLoop, rowLoop) {
                        if (this.data()[6].lastIndexOf('p)') !== 0) {
                            soucet += this.data()[3].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                            soucetSpotrebovano += this.data()[4].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                        }
                    });

                    $("#soucet").text("Součet zobrazených řádků (částka rozhodnutá): " + $.fn.dataTable.render.number('.', ',', 0).display(soucet) + " Kč");
                    $("#soucetSpotrebovana").text("Součet zobrazených řádků (částka spotřebovaná): " + $.fn.dataTable.render.number('.', ',', 0).display(soucetSpotrebovano) + " Kč");
                }

                $("#datatable").dataTable().fnSettings().aoDrawCallback.push({
                    'sName': 'showSum',
                    'fn': function () {
                        printSum();
                    }
                });

                printSum();
            });
        </script>
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