<?php
use Cake\I18n\Number;

$this->Html->script('datatable.js', ['block' => true]);
?>
    <div style="text-align: center; width: 49%; float: left; padding: 1%; border: 1px solid black;">
        <h2>Podle IČO</h2>
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('ico', ['label' => 'IČO (pouze čísla)', 'value' => $ico]);
        echo $this->Form->submit('Hledat!');
        echo $this->Form->end();
        echo '("0" jsou "Fyzické osoby")';
        ?>
    </div>
    <div style="text-align: center; width: 49%; float: left; padding: 1%; border: 1px solid black;">
        <h2>Podle jména</h2>
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('name', ['label' => 'Obchodní jméno / Jméno / Příjmení (alespoň 3 písmena)', 'value' => $name]);
        echo $this->Form->submit('Hledat!');
        echo $this->Form->end();
        echo 'použijte * pro hledání částí slova, např. "techn*" najde "technologie"';
        ?>
    </div>
    <br class="clear"/>
<?php
if (!empty($prijemci)) {
    ?>
    <hr/>
    <h2>Nalezení příjemci</h2>
    <table id="datatable">
        <thead>
        <tr>
            <th class="medium-1 large-1">IČO</th>
            <th>Obchodní Jméno</th>
            <th class="medium-2 large-2">Jméno</th>
            <th class="medium-2 large-2">Příjmení</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($prijemci as $p) {
            echo '<tr>';
            echo '<td>' . $this->Html->link($p->ico, '/detail-prijemce-pomoci/' . $p->idPrijemce) . '</td>';
            echo '<td>' . $this->Html->link($p->obchodniJmeno, '/detail-prijemce-pomoci/' . $p->idPrijemce) . '</td>';
            echo '<td>' . $this->Html->link($p->jmeno, '/detail-prijemce-pomoci/' . $p->idPrijemce) . '</td>';
            echo '<td>' . $this->Html->link($p->prijmeni, '/detail-prijemce-pomoci/' . $p->idPrijemce) . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th>IČO</th>
            <th>Obchodní Jméno</th>
            <th>Jméno</th>
            <th>Příjmení</th>
        </tr>
        </tfoot>
    </table>
    <?php
} else {
    ?>
    <h2>Seznam Zvláštností</h2>
    <ul>
        <?php
        foreach ($zvlastni_ico as $ic) {
            ?>
            <li><a href="?ico=<?= $ic->ico ?>">IČO: <?= $ic->ico . ' (' . $ic->obchodniJmeno . ')' ?></a></li>
            <?php
        }
        ?>
        <li><a href="?ico=99999999">IČO: 99999999</a></li>
    </ul>
    <?php
}
?>