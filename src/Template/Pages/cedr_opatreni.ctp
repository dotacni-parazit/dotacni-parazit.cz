<?php

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

$this->set('title', $data->opatreniNazev . ' (kód: ' . $data->opatreniKod . ') - CEDR Opatření');
?>

<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#podopatreni">Podřízené CEDR PodOpatření</a></li>
        <li><a href="#dotace">Dotace</a></li>
    </ul>
    <div id="obecne">
        <table>
            <thead>
            <tr>
                <th>Vlastnost</th>
                <th>Hodnota</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Název Opatření</td>
                <td><?= $data->opatreniNazev ?></td>
            </tr>

            <tr>
                <td>Kód Opatření</td>
                <td><?= $data->opatreniKod ?></td>
            </tr>

            <?php if (!empty($data->opatreniCislo)) { ?>
                <tr>
                    <td>Číslo Opatření</td>
                    <td><?= $data->opatreniCislo ?></td>
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
                <td>Nadřazená Priorita CEDR</td>
                <td><?= $this->Html->link($data->CedrPriorita->prioritaNazev . ' (' . $data->CedrPriorita->prioritaKod . ')', '/detail-cedr-priorita/?id=' . $data->idPriorita) ?></td>
            </tr>

            <tr>
                <td>Odkaz na CEDR</td>
                <td><?= $this->Html->link($data->idOpatreni) ?></td>
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

    <div id="podopatreni">
        <h2>Podřízené CEDR PodOpatření</h2>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>PodOpatření Název</th>
                <th>PodOpatření Kód</th>
                <th>Platnost Od</th>
                <th>Platnost Do</th>
                <th>Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data->CedrPodOpatreni as $p) { ?>
                <tr>
                    <td><?= $this->Html->link($p->podOpatreniNazev, '/detail-cedr-podopatreni/?id=' . $p->idPodOpatreni) ?></td>
                    <td><?= $p->podOpatreniKod ?></td>
                    <td><?= $p->zaznamPlatnostOdDatum->year ?></td>
                    <td><?= $p->zaznamPlatnostDoDatum->year ?></td>
                    <td><?= $this->Html->link('Otevřít', '/detail-cedr-podopatreni/?id=' . $p->idPodOpatreni) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>PodOpatření Název</td>
                <td>PodOpatření Kód</td>
                <td>Platnost Od</td>
                <td>Platnost Do</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="dotace">
        <h2>Dotace v CEDR Opatření</h2>
        <div>Max. 1.000 záznamů</div>
        <table class="datatable">
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