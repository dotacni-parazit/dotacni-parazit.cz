<?php
$this->set('title', 'Podle IČO');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div class="alert alert-info">
    Všechny právnické osoby a fyzické osoby podnikající evidované v CEDR III, Dotinfo, přehledu investičních pobídek, na
    strukturální-fondy.cz a přehledu dárců politických stran jako příjemci dotací.
</div>
<div id="tabs2">
    <ul>
        <li><a href="#search">Vyhledávání podle IČO</a></li>
        <li><a href="#multiple">Výběr více IČO zároveň</a></li>
    </ul>
    <div id="search">
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->control('ico', ['label' => 'IČO (pouze čísla) ', 'value' => \App\View\DPUTILS::ico($ico)]);
        echo $this->Form->submit('Hledat!');
        echo $this->Form->end();
        ?>
    </div>
    <div id="multiple">
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->control('multiple', ['label' => 'Jedno a více IČO (oddělené mezerou nebo čárkou) ', 'value' => \App\View\DPUTILS::ico($ico)]);
        echo $this->Form->submit('Zobrazit!');
        echo $this->Form->end();
        ?>
    </div>
</div>
<hr/>
<div id="tabs">
    <ul>
        <li id="tab-cedr"><a href="#cedr">CEDR</a></li>
        <li id="tab-czechinvest"><a href="#czechinvest">Investiční pobídky</a></li>
        <li id="tab-strukturalni-fondy"><a href="#strukturalniFondy">Strukturální Fondy 2007 - 2013</a></li>
        <li id="tab-strukturalni-fondy-2020"><a href="#strukturalniFondy2020">Strukturální Fondy 2014 - 2020</a></li>
        <li id="tab-dotinfo"><a href="#dotInfo">DotInfo</a></li>
        <li id="tab-politickeStrany"><a href="#politickeStrany">Dotace Dárců Politických Stran</a></li>
        <li id="tab-konsolidace"><a href="#konsolidace">Konsolidace</a></li>
        <li id="tab-szif"><a href="#szif">Státní Zemědělský Intervenční Fond</a></li>
    </ul>
    <div id="cedr">
        <table id="datatable" style="width: 100%"
               data-ajax="<?= $this->request->getRequestTarget() . (strpos($this->request->getRequestTarget(), "?") == false ? "?ico=0" : "") ?>&cedr=cedr">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>IČO</th>
                <th>Státní Příslušnost</th>
                <th class="nosearch">Otevřít</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Jméno</td>
                <td>IČO</td>
                <td>Státní Příslušnost</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="czechinvest">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->getRequestTarget() . (strpos($this->request->getRequestTarget(), "?") == false ? "?ico=0" : "") ?>&czechinvest=czechinvest">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>IČO</th>
                <th class="nosearch" data-type="currency">Investice CZK</th>
                <th class="nosearch">Datum Rozhodnutí</th>
                <th class="nosearch">Otevřít</th>
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
               data-ajax="<?= $this->request->getRequestTarget() . (strpos($this->request->getRequestTarget(), "?") == false ? "?ico=0" : "") ?>&strukturalni-fondy=strukturalni-fondy">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>IČO</th>
                <th class="nosearch" data-type="currency">Veřejné Zdroje Celkem</th>
                <th>Číslo Projektu</th>
                <th>Název Projektu</th>
                <th class="nosearch">Otevřít</th>
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

    <div id="strukturalniFondy2020">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->getRequestTarget() . (strpos($this->request->getRequestTarget(), "?") == false ? "?ico=0" : "") ?>&strukturalni-fondy-2020=strukturalni-fondy-2020">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>IČO</th>
                <th class="nosearch" data-type="currency">Veřejné Zdroje Celkem</th>
                <th>Číslo Projektu</th>
                <th>Název Projektu</th>
                <th class="nosearch">Otevřít</th>
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
               data-ajax="<?= $this->request->getRequestTarget() . (strpos($this->request->getRequestTarget(), "?") == false ? "?ico=0" : "") ?>&dotinfo=dotinfo">
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

    <div id="politickeStrany">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->getRequestTarget() . (strpos($this->request->getRequestTarget(), "?") == false ? "?ico=0" : "") ?>&politickeStrany=politickeStrany">
            <thead>
            <tr>
                <th>Dárce</th>
                <th>Strana</th>
                <th>Rok</th>
                <th class="nosearch">Výše Daru</th>
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

    <div id="szif">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->getRequestTarget() . (strpos($this->request->getRequestTarget(), "?") == false ? "?ico=0" : "") ?>&szif=szif">
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

    <div id="konsolidace">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->getRequestTarget() . (strpos($this->request->getRequestTarget(), "?") == false ? "?name=" : "") ?>&konsolidace=konsolidace">
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
    $(function () {
        var tabs;
        $(function () {
            tabs = $("#tabs").tabs({
                collapsible: false,
                active: <?= empty($multiple) ? '0' : '1' ?>
            });
        });

        $("#tabs2").tabs({
            collapsible: false,
            active: <?= empty($multiple) ? '0' : '1' ?>
        });
    });

    function initCallback(table) {
        console.log(table);
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
                case 'strukturalni-fondy-2020':
                    $("#strukturalniFondy2020").remove();
                    $("#tab-strukturalni-fondy-2020").remove();
                    break;
                case 'konsolidace':
                    $("#konsolidace").remove();
                    $("#tab-konsolidace").remove();
                    break;
                case 'szif':
                    $("#szif").remove();
                    $("#tab-szif").remove();
                    break;
            }
            $("#tabs").tabs("refresh");
        }
        if ($("#tabs div").children().length === 0) {
            if ($("input#ico").val() !== "") {
                $("#tabs").append("<h2>Nic nebylo nalezeno</h2>");
            }
        }
    }
</script>