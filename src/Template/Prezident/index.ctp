<?php
$this->set('title', 'Dary Prezidentským Kandidátům');
function prezident_array_sum($carry, $item)
{
    $carry += $item['amount'];
    return $carry;
}

?>
<div class="alert alert-info">
    Informace o darech právnických osob kandidátům na prezidenta ve volebním roce 2018 a dotačních příjmů těchto dárců
    dle informací na jejich transparentním účtu. Data ke dni 9. 1. 2018.
</div>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th>Prezidentský kandidát</th>
        <th data-type="currency">Součet darů od PO</th>
        <th class="nosearch">Otevřít</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($kandidati as $k) { ?>
        <tr>
            <td><?= $this->Html->link($k->name, '/kandidati-na-prezidenta/detail/' . $k->id) ?></td>
            <td><?= \App\View\DPUTILS::currency(array_reduce($dary[$k->id], "prezident_array_sum")) ?></td>
            <td><?= $this->Html->link('Otevřít', '/kandidati-na-prezidenta/detail/' . $k->id) ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Prezidentský kandidát</td>
        <td>Součet darů od PO</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>