<?php
$this->set('title', 'Konsolidace holdingů');
?>

<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th>Vlastník Holdingu</th>
        <th>Název Holdingu</th>
        <th>Otevřít</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($holdingy as $h) { ?>
        <tr>
            <td><?= "" ?></td>
            <td><?= $h->name . " (" . $h->ico . ")" ?></td>
            <td><?= $this->Html->link('Otevřít', '/konsolidace-holdingy/detail/' . $h->id) ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Vlastník Holdingu</td>
        <td>Název Holdingu</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>