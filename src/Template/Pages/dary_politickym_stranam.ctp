<?php
/** @var \App\Model\Entity\Company[] $data */
/** @var array $sums */

use Cake\I18n\Number;

$this->set('title', 'Dary Politickým Stranám');
?>
<div class="alert alert-info">
    Součet, tj. součet darů politické straně za daný rok pouze od právnických osob
</div>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th class="nosearch">Politická Strana</th>
        <th class="nosearch" data-type="currency">Součet r. 2012</th>
        <th class="nosearch" data-type="currency">Součet r. 2013</th>
        <th class="nosearch" data-type="currency">Součet r. 2014</th>
        <th class="nosearch" data-type="currency">Součet r. 2015</th>
        <th class="nosearch" data-type="currency">Součet r. 2016</th>
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
        <td>Detail</td>
    </tr>
    </tfoot>
</table>
