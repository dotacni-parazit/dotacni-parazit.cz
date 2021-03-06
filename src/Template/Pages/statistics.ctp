<?php
/**
 * @var AppView $this
 */

use App\View\AppView;

$this->set('title', 'Statistika Využití Databáze');
?>
<div class="alert alert-info">
    Statistika využití databáze / tabulek, s daty importovanými přímo ze systému CEDR
    <br/>
    Procenta ukazují počet nevyužitých / nevyplněných hodnot v daném sloupci
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
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Sloupec</th>
                <th class="nosearch">Prázných buňek</th>
                <th class="nosearch">Nejčastější hodnota</th>
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
