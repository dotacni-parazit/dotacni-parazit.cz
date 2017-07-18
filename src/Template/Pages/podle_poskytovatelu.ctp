<?php
use Cake\I18n\Number;

?>
<h1>Poskytovatelé Dotací</h1>
<table>
    <thead>
    <tr>
        <th><a href="?sort=poskytovatel">Poskytovatel</a></th>
        <th><a href="?sort=sum">Součet poskytnutých dotací</a></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $d) {
        ?>
        <tr>
            <td><?= $this->Html->link($d->dotacePoskytovatelNazev, '/podle-poskytovatelu/' . $d->dotacePoskytovatelKod) ?></td>
            <td><?= Number::currency($counts[$d->id], 'CZK', ['zero' => '']) ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th><a href="?sort=poskytovatel">Poskytovatel</a></th>
        <th><a href="?sort=sum">Součet poskytnutých dotacík</a></th>
    </tr>
    </tfoot>
</table>