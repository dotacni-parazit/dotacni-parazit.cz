<?php

$this->set('title', 'Operační Programy - Strukturální Fondy');
?>

<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th>Operační Program - Název</th>
        <th>Počet evidovaných dotací</th>
        <th>Otevřít</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ops as $op) { ?>
        <tr>
            <td><?= $this->Html->link($op['OP'], '/strukturalni-fondy-detail/?op=' . $op['OP']) ?></td>
            <td><?= $op['CNT'] ?></td>
            <td><?= $this->Html->link('Otevřít', '/strukturalni-fondy-detail/?op=' . $op['OP']) ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Operační Program - Název</td>
        <td>Počet evidovaných dotací</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>
