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
            <td><?= $this->Html->link($h->owner[0]->name, '/konsolidace-holdingy/detail-vlastnik/' . $h->owner[0]->id) ?></td>
            <td><?= $this->Html->link($h->name . (empty($h->ico) ? '' : " (" . \App\View\DPUTILS::ico($h->ico) . ")"), '/konsolidace-holdingy/detail/' . $h->id) ?></td>
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