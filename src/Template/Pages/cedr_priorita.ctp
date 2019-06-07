<?php
/**
 * @var AppView $this
 */

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

$this->set('title', $data->prioritaNazev);

use App\View\AppView; ?>

<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#opatreni">Podřízená CEDR Opatření</a></li>
        <li><a href="#dotace">Dotace</a></li>
    </ul>
    <div id="obecne">
        <table>
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Název Priority</td>
                <td><?= $data->prioritaNazev ?></td>
            </tr>

            <tr>
                <td>Kód Priority</td>
                <td><?= $data->prioritaKod ?></td>
            </tr>

            <?php if (!empty($data->prioritaCislo)) { ?>
                <tr>
                    <td>Číslo Priority</td>
                    <td><?= $data->prioritaCislo ?></td>
                </tr>
            <?php } ?>

            <tr>
                <td>Platnost Od</td>
                <td><?= date('d. m. Y', $data->zaznamPlatnostOdDatum->timestamp) ?></td>
            </tr>

            <tr>
                <td>Platnost Do</td>
                <td><?= date('d. m. Y', $data->zaznamPlatnostDoDatum->timestamp) ?></td>
            </tr>

            <tr>
                <td>Operační Program CEDR</td>
                <td><?= $this->Html->link($data->CedrOperacniProgram->operacaniProgramNazev . ' (' . $data->CedrOperacniProgram->operacaniProgramKod . ')', '/detail-cedr-operacni-program/?id=' . $data->idOperacniProgram) ?></td>
            </tr>

            <tr>
                <td>Odkaz na CEDR</td>
                <td><?= $this->Html->link($data->idPriorita) ?></td>
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
    <div id="opatreni">
        <h2>Podřízená CEDR Opatření</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Opatření Název</th>
                <th>Opatření Kód</th>
                <th>Platnost Od</th>
                <th>Platnost Do</th>
                <th class="nosearch">Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data->CedrOpatreni as $p) { ?>
                <tr>
                    <td><?= $this->Html->link($p->opatreniNazev, '/detail-cedr-opatreni/?id=' . $p->idOpatreni) ?></td>
                    <td><?= $p->opatreniKod ?></td>
                    <td><?= $p->zaznamPlatnostOdDatum->year ?></td>
                    <td><?= $p->zaznamPlatnostDoDatum->year ?></td>
                    <td><?= $this->Html->link('Otevřít', '/detail-cedr-opatreni/?id=' . $p->idOpatreni) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Opatření Název</td>
                <td>Opatření Kód</td>
                <td>Platnost Od</td>
                <td>Platnost Do</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="dotace">
        <h2>Dotace v Prioritě CEDR</h2>
        <div>Max. 50.000 záznamů</div>
        <table class="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>">
            <thead>
            <tr>
                <th>Název Projektu</th>
                <th>Projekt Kód</th>
                <th>Projekt Identifikátor</th>
                <th>Příjemce Pomoci</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Název Projektu</td>
                <td>Projekt Kód</td>
                <td>Projekt Identifikátor</td>
                <td>Příjemce Pomoci</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>