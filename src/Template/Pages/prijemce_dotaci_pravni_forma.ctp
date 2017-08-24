<?php
$this->set('title', 'Příjemce Pomoci - Právní Forma');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#pf">Právní Forma</a></li>
        <li><a href="#spf">Společná Právní Forma</a></li>
    </ul>
    <div id="pf">
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('pravniforma', ['options' => $pravni_formy, 'value' => $pravni_forma, 'type' => 'select', 'label' => 'Právní Forma']);
        echo $this->Form->submit('Zobrazit!');
        echo $this->Form->end();
        ?>
    </div>
    <div id="spf">
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('spf', ['options' => $spolecne_pravni_formy, 'value' => $spolecna_pravni_forma, 'type' => 'select', 'label' => 'Právní Forma']);
        echo $this->Form->submit('Zobrazit!');
        echo $this->Form->end();
        ?>
    </div>
</div>
<table id="datatable" style="width: 100%" data-ajax="<?= $this->request->here(false) ?>">
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
<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($spolecna_pravni_forma) ? '0' : '1' ?>
        });
    });
</script>
