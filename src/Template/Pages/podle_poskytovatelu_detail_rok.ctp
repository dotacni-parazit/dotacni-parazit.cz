<?php
/**
 * @var AppView $this
 */

use App\View\AppView;
use Cake\I18n\Number;

$this->set('title', $poskytovatel->dotacePoskytovatelNazev);
?>
<strong>
    Součet za rok <?= $year ?>: <?= Number::currency($year_sum) ?>
</strong>
<br/>
<table id="datatable"
       data-ajax="/podle-poskytovatelu/<?php echo $poskytovatel->dotacePoskytovatelKod ?>/complete/ajax/<?= $year ?>">
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
        <td>Příjemce Pomoci</td>
        <td>Dotace (kod nebo identifikator projektu)</td>
        <td>Částka</td>
        <td>Rok</td>
        <td>Členění finančních prostředků</td>
        <td>Finanční Zdroj</td>
    </tr>
    </tfoot>
</table>