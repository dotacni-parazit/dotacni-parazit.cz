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
        <li><a href="#cedr">Investiční pobídky</a></li>
        <li><a href="#cedr">Strukturální Fondy</a></li>
        <li><a href="#cedr">DotInfo</a></li>
        <li><a href="#cedr">Politické Strany</a></li>
    </ul>
    <div id="cedr">
        <table id="datatable" style="width: 100%" data-ajax="<?= $this->request->here(false) ?>">
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