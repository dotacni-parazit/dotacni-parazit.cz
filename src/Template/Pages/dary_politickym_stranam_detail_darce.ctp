<?php
/** @var \App\Model\Entity\Company $company */

use Cake\I18n\Number;

$this->set('title', $company->name);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>

<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <?php if (!empty($aliases) && $aliases->count() >= 1) { ?>
            <li><a href="#aliasy">Příjemce dle CEDR</a></li>
        <?php } ?>
        <li><a href="#donations">Dary politickým stranám</a></li>
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
                <td>Název společnosti</td>
                <td><?= $company->name ?></td>
            </tr>
            <tr>
                <td>Typ společnosti</td>
                <td><?= $company->type->label ?></td>
            </tr>
            <tr>
                <td>IČO</td>
                <td><?= $company->ico ?></td>
            </tr>
            <tr>
                <td>Státní příslušnost</td>
                <td><?= $company->state->name ?></td>
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
    <?php if (!empty($aliases) && $aliases->count() >= 1) { ?>
        <div id="aliasy">
            <div id="prijemce_aliasy">
                Příjemce pomoci je také evidován v CEDR pod těmito aliasy (dle IČO): <br/>
                <?php
                /** @var \App\Model\Entity\PrijemcePomoci[] $aliases */
                foreach ($aliases as $p) { ?>
                    <?= $this->Html->link('( ' . str_pad($p->idPrijemce, 44, " ") . ' ) ' . \App\View\DPUTILS::jmenoPrijemcePomoci($p), '/detail-prijemce-pomoci/' . $p->idPrijemce, ['escape' => false]) ?>
                    <br/>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <div id="donations">
        <table class="datatable">
            <thead>
            <tr>
                <th>Rok</th>
                <th>Politická Strana</th>
                <th>Výše daru</th>
            </tr>
            </thead>
            <tbody>
            <?php /** @var \App\Model\Entity\Transaction[] $donations */
            foreach ($donations as $c) { ?>
                <tr>
                    <td><?= $c->year ?></td>
                    <td><?= $this->Html->link($c->recipient->name, '/dary-politickym-stranam/detail/' . $c->recipient_id) ?></td>
                    <td><?= Number::currency($c->amount) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Rok</td>
                <td>Politická Strana</td>
                <td>Auditor</td>
            </tr>
            </tfoot>

        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>