<?php
$this->set('title', 'Vyhledávání IČO - Příjemci Pomoci');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#search">Vyhledávání podle IČO</a></li>
        <li><a href="#multiple">Výběr více IČO zároveň</a></li>
    </ul>
    <div id="search">
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('ico', ['label' => 'IČO (pouze čísla)', 'value' => $ico]);
        echo $this->Form->submit('Hledat!');
        echo $this->Form->end();
        ?>
    </div>
    <div id="multiple">
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('multiple', ['label' => 'Jedno a více IČO (oddělené mezerou nebo čárkou)', 'value' => $ico]);
        echo $this->Form->submit('Zobrazit!');
        echo $this->Form->end();
        ?>
    </div>
</div>
<hr/>
<div id="tabs2">
    <ul>
        <li><a href="#cedr">CEDR</a></li>
        <li><a href="#czechinvest">Investiční pobídky</a></li>
        <li><a href="#strukturalniFondy">Strukturální Fondy</a></li>
        <li><a href="#dotInfo">DotInfo</a></li>
        <li><a href="#politickeStrany">Dárci Politických Stran</a></li>
    </ul>
    <div id="cedr">
        <table id="datatable" style="width: 100%" data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?ico=0" : "") ?>&cedr=cedr">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>IČO</th>
                <th>Státní Příslušnost</th>
                <th>Otevřít</th>
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
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?ico=0" : "") ?>&czechinvest=czechinvest">
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
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?ico=0" : "") ?>&strukturalni-fondy=strukturalni-fondy">
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
        <table class="datatable" style="width: 100%" data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?ico=0" : "") ?>&dotinfo=dotinfo">
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
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?ico=0" : "") ?>&politickeStrany=politickeStrany">
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

        $("#tabs2").tabs({
            collapsible: true,
            active: <?= empty($multiple) ? '0' : '1' ?>
        });
    });
</script>