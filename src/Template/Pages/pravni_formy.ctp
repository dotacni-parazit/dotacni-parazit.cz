<table>
    <thead>
    <tr>
        <th>Název</th>
        <th>Zkratka</th>
        <th>Kód P.F.</th>
        <th>Kód typu P.F.</th>
        <th>Konec Platnosti</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $d) {
        ?>
        <tr>
            <td><?= $this->Html->link($d->pravniFormaNazev, $d->id) ?></td>
            <td><?= $d->pravniFormaNazevZkraceny ?></td>
            <td><?= $d->pravniFormaKod ?></td>
            <td><?= $d->pravniFormaTypKod ?></td>
            <td><?= $d->zaznamPlatnostDoDatum->year ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

    <tfoot>
    <tr>
        <th>Název</th>
        <th>Zkratka</th>
        <th>Kód P.F.</th>
        <th>Kód typu P.F.</th>
        <th>Konec Platnosti</th>
    </tr>
    </tfoot>
</table>
