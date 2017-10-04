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
            <?php
            if(!isset($priority) || empty($priority)) $priority = [];
            foreach ($priority as $p) { ?>
                <tr>
                    <td><?= $is_2020_op ? $p->cisloPrioritniOsy : (!empty($p->MmrPriorita) ? $p->MmrPriorita->prioritaNazev : "N/A") ?></td>
                    <td><?= $is_2020_op ? explode(" ", $p->cisloPrioritniOsy)[0] : $p->cisloPrioritniOsy ?></td>
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

        <?php
        if ($is_2020_op) {
            $columns = ["Zdroje celkem", "Schválené zdroje Veřejné", "Schválené zdroje EU", "Schválené zdroje Soukromé", "Vyúčtované celkem", "Vyúčtované zdroje Veřejné", "Vyúčtované zdroje EU", "Vyúčtované zdroje Soukromé"];
        } else {
            $columns = ["Rozhodnutí / Smlouva celkem", "Rozhodnutí / Smlouva Veřejné celkem", "Rozhodnutí / Smlouva EU zdroje", "Proplacené Veřejné celkem", "Proplacené EU zdroje", "Certifikované veřejné celkem", "Certifikované EU zdroje"];
        }
        ?>

        <table style="width: 100%" class="datatable" data-ajax="<?= $this->request->here(false) ?>">
            <thead>
            <tr>
                <th data-type="html">Název Projektu</th>
                <th data-type="html">Číslo Projektu</th>
                <th data-type="html">Žadatel (IČO)</th>
                <th>Priorita Kód</th>

                <?php foreach ($columns as $c) { ?>
                    <th data-type="currency"><?= $c ?></th>
                <?php } ?>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td data-type="html">Název Projektu</td>
                <td data-type="html">Číslo Projektu</td>
                <td data-type="html">Žadatel (IČO)</td>
                <td>Priorita Kód</td>

                <?php foreach ($columns as $c) { ?>
                    <td data-type="currency"><?= $c ?></td>
                <?php } ?>
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