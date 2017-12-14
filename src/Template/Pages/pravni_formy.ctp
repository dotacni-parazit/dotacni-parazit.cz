<?php
$this->set('title', 'Právní Formy');
?>
<table class="datatable">
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
        <td>Název</td>
        <td>Zkratka</td>
        <td>Kód P.F.</td>
        <td>Kód typu P.F.</td>
        <td>Konec Platnosti</td>
    </tr>
    </tfoot>
</table>
