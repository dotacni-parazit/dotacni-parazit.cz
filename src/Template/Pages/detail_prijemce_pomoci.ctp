<?php

/** @var \App\Model\Entity\PrijemcePomoci $prijemce */

use Cake\Routing\Router;

/** @var \App\Model\Entity\PrijemcePomoci $prijemci */

$this->set('title', \App\View\DPUTILS::jmenoPrijemcePomoci($prijemce));

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#hlidacsmluv">Smlouvy (Hlídač Smluv)</a></li>
        <?php if (!empty($prijemci->toArray()) && count($prijemci->toArray()) > 1) { ?>
            <li><a href="#aliasy">Aliasy příjemce pomoci</a></li>
        <?php } ?>
        <li><a href="#rozhodnuti">Rozhodnutí dle CEDR</a></li>
        <?php if (!empty($strukturalniFondy)) { ?>
            <li><a href="#strukturalniFondy">Strukturální Fondy 2007 - 2013</a></li>
        <?php } ?>
        <?php if (!empty($dotinfo)) { ?>
            <li><a href="#dotinfo">DotInfo</a></li>
        <?php } ?>
        <?php if (!empty($investicniPobidky)) { ?>
            <li><a href="#investicniPobidky">Investiční Pobídky - CzechInvest</a></li>
        <?php } ?>
        <?php if (!empty($politickeDary)) { ?>
            <li><a href="#politickeDary">Dary politickým stranám</a></li>
        <?php } ?>
    </ul>
    <div id="obecne">

        <table>
            <thead>
            <tr>
                <th>Údaj</th>
                <th>Obsah</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Název Příjemce (obchodní jméno)</td>
                <td><?= $prijemce->obchodniJmeno ?></td>
            </tr>

            <?php if ($prijemce->ico != 0) { ?>
                <tr>
                    <td>IČ (IČO)</td>
                    <td><?= $prijemce->ico == 0 ? "N/A" : \App\View\DPUTILS::ico($prijemce->ico) ?></td>
                </tr>
            <?php } ?>

            <tr>
                <td>Právní Forma</td>
                <td><?= empty($prijemce->PravniForma) ? 'Nevyplněno' : $prijemce->PravniForma->pravniFormaNazev ?></td>
            </tr>

            <tr>
                <td>Stát</td>
                <td><?= $prijemce->Stat->statNazev ?></td>
            </tr>

            <tr>
                <td>Ekonomický Subjekt</td>
                <td><?= empty($prijemce->EkonomikaSubjekt) ? 'Nevyplněno' : $prijemce->EkonomikaSubjekt->id ?></td>
            </tr>

            <tr>
                <td>Rok Narození</td>
                <td><?= $prijemce->rokNarozeni == 0 ? '' : $prijemce->rokNarozeni ?></td>
            </tr>

            <tr>
                <td>Jméno</td>
                <td><?= $prijemce->jmeno ?></td>
            </tr>

            <tr>
                <td>Příjmení</td>
                <td><?= $prijemce->prijmeni ?></td>
            </tr>

            <tr>
                <td>Bydliště</td>
                <td><?= (empty($prijemce->Osoba) || empty($prijemce->Osoba->Obec)) ? 'Nevyplněno' : ($prijemce->Osoba->Obec->obecNazev . ' (NUTS: ' . $prijemce->Osoba->Obec->obecNutsKod . ')') ?></td>
            </tr>

            </tbody>
            <tfoot>
            <tr>
                <th>Údaj</th>
                <th>Obsah</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="rozhodnuti">
        <h2>Rozhodnutí/Dotace</h2>
        <?php if (!empty($prijemci->toArray()) && count($prijemci->toArray()) > 1) { ?>
            <input id="onlythis" type="checkbox" name="onlythis"
                   value="onlythis">Neukazovat ostatní rozhodnutí příjemců se stejným IČO<br/>
        <?php } ?>
        <hr/>
        <span id="soucet"></span><br/>
        <span id="soucetSpotrebovana"></span>
        <hr/>
        <table id="datatable" data-ajax="<?= $this->request->here(false) ?>?dotace=dotace">
            <thead>
            <tr>
                <th data-type="html" class="large-2 medium-2">Dotace (kod nebo identifikator projektu)</th>
                <th data-type="currency" class="large-2 medium-2">Částka Požadovaná</th>
                <th data-type="currency" class="large-2 medium-2">Částka Rozhodnutá</th>
                <th data-type="currency" class="large-2 medium-2">Částka Spotřebovaná</th>
                <th data-type="number" class="large-1 medium-1">Rok</th>
                <th data-type="string" class="large-2 medium-2">Členění finančních prostředků</th>
                <th data-type="string" class="large-2 medium-2">Finanční Zdroj</th>
                <th data-type="string" class="large-1 medium-1">Shodný Příjemce</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <th data-type="html">Dotace (kod nebo identifikator projektu)</th>
                <th data-type="currency" class="large-2 medium-2">Částka Požadovaná</th>
                <th data-type="currency" class="large-2 medium-2">Částka Rozhodnutá</th>
                <th data-type="currency" class="large-2 medium-2">Částka Spotřebovaná</th>
                <th data-type="number" class="large-1 medium-1">Rok</th>
                <th data-type="string" class="large-2 medium-2">Členění finančních prostředků</th>
                <th data-type="string" class="large-2 medium-2">Finanční Zdroj</th>
                <th data-type="string" class="large-1 medium-1">Shodný Příjemce</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <?php if (!empty($prijemci->toArray()) && count($prijemci->toArray()) > 1) {
        ?>
        <div id="aliasy">
            <div id="prijemce_aliasy">
                Příjemce pomoci je také evidován pod těmito odkazy: <br/>
                <?php
                /** @var \App\Model\Entity\PrijemcePomoci[] $prijemci */
                foreach ($prijemci as $p) { ?>
                    <?= $this->Html->link('( ' . str_pad($p->idPrijemce, 44, " ") . ' ) ' . \App\View\DPUTILS::jmenoPrijemcePomoci($p), '/detail-prijemce-pomoci/' . $p->idPrijemce, ['escape' => false]) ?>
                    <br/>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <?php if (!empty($strukturalniFondy)) { ?>
        <div id="strukturalniFondy">
            <table class="datatable"
                   data-ajax="<?= $this->request->here(false) ?>?strukturalni-fondy=strukturalni-fondy">
                <thead>
                <tr>
                    <th>Číslo a název programu</th>
                    <th>Číslo Projektu</th>
                    <th>Název Projektu</th>
                    <th>Zdroje celkem</th>
                    <th>Veřejné zdroje celkem</th>
                    <th>EU zdroje</th>
                    <th>Vyúčtované veřejné zdroje celkem</th>
                    <th>Proplacené EU zdroje</th>
                    <th>Místo realizace</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td>Číslo a název programu</td>
                    <td>Číslo Projektu</td>
                    <td>Název Projektu</td>
                    <td>Zdroje celkem</td>
                    <td>Veřejné zdroje celkem</td>
                    <td>EU zdroje</td>
                    <td>Vyúčtované veřejné zdroje celkem</td>
                    <td>Proplacené EU zdroje</td>
                    <th>Místo realizace</th>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php } ?>
    <div id="hlidacsmluv">
        <table class="datatable"
               data-ajax="<?= Router::url(['controller' => 'Pages', 'action' => 'hlidacSmluv', 'ico' => $prijemce->ico]) ?>">
            <thead>
            <tr>
                <th>Míra Shody</th>
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
                <th>Míra Shody</th>
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
    <?php if (!empty($dotinfo)) { ?>
        <div id="dotinfo">
            <table class="datatable" style="width: 100%" data-ajax="<?= $this->request->here(false) ?>?dotinfo=dotinfo">
                <thead>
                <tr>
                    <th>Jméno</th>
                    <th>IČO</th>
                    <th>Dotace</th>
                    <th data-type="currency">Částka Schválená</th>
                    <th data-type="html">Otevřít</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td>Jméno</td>
                    <td>IČO</td>
                    <td>Dotace</td>
                    <td data-type="currency">Částka Schválená</td>
                    <td data-type="html">Otevřít</td>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($investicniPobidky)) { ?>
        <div id="investicniPobidky">
            <table class="datatable" data-ajax="<?= $this->request->here(false) ?>?czechinvest=czechinvest">
                <thead>
                <tr>
                    <th>Sektor</th>
                    <th>Druh pobídky</th>
                    <th>Vytvořená pracovní místa</th>
                    <th>Investice Celkem</th>
                    <th>Míra veřejné podpory</th>
                    <th>Strop veřejné podpory</th>
                    <th>Datum rozhodnutí</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td>Sektor</td>
                    <td>Druh pobídky</td>
                    <td>Vytvořená pracovní místa</td>
                    <td>Investice Celkem</td>
                    <td>Míra veřejné podpory</td>
                    <td>Strop veřejné podpory</td>
                    <td>Datum rozhodnutí</td>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php } ?>
    <?php if (!empty($politickeDary)) { ?>
        <div id="politickeDary">
            <table class="datatable" style="width: 100%"
                   data-ajax="<?= $this->request->here(false) ?>?politickeDary=politickeDary">
                <thead>
                <tr>
                    <th>Strana</th>
                    <th>Rok</th>
                    <th>Výše Daru</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td>Strana</td>
                    <td>Rok</td>
                    <td>Výše Daru</td>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php } ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });

        $("#onlythis").on('change', function () {
            var checked = $(this).is(":checked");
            var last = $('table thead tr th input').last();
            last.val(checked ? 'YES' : '');
            last.trigger('keyup')
        });

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
