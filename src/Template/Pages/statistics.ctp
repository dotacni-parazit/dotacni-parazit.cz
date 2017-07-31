<?php


$this->set('title', 'Statistiky využití databáze');
?>
<?php foreach ($tables as $t) { ?>
    <div class="table_stats">
        <h2><?= $t->name ?></h2>
        <table>
            <thead>
            <tr>
                <th>Sloupec</th>
                <th>Prázných buňek</th>
                <th>Nejčastější hodnota</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($t->columns as $c) { ?>
                <tr>
                    <td><?= $c->name ?></td>
                    <td><?= $c->percent_empty ?> %</td>
                    <td><?= $c->most_common_value ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Sloupec</td>
                <td>Prázných buňek</td>
                <td>Nejčastější hodnota</td>
            </tr>
            </tfoot>
        </table>
    </div>
<?php } ?>
