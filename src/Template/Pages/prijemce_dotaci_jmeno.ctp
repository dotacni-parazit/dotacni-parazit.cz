<?php
$this->set('title', 'Vyhledávání Jménem - Příjemci Pomoci');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

?>
<hr/>

<div id="tabs2">
    <ul>
        <li><a href="#jmeno">Vyhledávání podle Jména</a></li>
    </ul>
    <div id="jmeno">
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('name', ['label' => 'Obchodní jméno / Jméno / Příjmení (alespoň 3 písmena)', 'value' => $name]);
        echo $this->Form->submit('Hledat!');
        echo $this->Form->end();
        echo 'použijte * pro hledání částí slova, např. "techn*" najde "technologie"';
        ?>
    </div>
</div>
<hr/>
<div id="tabs">
    <ul>
        <li id="tab-cedr"><a href="#cedr">CEDR</a></li>
        <li id="tab-czechinvest"><a href="#czechinvest">Investiční pobídky</a></li>
        <li id="tab-strukturalni-fondy"><a href="#strukturalniFondy">Strukturální Fondy</a></li>
        <li id="tab-dotinfo"><a href="#dotInfo">DotInfo</a></li>
        <li id="tab-politickeStrany"><a href="#politickeStrany">Dárci Politických Stran</a></li>
        <li id="tab-konsolidace"><a href="#konsolidace">Konsolidace</a></li>
    </ul>
    <div id="cedr">
        <table id="datatable" style="width: 100%"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&cedr=cedr">
            <thead>
            <tr>
                <th>Obchodní Jméno</th>
                <th>IČO</th>
                <th>Státní příslušnost</th>
                <th>Detail</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Obchodní Jméno</td>
                <td>IČO</td>
                <td>Státní příslušnost</td>
                <td>Detail</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="czechinvest">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&czechinvest=czechinvest">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>IČO</th>
                <th data-type="currency">Investice CZK</th>
                <th>Datum Rozhodnutí</th>
                <th>Otevřít</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Jméno</td>
                <td>IČO</td>
                <td>Investice CZK</td>
                <td>Datum Rozhodnutí</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="strukturalniFondy">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&strukturalni-fondy=strukturalni-fondy">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>IČO</th>
                <th data-type="currency">Veřejné Zdroje Celkem</th>
                <th>Číslo Projektu</th>
                <th>Název Projektu</th>
                <td>Otevřít</td>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Jméno</td>
                <td>IČO</td>
                <td>Veřejné Zdroje Celkem</td>
                <td>Číslo Projektu</td>
                <td>Název Projektu</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="dotInfo">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&dotinfo=dotinfo">
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

    <div id="politickeStrany">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&politickeStrany=politickeStrany">
            <thead>
            <tr>
                <th>Dárce</th>
                <th>Strana</th>
                <th>Rok</th>
                <th>Výše Daru</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Dárce</td>
                <td>Strana</td>
                <td>Rok</td>
                <td>Výše Daru</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="konsolidace">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&konsolidace=konsolidace">
            <thead>
            <tr>
                <th>Jméno Společnosti</th>
                <th>IČO</th>
                <th>Typ společnosti</th>
                <th class="nosearch">Otevřít</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Jméno Společnosti</td>
                <td>IČO</td>
                <td>Typ společnosti</td>
                <td class="nosearch">Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    var tabs;
    $(function () {
        tabs = $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($multiple) ? '0' : '1' ?>
        });
        $("#tabs2").tabs({
            collapsible: true,
            active: <?= empty($multiple) ? '0' : '1' ?>
        });
    });

    function initCallback(table) {
        var ajax;
        // table.context[0].ajax
        if (table.hasOwnProperty('context')) ajax = table.context[0];
        if (ajax.hasOwnProperty('ajax')) ajax = ajax.ajax;
        if (typeof ajax !== 'undefined') ajax = ajax.split("=").pop();
        var count = table.rows()[0].length;
        if (count === 0) {
            switch (ajax) {
                case 'cedr':
                    $("#cedr").remove();
                    $("#tab-cedr").remove();
                    break;
                case 'politickeStrany':
                    $("#politickeStrany").remove();
                    $("#tab-politickeStrany").remove();
                    break;
                case 'czechinvest':
                    $("#czechinvest").remove();
                    $("#tab-czechinvest").remove();
                    break;
                case 'dotinfo':
                    $("#dotInfo").remove();
                    $("#tab-dotinfo").remove();
                    break;
                case 'strukturalni-fondy':
                    $("#strukturalniFondy").remove();
                    $("#tab-strukturalni-fondy").remove();
                    break;
                case 'konsolidace':
                    $("#konsolidace").remove();
                    $("#tab-konsolidace").remove();
                    break;
            }
            $("#tabs").tabs("refresh");
        }
        if ($("#tabs div").children().length === 0) {
            if ($("input#name").text() !== "") {
                $("#tabs").append("<h2>Nic nebylo nalezeno</h2>");
            }
        }
    }
</script>