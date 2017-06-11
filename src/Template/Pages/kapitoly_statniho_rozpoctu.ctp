<table>
    <thead>
    <tr>
        <th>Název</th>
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
        <th>Název</th>
        <th>Kód Programu</th>
        <th>Platnost Do</th>
    </tr>
    </tfoot>
</table>
