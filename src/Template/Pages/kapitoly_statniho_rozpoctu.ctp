<?php
$this->set('title', 'Kapitoly Státního Rozpočtu');
?>
<table class="datatable" style="width: 100%;">
    <thead>
    <tr>
        <th class="col">Název</th>
        <th>Kód Kapitoly</th>
        <th>Platnost Do</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $c) {
        ?>
        <tr>
            <td><?= $this->Html->link($c->statniRozpocetKapitolaNazev, $c->id) ?></td>
            <td><?= $c->statniRozpocetKapitolaKod ?></td>
            <td><?= $c->zaznamPlatnostDoDatum->year ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

    <tfoot>
    <tr>
        <td>Název</td>
        <td>Kód Programu</td>
        <td>Platnost Do</td>
    </tr>
    </tfoot>
</table>
