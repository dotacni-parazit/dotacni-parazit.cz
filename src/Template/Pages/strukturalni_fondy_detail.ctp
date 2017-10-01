<?php

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

$this->set('title', $data->operacaniProgramNazev);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#priority">Podřízené Priority</a></li>
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
                <td><?= $data->zaznamPlatnostOdDatum == false ? "" : date('d. m. Y', $data->zaznamPlatnostOdDatum->timestamp) ?></td>
            </tr>

            <tr>
                <td>Platnost Do</td>
                <td><?= $data->zaznamPlatnostDoDatum == false ? "" : date('d. m. Y', $data->zaznamPlatnostDoDatum->timestamp) ?></td>
            </tr>

            <tr>
                <td>Odkaz na CEDR</td>
                <td><?= $data->idOperacniProgram == false ? "" : $this->Html->link($data->idOperacniProgram) ?></td>
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
        <h2>Podřízené Priority</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Priorita Název</th>
                <th>Priorita Kód</th>
                <th>Počet evidovaných dotací</th>
                <th>Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($priority as $p) { ?>
                <tr>
                    <td><?= !empty($p->MmrPriorita) ? $this->Html->link($p->MmrPriorita->prioritaNazev, '/strukturalni-fondy-detail-priorita/?priorita=' . $p->cisloPrioritniOsy) : "N/A" ?></td>
                    <td><?= $this->Html->link($p->cisloPrioritniOsy, '/strukturalni-fondy-detail-priorita/?priorita=' . $p->cisloPrioritniOsy) ?></td>
                    <td><?= $p->CNT ?></td>
                    <td><?= $this->Html->link('Otevřít', '/strukturalni-fondy-detail-priorita/?priorita=' . $p->cisloPrioritniOsy) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Priorita Název</td>
                <td>Priorita Kód</td>
                <th>Počet evidovaných dotací</th>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="dotace">
        <h2>Dotace v OP</h2>
        <div>Max. 50.000 záznamů</div>
        <table style="width: 100%" class="datatable" data-ajax="<?= $this->request->here(false) ?>">
            <thead>
            <tr>
                <th data-type="html">Název Projektu</th>
                <th data-type="html">Číslo Projektu</th>
                <th data-type="html">Žadatel (IČO)</th>
                <th data-type="currency">Zdroje celkem</th>
                <th data-type="currency">Veřejné zdroje celkem</th>
                <th data-type="currency">EU zdroje</th>
                <th data-type="currency">Vyúčtované veřejné celkem</th>
                <th data-type="currency">Proplacené EU zdroje</th>
                <th data-type="currency">Certifikované veřejné celkem</th>
                <th data-type="currency">Certifikované EU zdroje</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td data-type="html">Název Projektu</td>
                <td data-type="html">Číslo Projektu</td>
                <td data-type="html">Žadatel (IČO)</td>
                <td data-type="currency">Zdroje celkem</td>
                <td data-type="currency">Veřejné zdroje celkem</td>
                <td data-type="currency">EU zdroje</td>
                <td data-type="currency">Vyúčtované veřejné celkem</td>
                <td data-type="currency">Proplacené EU zdroje</td>
                <td data-type="currency">Certifikované veřejné celkem</td>
                <td data-type="currency">Certifikované EU zdroje</td>
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