<?php
/**
 * @var AppView $this
 */

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

$this->set('title', $data->operacaniProgramNazev);

use App\View\AppView; ?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#priority">Podřízené MMR Priority</a></li>
        <?php if (!empty($data->MmrPodprogram)) { ?>
            <li><a href="#podprogramy">Podřízené MMR Podprogramy</a></li>
        <?php } ?>
        <li><a href="#dotace">Dotace</a></li>
    </ul>
    <div id="obecne">
        <h2>OP - Obecné informace</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Název Operačního Programmu</td>
                <td><?= $data->operacaniProgramNazev ?></td>
            </tr>

            <tr>
                <td>Kód OP</td>
                <td><?= $data->operacaniProgramKod ?></td>
            </tr>

            <?php if (!empty($data->operacaniProgramCislo)) { ?>
                <tr>
                    <td>Číslo OP</td>
                    <td><?= $data->operacaniProgramCislo ?></td>
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
                <td>Odkaz na CEDR</td>
                <td><?= $this->Html->link($data->idOperacniProgram) ?></td>
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
    <?php if (!empty($data->MmrPodprogram)) { ?>
        <div id="podprogramy">
            <h2>Podřízené MMR Podprogramy</h2>
            <table class="datatable datatable_simple">
                <thead>
                <tr>
                    <th>Kód</th>
                    <th>Název</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data->MmrPodprogram as $p) { ?>
                    <tr>
                        <td><?= $p->podprogramKod ?></td>
                        <td><?= $p->podprogramNazev ?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td>Kód</td>
                    <td>Název</td>
                </tr>
                </tfoot>
            </table>
        </div>
    <?php } ?>
    <div id="priority">
        <h2>Podřízené MMR Priority</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Priorita Název</th>
                <th>Priorita Kód</th>
                <th>Počet Dotací</th>
                <th>Platnost Od</th>
                <th>Platnost Do</th>
                <th class="nosearch">Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data->MmrPriorita as $p) { ?>
                <tr>
                    <td><?= $this->Html->link($p->prioritaNazev, '/detail-mmr-priorita/?id=' . $p->idPriorita) ?></td>
                    <td><?= $p->prioritaKod ?></td>
                    <td><?= isset($counts[$p->idPriorita]) ? $counts[$p->idPriorita] : '0' ?></td>
                    <td><?= $p->zaznamPlatnostOdDatum->year ?></td>
                    <td><?= $p->zaznamPlatnostDoDatum->year ?></td>
                    <td><?= $this->Html->link('Otevřít', '/detail-mmr-priorita/?id=' . $p->idPriorita) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Priorita Název</td>
                <td>Priorita Kód</td>
                <th>Počet Dotací</th>
                <td>Platnost Od</td>
                <td>Platnost Do</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="dotace">
        <h2>Dotace v OP</h2>
        <div>Max. 50.000 záznamů</div>
        <table style="width: 100%" class="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>">
            <thead>
            <tr>
                <th data-type="html">Název Projektu</th>
                <th data-type="html">Projekt Kód</th>
                <th data-type="html">Projekt Identifikátor</th>
                <th data-type="html">Příjemce Pomoci</th>
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