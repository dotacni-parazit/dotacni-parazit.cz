<?php
$this->set('title', 'Kapitoly Státního Rozpočtu - Ukazatele');

?>

<table class="datatable">
    <thead>
    <tr>
        <th>Název Ukazatele</th>
        <th>Kód Ukazatele</th>
        <th>Kód Kapitoly Státního Rozpočtu</th>
        <th>Platnost Od</th>
        <th>Platnost Do</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $d) { ?>
        <tr>
            <td><?= $d->statniRozpocetUkazatelNazev ?></td>
            <td><?= $d->statniRozpocetUkazatelKod ?></td>
            <td><?= $d->statniRozpocetKapitolaKod ?></td>
            <td><?= $d->zaznamPlatnostOdDatum->nice() ?></td>
            <td><?= $d->zaznamPlatnostDoDatum->nice() ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Název Ukazatele</td>
        <td>Kód Ukazatele</td>
        <td>Kód Kapitoly Státního Rozpočtu</td>
        <td>Platnost Od</td>
        <td>Platnost Do</td>
    </tr>
    </tfoot>
</table>