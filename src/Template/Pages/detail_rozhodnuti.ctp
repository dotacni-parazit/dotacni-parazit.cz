<?php

use Cake\I18n\Number;

$dotace = (object)$rozhodnuti['Dotace'];
$this->set('title', \App\View\DPUTILS::dotaceNazev($dotace));

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#rozhodnuti">Rozpočtové Období</a></li>
    </ul>
    <div id="obecne">

        <table>
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th classs="nosearch">Hodnota</th>
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
                <td><?= $dotace->podpisDatum ?></td>
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

            <tr>
                <td>MMR: Operační program</td>
                <td><?= empty($dotace->MmrOperacniProgram) ? 'Nevyplněno' : $this->Html->link($dotace->MmrOperacniProgram->operacaniProgramNazev . ' ( kód: ' . $dotace->MmrOperacniProgram->operacaniProgramKod . ' )', '/detail-mmr-operacni-program/?id=' . $dotace->MmrOperacniProgram->idOperacniProgram) ?></td>
            </tr>

            <tr>
                <td>MMR: Podprogram</td>
                <td><?= empty($dotace->MmrPodprogram) ? 'Nevyplněno' : $this->Html->link($dotace->MmrPodprogram->podprogramNazev . ' ( kód: ' . $dotace->MmrPodprogram->podprogramKod . ' )', '/detail-mmr-podprogram/?id=' . $dotace->MmrPodprogram->idPodprogram) ?></td>
            </tr>

            <tr>
                <td>MMR: Grantové Schéma</td>
                <td><?= empty($dotace->MmrGrantoveSchema) ? 'Nevyplněno' : $this->Html->link($dotace->MmrGrantoveSchema->grantoveSchemaNazev . ' ( kód: ' . $dotace->MmrGrantoveSchema->grantoveSchemaKod . ' )', '/detail-mmr-grantove-schema/?id=' . $dotace->MmrGrantoveSchema->idGrantoveSchema) ?></td>
            </tr>

            <tr>
                <td>MMR: Opatření</td>
                <td><?= empty($dotace->MmrOpatreni) ? 'Nevyplněno' : $this->Html->link($dotace->MmrOpatreni->opatreniNazev . ' ( kód: ' . $dotace->MmrOpatreni->opatreniKod . ' )', '/detail-mmr-opatreni/?id=' . $dotace->MmrOpatreni->idOpatreni) ?></td>
            </tr>

            <tr>
                <td>MMR: PodOpatření</td>
                <td><?= empty($dotace->MmrPodOpatreni) ? 'Nevyplněno' : $this->Html->link($dotace->MmrPodOpatreni->podOpatreniNazev . ' ( kód: ' . $dotace->MmrPodOpatreni->podOpatreniKod . ' )', '/detail-mmr-podopatreni/?id=' . $dotace->MmrPodOpatreni->idPodOpatreni) ?></td>
            </tr>

            <tr>
                <td>MMR: Priorita</td>
                <td><?= empty($dotace->MmrPriorita) ? 'Nevyplněno' : $this->Html->link($dotace->MmrPriorita->prioritaNazev . ' ( kód: ' . $dotace->MmrPriorita->prioritaKod . ' )', '/detail-mmr-priorita/?id=' . $dotace->MmrPriorita->idPriorita) ?></td>
            </tr>

            <tr>
                <td>Dotační titul</td>
                <td><?= !empty($rozhodnuti['RozpoctoveObdobi']['CiselnikDotaceTitulv01']['dotaceTitulNazev']) ? $this->Html->link($rozhodnuti['RozpoctoveObdobi']['CiselnikDotaceTitulv01']['dotaceTitulNazev'] . ' ( kód: ' . $rozhodnuti['RozpoctoveObdobi']['CiselnikDotaceTitulv01']['dotaceTitulKod'] . ' )', '/detail-dotacni-titul/' . $rozhodnuti['RozpoctoveObdobi']['CiselnikDotaceTitulv01']['dotaceTitulKod']) : "Nevyplněno" ?></td>
            </tr>

            <tr>
                <td>Refundace?</td>
                <td><?= $rozhodnuti['refundaceIndikator'] ? 'ANO' : 'NE' ?></td>
            </tr>

            <tr>
                <td>Návratnost?</td>
                <td><?= $rozhodnuti['navratnostIndikator'] ? 'ANO' : 'NE' ?></td>
            </tr>

            <tr>
                <td>Investice?</td>
                <td><?= $rozhodnuti['investiceIndikator'] ? 'ANO' : 'NE' ?></td>
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
        <span id="soucet"></span><br/>
        <span id="soucetSpotrebovana"></span>
        <hr/>
        <table id="datatable">
            <thead>
            <tr>
                <th class="large-3 medium-3">ID</th>
                <th>Rozpočtové období</th>
                <th class="currency">Částka Čerpaná</th>
                <th class="currency">Částka Uvolněná</th>
                <th class="currency">Částka Vrácená</th>
                <th class="currency">Částka Spotřebovaná</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rozpocet as $r) {
                $r = (object)$r;
                ?>
                <tr>
                    <td><?= $this->Html->link($r->idObdobi, '/detail-rozpoctove-obdobi/' . $r->idObdobi) ?></td>
                    <td><?= $r->rozpoctoveObdobi ?></td>
                    <td style="text-align: right"><?= Number::currency($r->castkaCerpana) ?></td>
                    <td style="text-align: right"><?= Number::currency($r->castkaUvolnena) ?></td>
                    <td style="text-align: right"><?= Number::currency($r->castkaVracena) ?></td>
                    <td style="text-align: right"><?= Number::currency($r->castkaSpotrebovana) ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td>ID</td>
                <td>Rozpočtové období</td>
                <td>Částka Čerpaná</td>
                <td>Částka Uvolněná</td>
                <td>Částka Vrácená</td>
                <td>Částka Spotřebovaná</td>
            </tr>
            </tfoot>
        </table>

        <script type="text/javascript">
            $(document).ready(function () {
                function printSum() {
                    var soucet = 0, soucetSpotrebovano = 0;

                    $("#datatable").dataTable().api().rows().every(function (index, tableLoop, rowLoop) {
                        if (this.data()[5].lastIndexOf('p)') !== 0) {
                            soucet += this.data()[2].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                            soucetSpotrebovano += this.data()[3].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
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