<?php
$this->set('title', 'Statistika Využití Databáze');
?>
<div class="alert alert-info">
    Statistika využití databáze / tabulek, s daty importovanými přímo ze systému CEDR
    <br/>
    Procenta ukazují počet nevyužitých / nevypněných hodnot v daném sloupci
</div>
<strong>Navigace</strong><br/>
<ul>
    <?php foreach ($tables as $t) { ?>
        <li><a href="#<?= $t->name ?>"><?= $t->name ?></a></li>
    <?php } ?>
</ul>
<?php foreach ($tables as $t) { ?>
    <div class="table_stats">
        <h2 id="<?= $t->name ?>"><?= $t->name ?></h2>
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
