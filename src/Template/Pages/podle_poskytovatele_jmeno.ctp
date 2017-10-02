<?php
$this->set('title', 'Podle Jména');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

?>

<div id="tabs2">
    <ul>
        <li><a href="#jmeno">Vyhledávání podle Jména</a></li>
    </ul>
    <div id="jmeno">
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('name', ['label' => 'Jméno poskytovatele (alespoň 3 písmena)', 'value' => $name]);
        echo $this->Form->submit('Hledat!');
        echo $this->Form->end();
        echo 'použijte * pro hledání částí slova, např. "techn*" najde "technologie"';
        ?>
    </div>
</div>
<hr/>
<div id="tabs">
    <ul>
        <li id="tab-dotacni-urady"><a href="#dotacni-urady">CEDR III - Dotační Úřady</a></li>
        <li id="tab-zdroje-financovani"><a href="#zdroje-financovani">CEDR III - Zdroje Financování</a></li>
        <li id="tab-dotacni-tituly"><a href="#dotacni-tituly">CEDR III - Dotační Tituly</a></li>
        <li id="tab-dotinfo"><a href="#dotinfo">DotInfo.cz</a></li>
    </ul>
    <div id="dotacni-urady">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&dotacni-urady=dotacni-urady">
            <thead>
            <tr>
                <th>Dotační úřad</th>
                <th>Součet rozhodnutých částek</th>
                <th>Součet spotřebovaných částek</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Dotační úřad</td>
                <td>Součet rozhodnutých částek</td>
                <td>Součet spotřebovaných částek</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="zdroje-financovani">
        <table class="datatable" style="width: 100%;"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&zdroje-financovani=zdroje-financovani">
            <thead>
            <tr>
                <th>Zdroj Financování</th>
                <th>Součet rozhodnutých částek</th>
                <th>Součet spotřebovaných částek</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Zdroj Financování</td>
                <td>Součet rozhodnutých částek</td>
                <td>Součet spotřebovaných částek</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="dotacni-tituly">
        <table class="datatable" style="width: 100%;"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&dotacni-tituly=dotacni-tituly">
            <thead>
            <tr>
                <th>Dotační Titul</th>
                <th>Kód Titulu</th>
                <th>Kapitola státního rozpočtu</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Dotační Titul</td>
                <td>Kód Titulu</td>
                <td>Kapitola státního rozpočtu</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="dotinfo">
        <table class="datatable" style="width: 100%;"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&dotinfo=dotinfo">
            <thead>
            <tr>
                <th>Poskytovatel</th>
                <th>IČO</th>
                <th>Součet schválených</th>
                <th>Počet rozhodnutí</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Poskytovatel</td>
                <td>IČO</td>
                <td>Součet schválených</td>
                <td>Počet rozhodnutí</td>
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
                case 'dotacni-urady':
                    $("#tab-dotacni-urady").remove();
                    $("#dotacni-urady").remove();
                    break;
                case 'zdroje-financovani':
                    $("#tab-zdroje-financovani").remove();
                    $("#zdroje-financovani").remove();
                    break;
                case 'dotacni-tituly':
                    $("#tab-dotacni-tituly").remove();
                    $("#dotacni-tituly").remove();
                    break;
                case 'dotinfo':
                    $("#tab-dotinfo").remove();
                    $("#dotinfo").remove();
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