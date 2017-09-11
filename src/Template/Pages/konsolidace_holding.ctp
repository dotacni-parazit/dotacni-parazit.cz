<?php
/** @var \App\Model\Entity\Owner[] $owners */
/** @var \App\Model\Entity\Consolidation[] $subsidiaries */

use Cake\I18n\Number;

/** @var \App\Model\Entity\Company $holding */
$this->set('title', $holding->name . ' - Detail Holdingu');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Informace o Holdingu</a></li>
        <li><a href="#owners">Vlastnická Historie</a></li>
        <li><a href="#subsidiaries">Konsolidované společnosti</a></li>
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
                <td>Jméno</td>
                <td><?= $holding->name ?></td>
            </tr>

            <tr>
                <td>IČ</td>
                <td><?= $holding->ico ?></td>
            </tr>

            <tr>
                <td>Počet konsolidovaných společností</td>
                <td><?= count($holding->subsidiaries) ?></td>
            </tr>

            <tr>
                <td>Státní Příslušnost</td>
                <td><?= $holding->state->name . ' (' . $holding->state->kod . ')' ?></td>
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
    <div id="owners">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Vlastník</th>
                <th class="nosearch">Rok</th>
                <th class="nosearch">Vlastnický Podíl</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($owners as $o) { ?>
                <tr>
                    <td><?= $o->owner->name ?></td>
                    <td><?= $o->year ?></td>
                    <td><?= Number::toPercentage($o->shares_percent) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Vlastník</th>
                <th>Rok</th>
                <th>Vlastnický Podíl</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="subsidiaries">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Konsolidovaná Společnost</th>
                <th>IČO</th>
                <th>Rok</th>
                <th>Vlastnický Podíl</th>
                <th>Státní příslušnost</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($subsidiaries as $s){ ?>
                <tr>
                    <td><?= $s->subsidiary->name ?></td>
                    <td><?= $s->subsidiary->ico ?></td>
                    <td><?= $s->year ?></td>
                    <td><?= Number::toPercentage($s->shares_percent) ?></td>
                    <td><?= $s->subsidiary->state->name ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Konsolidovaná Společnost</th>
                <th>IČO</th>
                <th>Rok</th>
                <th>Vlastnický Podíl</th>
                <th>Státní příslušnost</th>
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