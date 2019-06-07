<?php
/**
 * @var AppView $this
 */

use App\View\AppView;

?>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th>Operační Program - Název</th>
        <th class="nosearch">Počet evidovaných dotací</th>
        <th class="nosearch">Otevřít</th>
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
