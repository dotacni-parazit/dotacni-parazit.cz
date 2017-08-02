<?php

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

$this->set('title', $data->podOpatreniNazev . ' (kód: ' . $data->podOpatreniKod . ') - MMR PodOpatření');
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#podopatreni">Návazné MMR PodOpatření</a></li>
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
                <td>Název PodOpatření</td>
                <td><?= $data->podOpatreniNazev ?></td>
            </tr>

            <tr>
                <td>Kód PodOpatření</td>
                <td><?= $data->podOpatreniKod ?></td>
            </tr>

            <tr>
                <td>Číslo PodOpatření</td>
                <td><?= $data->podOpatreniCislo ?></td>
            </tr>

            <tr>
                <td>Platnost Od</td>
                <td><?= date('d. m. Y', $data->zaznamPlatnostOdDatum->timestamp) ?></td>
            </tr>

            <tr>
                <td>Platnost Do</td>
                <td><?= date('d. m. Y', $data->zaznamPlatnostDoDatum->timestamp) ?></td>
            </tr>

            <tr>
                <td>Nadřazené Opatření MMR</td>
                <td><?= $this->Html->link($data->MmrOpatreni->opatreniNazev . ' (' . $data->MmrOpatreni->opatreniKod . ')', '/detail-mmr-opatreni/?id=' . $data->idOpatreni) ?></td>
            </tr>

            <tr>
                <td>Odkaz na CEDR</td>
                <td><?= $this->Html->link($data->idPodOpatreni) ?></td>
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

    <div id="dotace">
        <h2>Dotace v MMR PodOpatření</h2>
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