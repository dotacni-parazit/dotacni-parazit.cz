<?php

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

/** @var mixed $data */
$this->set('title', $data->operacaniProgramNazev);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#priority">Podřízené Priority</a></li>
        <li><a href="#dotace">Dotace</a></li>
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
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Priorita Název</th>
                <th class="nosearch">Priorita Kód</th>
                <th class="nosearch">Počet evidovaných dotací</th>
            </tr>
            </thead>
            <tbody>
            <?php /** @var \App\Model\Entity\StrukturalniFondy[] $priority */
            foreach ($priority as $p) { ?>
                <tr>
                    <td><?= !empty($p->MmrPriorita) ? $p->MmrPriorita->prioritaNazev : "N/A" ?></td>
                    <td><?= $p->cisloPrioritniOsy ?></td>
                    <td><?= $p->CNT ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Priorita Název</td>
                <td>Priorita Kód</td>
                <th>Počet evidovaných dotací</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="dotace">
        <div>Max. 50.000 záznamů</div>
        <table style="width: 100%" class="datatable" data-ajax="<?= $this->request->here(false) ?>">
            <thead>
            <tr>
                <th data-type="html" class="col">Název Projektu</th>
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