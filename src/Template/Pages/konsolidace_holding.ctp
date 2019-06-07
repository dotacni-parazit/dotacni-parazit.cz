<?php
/**
 * @var AppView $this
 */
/** @var Owner[] $owners */
/** @var array $subsidiaries_sums */

/** @var Consolidation[] $subsidiaries */

use App\Model\Entity\Company;
use App\Model\Entity\Consolidation;
use App\Model\Entity\Owner;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\I18n\Number;

/** @var Company $holding */
$this->set('title', $holding->name);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

?>
<div id="tabs">

    <ul>
        <li><a href="#obecne">Informace o Holdingu</a></li>
        <li><a href="#owners">Vlastnická Historie</a></li>
        <li><a href="#subsidiaries">Konsolidované společnosti</a></li>
        <li><a href="#attachments">Výkazy Holdingu</a></li>
        <?php if (!empty($holding->notes)) { ?>
            <li><a href="#notes">Poznámka ke konsolidaci</a></li>
        <?php } ?>
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
                <td>Jméno</td>
                <td><?= $holding->name ?></td>
            </tr>

            <tr>
                <td>IČ</td>
                <td><?= DPUTILS::ico($holding->ico) ?></td>
            </tr>

            <tr>
                <td>Počet konsolidovaných společností</td>
                <td><?= count($holding->subsidiaries) ?></td>
            </tr>

            <tr>
                <td>Státní Příslušnost</td>
                <td><?= $holding->state->name . ' (' . $holding->state->kod . ')' ?></td>
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

    <div id="owners">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Vlastník</th>
                <th class="nosearch">Rok</th>
                <th class="nosearch">Vlastnický Podíl</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($owners as $o) { ?>
                <tr>
                    <td><?= $o->owner->name ?></td>
                    <td><?= $o->year ?></td>
                    <td><?= Number::toPercentage($o->shares_percent) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Vlastník</td>
                <td>Rok</td>
                <td>Vlastnický Podíl</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="subsidiaries">
        <div class="alert alert-info">
            V každém řádku je zobrazen součet částek "Rozhodnutí [Částka Rozhodnuta]", "Rozpočtové Období [Částka
            Spotřebovaná]", "Investiční Pobídky CzechInvest [Investice CZK]" a "Strukturální Fondy 2007-2013 [Veřejné
            Zdroje
            Celkem]",
            za daný rok, ve kterém byla společnost součástí holdingu.
            <br/><br/>
            Součet "Strukturální Fondy 2014-2020 [Zdroje Celkem]" je bohužel u všech řádků stejného IČO stejný, jelikož
            v informacích o realizaci projektů, není datum poskytnutí dotace nebo podpisu smlouvy. Takže součet ukazuje
            celkovou výši všech dotací v nových Strukturálních Fondech, nikoliv součet za konkrétní rok, kdy společnost
            patřila do holdingu.
            <br/><br/>
            Součty jsou dělány podle IČO, takže údaj nemusí být přesný.
        </div>
        <hr/>

        <span id="soucetRozhodnuti"></span><br/>
        <span id="soucetSpotreba"></span><br/>
        <span id="soucetDotinfo"></span><br/>
        <span id="soucetCzechInvest"></span><br/>
        <span id="soucetStrukturalni2013"></span><br/>
        <!--<span id="soucetStrukturalni2020"></span><br/>-->
        <span id="soucetDary"></span>

        <hr/>
        <table id="sumtable" class="datatable_simple">
            <thead>
            <tr>
                <th>Konsolidovaná Společnost</th>
                <th>IČO</th>
                <th>Rok</th>
                <th class="nosearch">Vlastnický Podíl</th>
                <th>Státní příslušnost</th>
                <th class="nosearch" data-type="currency">CEDR-III Součet Rozhodnutí</th>
                <th class="nosearch" data-type="currency">CEDR-III Součet Spotřebováno</th>
                <th class="nosearch" data-type="currency">Součet Pobídek CzechInvest</th>
                <th class="nosearch" data-type="currency">Součet Strukturální Fondy 2007-2013</th>
                <th class="nosearch" data-type="currency">Součet Strukturální Fondy 2014-2020</th>
                <th data-type="currency">Součet DotInfo.cz</th>
                <th data-type="currency">Součet Darů Politickým Stranám</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($subsidiaries as $s) { ?>
                <tr>
                    <td><?= $this->Html->link($s->subsidiary->name, ['controller' => 'Pages', 'action' => 'prijemceDotaciJmeno', 'name' => $s->subsidiary->name]) ?></td>
                    <td><?= $this->Html->link(DPUTILS::ico($s->subsidiary->ico), ['controller' => 'Pages', 'action' => 'prijemceDotaciIco', 'ico' => $s->subsidiary->ico]) ?></td>
                    <td><?= $s->year ?></td>
                    <td><?= Number::toPercentage($s->shares_percent) ?></td>
                    <td><?= $s->subsidiary->state->name ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][0]) ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][1]) ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][2] * 1000000) ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][3]) ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][5]) ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][4]) ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][6]) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Konsolidovaná Společnost</td>
                <td>IČO</td>
                <td>Rok</td>
                <td>Vlastnický Podíl</td>
                <td>Státní příslušnost</td>
                <td>CEDR-III Součet Rozhodnutí</td>
                <td>CEDR-III Součet Spotřebováno</td>
                <td>Součet Pobídek CzechInvest</td>
                <td>Součet Strukturální Fondy 2007-2013</td>
                <td>Součet Strukturální Fondy 2014-2020</td>
                <td>Součet DotInfo.cz</td>
                <th>Součet Darů Politickým Stranám</th>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="attachments">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Název</th>
                <th class="nosearch">Odkaz (PDF)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $shown_ids = [];
            foreach ($subsidiaries as $s) {
                if (in_array($s->attachment_id, $shown_ids)) continue;
                if (empty($s->attachment)) continue;
                $shown_ids[] = $s->attachment_id;
                ?>
                <tr>
                    <td><?= $s->attachment->name ?></td>
                    <td><?= $this->Html->link(str_replace("data.dotacni-parazit.cz", "dotacni-parazit.cz", $s->attachment->url)) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název</td>
                <td>Odkaz (PDF)</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <?php if (!empty($holding->notes)) { ?>
        <div id="notes">
            <?= $holding->notes ?>
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
    var sumtable;

    function printSum(api) {
        var soucet = 0, soucetSpotrebovano = 0, soucetCzechInvest = 0, soucetStrukturalni2013 = 0,
            soucetStrukturalni2020 = 0, soucetDotinfo = 0, soucetDary = 0;

        api.rows().every(function (index, tableLoop, rowLoop) {
            try {
                soucet += this.data()[5].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                soucetSpotrebovano += this.data()[6].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                soucetCzechInvest += this.data()[7].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                soucetStrukturalni2013 += this.data()[8].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                //soucetStrukturalni2020 += this.data()[9].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                soucetDotinfo += this.data()[10].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                soucetDary += this.data()[11].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;

            } catch (ignore) {
                console.log(this.data());
            }
        });

        $("#soucetRozhodnuti").text("Součet zobrazených řádků (částka rozhodnutá): " + $.fn.dataTable.render.number('.', ',', 0).display(soucet) + " Kč");
        $("#soucetSpotreba").text("Součet zobrazených řádků (částka spotřebovaná): " + $.fn.dataTable.render.number('.', ',', 0).display(soucetSpotrebovano) + " Kč");
        $("#soucetCzechInvest").text("Součet zobrazených řádků (investiční pobídky): " + $.fn.dataTable.render.number('.', ',', 0).display(soucetCzechInvest) + " Kč");
        $("#soucetDotinfo").text("Součet zobrazených řádků (DotInfo.cz): " + $.fn.dataTable.render.number('.', ',', 0).display(soucetDotinfo) + " Kč");
        $("#soucetDary").text("Součet zobrazených řádků (dary politickým stranám): " + $.fn.dataTable.render.number('.', ',', 0).display(soucetDary) + " Kč");
        $("#soucetStrukturalni2013").text("Součet zobrazených řádků (Strukturální fondy 2007-2013): " + $.fn.dataTable.render.number('.', ',', 0).display(soucetStrukturalni2013) + " Kč");
        //$("#soucetStrukturalni2020").text("Součet zobrazených řádků (Strukturální fondy 2014-2020): " + $.fn.dataTable.render.number('.', ',', 0).display(soucetStrukturalni2020) + " Kč");
    }

    $(function () {
        $("#tabs").tabs({
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });

        sumtable = setupDataTable($("#sumtable"));
    });
</script>