<?php
/**
 * @var AppView $this
 */

/** @var PrijemcePomoci $prijemce */

use App\Model\Entity\PrijemcePomoci;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\Routing\Router;

/** @var PrijemcePomoci $prijemci */

$this->set('title', DPUTILS::jmenoPrijemcePomoci($prijemce));

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
        <?php if (!empty($strukturalniFondy2020)) { ?>
            <li><a href="#strukturalniFondy2020">Strukturální Fondy 2014 - 2020</a></li>
        <?php } ?>
        <?php if (!empty($dotinfo)) { ?>
            <li><a href="#dotinfo">DotInfo</a></li>
        <?php } ?>
        <?php if (!empty($investicniPobidky)) { ?>
            <li><a href="#investicniPobidky">Investiční Pobídky - CzechInvest</a></li>
        <?php } ?>
        <?php if (!empty($szif)) { ?>
            <li><a href="#szif">Státní Zemědělský Intervenční Fond</a></li>
        <?php } ?>
        <?php if (!empty($politickeDary)) { ?>
            <li><a href="#politickeDary">Dary politickým stranám</a></li>
        <?php } ?>
    </ul>
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
                <td>Název Příjemce (obchodní jméno)</td>
                <td><?= $prijemce->obchodniJmeno ?></td>
            </tr>

            <?php if ($prijemce->ico != 0) { ?>
                <tr>
                    <td>IČ (IČO)</td>
                    <td><?= $prijemce->ico == 0 ? "N/A" : DPUTILS::ico($prijemce->ico) ?></td>
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
                <td><?= empty($prijemce->EkonomikaSubjekt) ? 'Nevyplněno' : $this->Html->link($prijemce->EkonomikaSubjekt->id) ?></td>
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
                <td>
                    <?= (empty($prijemce->Osoba) || empty($prijemce->Osoba->Obec)) ? '' : ($prijemce->Osoba->Obec->obecNazev . ' (NUTS: ' . $prijemce->Osoba->Obec->obecNutsKod . ')') ?>
                    <?= (empty($prijemce->AdresaSidlo) || empty($prijemce->AdresaSidlo->Obec)) ? '' : ($prijemce->AdresaSidlo->Obec->obecNazev . ' (NUTS: ' . $prijemce->AdresaSidlo->Obec->obecNutsKod . ')') ?>
                </td>
            </tr>
            <!--
            <?php var_dump($prijemce); ?>
            -->

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
        <h2>Rozhodnutí/Dotace</h2>
        <?php if (!empty($prijemci->toArray()) && count($prijemci->toArray()) > 1) { ?>
            <input id="onlythis" type="checkbox" name="onlythis"
                   value="onlythis">Neukazovat ostatní rozhodnutí příjemců se stejným IČO<br/>
        <?php } ?>
        <hr/>
        <span id="soucet"></span><br/>
        <span id="soucetSpotrebovana"></span>
        <hr/>
        <table id="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>?dotace=dotace">
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
                <td data-type="html">Dotace (kod nebo identifikator projektu)</td>
                <td data-type="currency" class="large-2 medium-2">Částka Požadovaná</td>
                <td data-type="currency" class="large-2 medium-2">Částka Rozhodnutá</td>
                <td data-type="currency" class="large-2 medium-2">Částka Spotřebovaná</td>
                <td data-type="number" class="large-1 medium-1">Rok</td>
                <td data-type="string" class="large-2 medium-2">Členění finančních prostředků</td>
                <td data-type="string" class="large-2 medium-2">Finanční Zdroj</td>
                <td data-type="string" class="large-1 medium-1">Shodný Příjemce</td>
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
                /** @var PrijemcePomoci[] $prijemci */
                foreach ($prijemci as $p) { ?>
                    <?= $this->Html->link('( ' . str_pad($p->idPrijemce, 44, " ") . ' ) ' . DPUTILS::jmenoPrijemcePomoci($p), '/detail-prijemce-pomoci/' . $p->idPrijemce, ['escape' => false]) ?>
                    <br/>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <?php if (!empty($strukturalniFondy)) { ?>
        <div id="strukturalniFondy">
            <table class="datatable"
                   data-ajax="<?= $this->request->getRequestTarget() ?>?strukturalni-fondy=strukturalni-fondy">
                <thead>
                <tr>
                    <th>Číslo a název programu</th>
                    <th>Číslo Projektu</th>
                    <th>Název Projektu</th>
                    <th class="nosearch">Zdroje celkem</th>
                    <th class="nosearch">Veřejné zdroje celkem</th>
                    <th class="nosearch">EU zdroje</th>
                    <th class="nosearch">Vyúčtované veřejné zdroje celkem</th>
                    <th class="nosearch">Proplacené EU zdroje</th>
                    <th>Místo realizace</th>
                    <th class="nosearch">Detail</th>
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
                    <td>Místo realizace</td>
                    <td>Detail</td>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php } ?>

    <?php if (!empty($strukturalniFondy2020)) { ?>
        <div id="strukturalniFondy2020">
            <table class="datatable"
                   data-ajax="<?= $this->request->getRequestTarget() ?>?strukturalni-fondy-2020=strukturalni-fondy-2020">
                <thead>
                <tr>
                    <th>Číslo a název programu</th>
                    <th>Číslo Projektu</th>
                    <th>Název Projektu</th>
                    <th class="nosearch" data-type="currency">Zdroje celkem</th>
                    <th class="nosearch" data-type="currency">Veřejné zdroje celkem</th>
                    <th class="nosearch" data-type="currency">EU zdroje</th>
                    <th class="nosearch" data-type="currency">Vyúčtované veřejné zdroje celkem</th>
                    <th class="nosearch" data-type="currency">Vyúčtované soukromé zdroje celkem</th>
                    <th class="nosearch" data-type="currency">Vyúčtované EU zdroje</th>
                    <th class="nosearch" data-type="currency">Vyúčtované zdroje celkem</th>
                    <th>Místo realizace</th>
                    <th class="nosearch">Detail</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td>Číslo a název programu</td>
                    <td>Číslo Projektu</td>
                    <td>Název Projektu</td>
                    <th>Zdroje celkem</th>
                    <th>Veřejné zdroje celkem</th>
                    <th>EU zdroje</th>
                    <th>Vyúčtované veřejné zdroje celkem</th>
                    <th>Vyúčtované soukromé zdroje celkem</th>
                    <th>Vyúčtované EU zdroje</th>
                    <th>Vyúčtované zdroje celkem</th>
                    <td>Místo realizace</td>
                    <td>Detail</td>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php } ?>

    <div id="hlidacsmluv">
        <div class="alert alert-info">Smlouvy jsou indexovány a vyhledávány v systému
            <a href="https://www.hlidacsmluv.cz/" target="_blank">Hlídač Smluv</a>, originál informací o smlouvách
            mezi poskytovateli a příjemci dotací eviduje <a href="https://smlouvy.gov.cz/" target="_blank">Registr Smluv
                - Ministerstvo Vnitra</a></div>
        <table class="datatable"
               data-ajax="<?= Router::url(['controller' => 'Pages', 'action' => 'hlidacSmluv', 'ico' => $prijemce->ico]) ?>">
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
    <?php if (!empty($dotinfo)) { ?>
        <div id="dotinfo">
            <table class="datatable" style="width: 100%"
                   data-ajax="<?= $this->request->getRequestTarget() ?>?dotinfo=dotinfo">
                <thead>
                <tr>
                    <th>Jméno</th>
                    <th>IČO</th>
                    <th>Dotace</th>
                    <th data-type="currency">Částka Schválená</th>
                    <th data-type="html" class="nosearch">Otevřít</th>
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
            <table class="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>?czechinvest=czechinvest">
                <thead>
                <tr>
                    <th>Sektor</th>
                    <th>Druh pobídky</th>
                    <th class="nosearch">Vytvořená pracovní místa</th>
                    <th class="nosearch">Investice Celkem</th>
                    <th class="nosearch">Míra veřejné podpory</th>
                    <th class="nosearch">Strop veřejné podpory</th>
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

    <?php if (!empty($szif)) { ?>
        <div id="szif">
            <table class="datatable" style="width: 100%"
                   data-ajax="<?= $this->request->getRequestTarget() ?>?szif=szif">
                <thead>
                <tr>
                    <th>Příjemce pomoci</th>
                    <th>IČO příjemce</th>
                    <th>Rok</th>
                    <th data-type="currency">Fondy Tuzemské</th>
                    <th data-type="currency">Fondy EU</th>
                    <th data-type="currency">Fondy celkem</th>
                    <th>Opatření</th>
                    <th>Finanční zdroj</th>
                    <th>Místo realizace</th>
                    <td>Otevřít</td>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <td>Příjemce pomoci</td>
                    <td>IČO příjemce</td>
                    <td>Rok</td>
                    <td data-type="currency">Fondy Tuzemské</td>
                    <td data-type="currency">Fondy EU</td>
                    <td data-type="currency">Fondy celkem</td>
                    <td>Opatření</td>
                    <td>Finanční zdroj</td>
                    <td>Místo realizace</td>
                    <td>Otevřít</td>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php } ?>

    <?php if (!empty($politickeDary)) { ?>
        <div id="politickeDary">
            <table class="datatable" style="width: 100%"
                   data-ajax="<?= $this->request->getRequestTarget() ?>?politickeDary=politickeDary">
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
            collapsible: false,
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
