<?php
/** @var array $sums */

/** @var \App\Model\Entity\Transaction[] $transactions */

use Cake\I18n\Number;

/** @var \App\Model\Entity\Company $strana */
$this->set('title', $strana->name . ' - Dary Politické Straně');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>

<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné Informace</a></li>
        <li><a href="#donations">Dary politické straně</a></li>
    </ul>
    <div id="obecne">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Vlastnost</th>
                <th>Hodnota</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Název strany</td>
                <td><?= $strana->name ?></td>
            </tr>

            <tr>
                <td>IČO</td>
                <td><?= str_pad($strana->ico, 8, '0', STR_PAD_LEFT) ?></td>
            </tr>

            <tr>
                <td>Součet darů 2012</td>
                <td><?= Number::currency($sums[$strana->id][2012]) ?></td>
            </tr>

            <tr>
                <td>Součet darů 2013</td>
                <td><?= Number::currency($sums[$strana->id][2013]) ?></td>
            </tr>

            <tr>
                <td>Součet darů 2014</td>
                <td><?= Number::currency($sums[$strana->id][2014]) ?></td>
            </tr>

            <tr>
                <td>Součet darů 2015</td>
                <td><?= Number::currency($sums[$strana->id][2015]) ?></td>
            </tr>

            <tr>
                <td>Součet darů 2016</td>
                <td><?= Number::currency($sums[$strana->id][2016]) ?></td>
            </tr>

            </tbody>
            <tfoot>
            <tr>
                <td>Vlastnost</td>
                <td>Hodnota</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="donations">
        <table class="datatable">
            <thead>
            <tr>
                <th>Dárce P.O.</th>
                <th>Dárce IČO</th>
                <th>Rok</th>
                <th class="nosearch" data-type="currency">Částka</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($transactions as $t) { ?>
                <tr>
                    <td><?= $this->Html->link($t->donor->name, ['controller' => 'Pages', 'action' => 'prijemceDotaciJmeno', 'name' => $t->donor->name]) ?></td>
                    <td><?= $this->Html->link(str_pad($t->donor->ico, 8, '0', STR_PAD_LEFT), ['controller' => 'Pages', 'action' => 'prijemceDotaciIco', 'ico' => $t->donor->ico]) ?></td>
                    <td><?= $t->year ?></td>
                    <td><?= Number::currency($t->amount) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Dárce P.O.</td>
                <td>Dárce IČO</td>
                <td>Rok</td>
                <td>Částka</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>