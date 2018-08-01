<?php
$this->set('title', 'Hlavní město Praha - Granty');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#recipients">Podle příjemců</a></li>
        <li><a href="#oblasti">Podle oblasti podpory</a></li>
    </ul>

    <div id="recipients">
        <table class="datatable" data-ajax="/granty-praha/ajax/prijemci">
            <thead>
            <tr>
                <th>Název příjemce</th>
                <th>IČ</th>
                <th>Právní forma</th>
                <th>Počet projektů</th>
                <th data-type="currency">Součet přidělených financí</th>
                <th data-type="currency">Součet vyčerpaných / vykázaných financí</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td>Název příjemce</td>
                <td>IČ</td>
                <td>Právní forma</td>
                <td>Počet projektů</td>
                <td>Součet přidělených financí</td>
                <td>Součet vyčerpaných / vykázaných financí</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="oblasti">
        <div class="alert alert-info">
            Podle oblasti podpory MHMP
        </div>
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->control('oblast', ['options' => $oblasti, 'value' => $oblast,'type' => 'select', 'label' => 'Oblast podpory']);
        echo $this->Form->submit('Zobrazit!');
        echo $this->Form->end();
        ?>
        <hr/>
        <table class="datatable nowrap"
               data-ajax="/granty-praha/ajax/projekty/oblast/<?= $oblast ?>">
            <thead>
            <tr>
                <th>Příjemce / Žadatel</th>
                <th data-type="html">Číslo projektu</th>
                <th data-type="html">Název projektu</th>
                <th>Rok Od</th>
                <th>Rok Do</th>
                <th data-type="currency">Celkové náklady</th>
                <th data-type="currency">Požadovaná částka</th>
                <th data-type="currency">Přidělená částka</th>
                <th data-type="currency">Vyčerpaná částka</th>
                <th>Stav</th>
                <th>Název grantového programu</th>
                <th>Název oblasti</th>
                <th>Účel dotace</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Příjemce / Žadatel</td>
                <td>Číslo projektu</td>
                <td>Název projektu</td>
                <td>Rok Od</td>
                <td>Rok Do</td>
                <td>Celkové náklady</td>
                <td>Požadovaná částka</td>
                <td>Přidělená částka</td>
                <td>Vyčerpaná částka</td>
                <td>Stav</td>
                <td>Název grantového programu</td>
                <td>Název oblasti</td>
                <td>Účel dotace</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: false,
            active: <?= isset($_GET['oblast']) ? '1' : '0' ?>
        });
    });
</script>