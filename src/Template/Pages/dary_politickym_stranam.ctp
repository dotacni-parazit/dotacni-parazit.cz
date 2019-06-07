<?php
/**
 * @var AppView $this
 */
/** @var Company[] $data */

/** @var array $sums */

use App\Model\Entity\Company;
use App\View\AppView;
use Cake\I18n\Number;

$this->set('title', 'Dotace Dárců Politických Stran');
?>
<div class="alert alert-info">
    Přehled darů od právnických osob podle informací vykázaných ve Výročních finančních zprávách jednotlivých
    politických stran.
    <br/>
    V přehledu jsou zahrnuty finanční i nefinanční dary.
    <br/>
    V případě nefinančních darů je částka uvedena dle informace politické strany, případně je uvedena nulová hodnota,
    pokud žádnou hodnotu strana neuvádí.
</div>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th class="nosearch">Politická Strana</th>
        <th class="nosearch" data-type="currency">Součet r. 2012</th>
        <th class="nosearch" data-type="currency">r. 2013</th>
        <th class="nosearch" data-type="currency">r. 2014</th>
        <th class="nosearch" data-type="currency">r. 2015</th>
        <th class="nosearch" data-type="currency">r. 2016</th>
        <th class="nosearch" data-type="currency">r. 2017</th>
        <th class="nosearch">Detail</th>
    </tr>
    </thead>
    <?php foreach ($data as $strana) { ?>
        <tr>
            <td><?= $strana->name ?></td>
            <td><?= Number::currency($sums[$strana->id][2012]) ?></td>
            <td><?= Number::currency($sums[$strana->id][2013]) ?></td>
            <td><?= Number::currency($sums[$strana->id][2014]) ?></td>
            <td><?= Number::currency($sums[$strana->id][2015]) ?></td>
            <td><?= Number::currency($sums[$strana->id][2016]) ?></td>
            <td><?= Number::currency($sums[$strana->id][2017]) ?></td>
            <td><?= $this->Html->link('Otevřít', '/dary-politickym-stranam/detail/' . $strana->id) ?></td>
        </tr>
    <?php } ?>
    <tfoot>
    <tr>
        <td>Politická Strana</td>
        <td>Součet r. 2012</td>
        <td>2013</td>
        <td>2014</td>
        <td>2015</td>
        <td>2016</td>
        <td>2017</td>
        <td>Detail</td>
    </tr>
    </tfoot>
</table>
