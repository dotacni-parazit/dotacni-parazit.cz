<?php

use Cake\I18n\Number;

$this->set('title', 'Poskytovatel dotací - ' . $poskytovatel->dotacePoskytovatelNazev . ', rok ' . $year);
?>
<div>
    Součet za rok <?= $year ?>: <?= Number::currency($year_sum) ?>
</div>
<br/>
<br/>
<h2>Rozhodnutí/Dotace za rok <?= $year ?></h2>
<table id="datatable" data-ajax="/podle-poskytovatelu/<?php echo $poskytovatel->dotacePoskytovatelKod ?>/complete/ajax/<?= $year ?>">
    <thead>
    <tr>
        <th data-type="html">Příjemce Pomoci</th>
        <th data-type="html">Dotace (kod nebo identifikator projektu)</th>
        <th data-type="currency">Částka</th>
        <th data-type="number">Rok</th>
        <th data-type="string">Členění finančních prostředků</th>
        <th data-type="string">Finanční Zdroj</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <th>Příjemce Pomoci</th>
        <th>Dotace (kod nebo identifikator projektu)</th>
        <th>Částka</th>
        <th>Rok</th>
        <th>Členění finančních prostředků</th>
        <th>Finanční Zdroj</th>
    </tr>
    </tfoot>
</table>