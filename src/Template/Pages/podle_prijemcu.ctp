<?php


$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
$this->set('title', 'Příjemci dotací');
?>
<div id="tabs">
    <ul>
        <li><a href="#tabs-5">Rozcestník</a></li>
        <li><a href="#tabs-1">Podle IČO</a></li>
        <li><a href="#tabs-2">Podle Jména Příjemce</a></li>
        <li><a href="#tabs-4">Podle Právní Formy</a></li>
        <li><a href="#tabs-3">Více příjemců zároveň</a></li>
        <li><a href="#tabs-6">Seznam zváštních IČO</a></li>
    </ul>
    <div id="tabs-5">
        <div class="homepage_tile"><a href="/fyzicke-osoby">FO Nepodnikající</a></div>
        <div class="homepage_tile"><a href="/fyzicke-osoby">FO Podnikající</a></div>
        <div class="homepage_tile"><a href="/fyzicke-osoby">PO Tuzemské</a></div>
        <div class="homepage_tile"><a href="/fyzicke-osoby">PO Zahraniční</a></div>
        <br class="clear"/>
    </div>
    <div id="tabs-1">
        <h2>Podle IČO</h2>

    </div>
    <div id="tabs-2">
        <h2>Podle jména</h2>
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('name', ['label' => 'Obchodní jméno / Jméno / Příjmení (alespoň 3 písmena)', 'value' => $name]);
        echo $this->Form->submit('Hledat!');
        echo $this->Form->end();
        echo 'použijte * pro hledání částí slova, např. "techn*" najde "technologie"';
        ?>
    </div>
    <div id="tabs-3">
        <h2>Více příjemců zároveň (IČO)</h2>
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->input('multiple', ['label' => 'IČO několika příjemců', 'value' => $multiple]);
        echo $this->Form->submit('Zobrazit!');
        echo $this->Form->end();
        echo 'Zadejte IČ příjemců oddělená čárkou nebo mezerou';
        ?>
    </div>
    <div id="tabs-4">
        <h2>Podle Právní Formy</h2>

    </div>
    <div id="tabs-6">
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
    </div>
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
<?php } ?>