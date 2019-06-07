<?php
/**
 * @var AppView $this
 * @var Company $company
 */

$this->set('title', $company->name);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

use App\Model\Entity\Audit;
use App\Model\Entity\Company;
use App\View\AppView;
use App\View\DPUTILS; ?>

<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <?php if (!empty($aliases) && $aliases->count() >= 1) { ?>
            <li><a href="#aliasy">Příjemce dle CEDR</a></li>
        <?php } ?>
        <li><a href="#audits">Audity</a></li>
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
                foreach ($aliases as $p) { ?>
                    <?= $this->Html->link('( ' . str_pad($p->idPrijemce, 44, " ") . ' ) ' . DPUTILS::jmenoPrijemcePomoci($p), '/detail-prijemce-pomoci/' . $p->idPrijemce, ['escape' => false]) ?>
                    <br/>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <div id="audits">
        <table class="datatable">
            <thead>
            <tr>
                <th>Rok</th>
                <th>Politická Strana</th>
                <th>Auditor</th>
            </tr>
            </thead>
            <tbody>
            <?php /** @var Audit[] $audits */
            foreach ($audits as $c) { ?>
                <tr>
                    <td><?= $c->year ?></td>
                    <td><?= $this->Html->link($c->company->name, '/dary-politickym-stranam/detail/' . $c->company_id) ?></td>
                    <td><?= $c->name . ' (oprávnění č.' . $c->permission . ')' ?></td>
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
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>