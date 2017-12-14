<table class="datatable">
    <thead>
    <tr>
        <th>Obec</th>
        <th>Počet poskynutí</th>
        <th data-type="currency">Součet (celkem)</th>
        <th data-type="currency">Součet (tuzemské fondy)</th>
        <th data-type="currency">Součet (EU fondy)</th>
        <th>Otevřít</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($obce as $o) { ?>
        <tr>
            <td><?= $this->Html->link($o->obec, '/program-rozvoje-venkova/obec/?name=' . urlencode($o->obec) . '&okres=' . urlencode($o->okres)) ?></td>
            <td><?= $o->count ?></td>
            <td><?= \App\View\DPUTILS::currency($o->sum_celkem) ?></td>
            <td><?= \App\View\DPUTILS::currency($o->sum_tuzemske) ?></td>
            <td><?= \App\View\DPUTILS::currency($o->sum_evropske) ?></td>
            <td><?= $this->Html->link('Otevřít', '/program-rozvoje-venkova/obec/?okres=' . urlencode($o->okres) . '&name=' . urlencode($o->obec)) ?></td>
        </tr>
    <?php } ?>
    <?php
    $this->set('title', $obce->last()->okres);
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Obec</td>
        <td>Počet poskynutí</td>
        <td>Součet (celkem)</td>
        <td>Součet (tuzemské fondy)</td>
        <td>Součet (EU fondy)</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>