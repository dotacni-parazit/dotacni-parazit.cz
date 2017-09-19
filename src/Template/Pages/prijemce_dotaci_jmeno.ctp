<?php
$this->set('title', 'Vyhledávání Jménem - Příjemci Pomoci');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

echo $this->Form->create(null, ['type' => 'get']);
echo $this->Form->input('name', ['label' => 'Obchodní jméno / Jméno / Příjmení (alespoň 3 písmena)', 'value' => $name]);
echo $this->Form->submit('Hledat!');
echo $this->Form->end();
echo 'použijte * pro hledání částí slova, např. "techn*" najde "technologie"';
?>
<hr/>

<div id="tabs">
    <ul>
        <li><a href="#cedr">CEDR</a></li>
        <li><a href="#czechinvest">Investiční pobídky</a></li>
        <li><a href="#strukturalniFondy">Strukturální Fondy</a></li>
        <li><a href="#dotInfo">DotInfo</a></li>
        <li><a href="#politickeStrany">Dárci Politických Stran</a></li>
    </ul>
    <div id="cedr">
        <table id="datatable" style="width: 100%" data-ajax="<?= $this->request->here(false)  . (strpos($this->request->here(false), "?") == false ? "?name=" : "")?>&cedr=cedr">
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
        <table class="datatable" style="width: 100%" data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&dotinfo=dotinfo">
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
</div>

<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($multiple) ? '0' : '1' ?>
        });
    });
</script>