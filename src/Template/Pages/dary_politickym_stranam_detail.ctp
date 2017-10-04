<?php
/** @var array $sums */

/** @var \App\Model\Entity\Transaction[] $transactions */

use Cake\I18n\Number;

/** @var \App\Model\Entity\Company $strana */
$this->set('title', $strana->name);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>

<div class="alert alert-info">
    Součtové hodnoty darů politickým stranám v letech jsou pouze informativní. Finální hodnoty finančního vyjádření darů
    politickým stranám závisí na tom, jestli v případě nefinančních darů konkrétní politická uvádí jejich hodnotu ve své
    výroční zprávě
</div>

<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné Informace</a></li>
        <li><a href="#donations">Dary politické straně</a></li>
        <li><a href="#audits">Auditoři</a></li>
        <li><a href="#finals">Výroční Zprávy</a></li>
    </ul>
    <div id="obecne">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Název strany</td>
                <td><?= $strana->name ?></td>
            </tr>

            <tr>
                <td>IČO</td>
                <td><?= \App\View\DPUTILS::ico($strana->ico) ?></td>
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
                    <td><?= $this->Html->link(\App\View\DPUTILS::ico($t->donor->ico), ['controller' => 'Pages', 'action' => 'prijemceDotaciIco', 'ico' => $t->donor->ico]) ?></td>
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
    <div id="audits">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Auditorská Společnost</th>
                <th>Auditor</th>
                <th>Rok Auditu</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($audits as $a) { ?>
                <tr>
                    <td><?= $a->auditor->name . ' (IČ: ' . \App\View\DPUTILS::ico($a->auditor->ico) . ')' ?></td>
                    <td><?= $a->name . ' (' . $a->permission . ')' ?></td>
                    <td><?= $a->year ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Auditorská Společnost</td>
                <td>Auditor</td>
                <td>Rok Auditu</td>
            </tr>
            </tfoot>
        </table>
        <?php ?>
    </div>
    <div id="finals">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název Dokumentu</th>
                <th class="nosearch">URL Adresa (PDF)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $already_done = [];
            foreach ($transactions as $t) {
                if (in_array($t->attachment_id, $already_done)) continue;
                ?>
                <tr>
                    <td><?= $t->attachment->name ?></td>
                    <td><?= $this->Html->link(str_replace("data.dotacni-parazit.cz", "dotacni-parazit.cz", $t->attachment->url)) ?></td>
                </tr>
                <?php
                $already_done[] = $t->attachment_id;
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název Dokumentu</td>
                <td class="nosearch">URL Adresa (PDF)</td>
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