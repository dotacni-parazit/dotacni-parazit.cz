<?php

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

$this->set('title', $data->operacaniProgramNazev . ' (kód: ' . $data->operacaniProgramKod . ') - MMR Operační Program');
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#priority">Podřízené - MMR Priority</a></li>
        <li><a href="#dotace">Dotace</a></li>
    </ul>
    <div id="obecne">
        <h2>OP - Obecné informace</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Vlastnost</th>
                <th>Hodnota</th>
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
    <div id="priority">
        <h2>MMR Priorita</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Priorita Název</th>
                <th>Priorita Kód</th>
                <th>Priorita Číslo</th>
                <th>Platnost Od</th>
                <th>Platnost Do</th>
                <th>Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data->MmrPriorita as $p) { ?>
                <tr>
                    <td><?= $this->Html->link($p->prioritaNazev, '/detail-mmr-priorita/?id=' . $p->idPriorita) ?></td>
                    <td><?= $p->prioritaKod ?></td>
                    <td><?= $p->prioritaCislo ?></td>
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
                <td>Priorita Číslo</td>
                <td>Platnost Od</td>
                <td>Platnost Do</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="dotace">
        <h2>Dotace v OP</h2>
        <div>Max. 1.000 záznamů</div>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název Projektu</th>
                <th>Projekt Kód</th>
                <th>Projekt Identifikátor</th>
                <th>Příjemce Pomoci</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($dotace as $d) { ?>
                <?php

                ?>
                <tr>
                    <td><?= $this->Html->link($d->projektNazev, '/detail-dotace/' . $d->idDotace) ?></td>
                    <td><?= $this->Html->link($d->projektKod, '/detail-dotace/' . $d->idDotace) ?></td>
                    <td><?= $this->Html->link($d->projektIdnetifikator, '/detail-dotace/' . $d->idDotace) ?></td>
                    <td><?= $this->Html->link($d->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $d->PrijemcePomoci->idPrijemce) ?></td>
                </tr>
            <?php } ?>
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
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>