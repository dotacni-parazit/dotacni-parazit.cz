<?php
/** @var \App\Model\Entity\Company $owner */

use Cake\I18n\Number;

/** @var \App\Model\Entity\Consolidation[] $subsidiaries */
/** @var \App\Model\Entity\Owner[] $holdingy */
$this->set('title', $owner->name . ' - Vlastník Holdingů');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné Informace</a></li>
        <li><a href="#holdingy">Vlastněné Holdingy</a></li>
        <li><a href="#subsidiaries">Vlastněné Společnosti</a></li>
        <li><a href="#attachments">Výkazy holdingů</a></li>
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
                <td><?= $owner->name ?></td>
            </tr>

            <tr>
                <td>IČ</td>
                <td><?= $owner->ico ?></td>
            </tr>

            <tr>
                <td>Počet vlastněných holdingů</td>
                <td><?= count($holdingy) ?></td>
            </tr>

            <tr>
                <td>Státní Příslušnost</td>
                <td><?= $owner->state->name . ' (' . $owner->state->kod . ')' ?></td>
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
    <div id="holdingy">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název Holdingu</th>
                <th>Rok vlastnictví</th>
                <th>Vlastnický Podíl</th>
                <th>Poznámky</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($holdingy as $h) { ?>
                <tr>
                    <td><?= $h->company->name ?></td>
                    <td><?= $h->year ?></td>
                    <td><?= Number::toPercentage($h->shares_percent) ?></td>
                    <td><?= $h->notes ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název Holdingu</td>
                <td>Rok vlastnictví</td>
                <td>Vlastnický Podíl</td>
                <td>Poznámky</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="subsidiaries">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Společnost</th>
                <th>IČO</th>
                <th>Holding</th>
                <th>Rok</th>
                <th class="nosearch">Podíl holdingu</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($subsidiaries as $s) { ?>
                <tr>
                    <td><?= $s->subsidiary->name ?></td>
                    <td><?= $s->subsidiary->ico ?></td>
                    <td><?= $s->company->name ?></td>
                    <td><?= $s->year ?></td>
                    <td><?= Number::toPercentage($s->shares_percent) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Společnost</td>
                <td>IČO</td>
                <td>Holding</td>
                <td>Rok</td>
                <td>Podíl holdingu</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="attachments">
        <table class="datatable datatable_simple">
            <thead>
            <th class="nosearch">Název</th>
            <th class="nosearch">Odkaz (PDF)</th>
            </thead>
            <tbody>
            <?php
            $shown_ids = [];
            foreach ($subsidiaries as $s) {
                if (in_array($s->attachment_id, $shown_ids)) continue;
                if (empty($s->attachment)) continue;
                $shown_ids[] = $s->attachment_id;
                ?>
                <tr>
                    <td><?= $s->attachment->name ?></td>
                    <td><?= $this->Html->link(str_replace("data.dotacni-parazit.cz", "dotacni-parazit.cz", $s->attachment->url)) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <td>Název</td>
            <td>Odkaz (PDF)</td>
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