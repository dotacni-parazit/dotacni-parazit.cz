<?php
$this->set('title', $ukazatele[0]['statniRozpocetUkazatelNazev']);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>

<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#podrizene">Podřízené Ukazatele</a></li>
        <li><a href="#dotacnitituly">Dotační Tituly</a></li>
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
            <?php foreach ($ukazatele as $u) {
                $u = (object)$u;
                $u->StatniRozpocetKapitola[0] = (object)$u->StatniRozpocetKapitola[0];
                ?>
                <tr>
                    <td>Kapitola Státního Rozpočtu</td>
                    <td><?= $u->StatniRozpocetKapitola[0]->statniRozpocetKapitolaNazev . ' (kód: ' . $u->StatniRozpocetKapitola[0]->statniRozpocetKapitolaKod . ')' ?></td>
                </tr>
                <tr>
                    <td>Kód Ukazatele</td>
                    <td><?= $u->statniRozpocetUkazatelKod ?></td>
                </tr>
                <tr>
                    <td>Kód Kapitoly Státního Rozpočtu</td>
                    <td><?= $u->statniRozpocetKapitolaKod ?></td>
                </tr>
                <tr>
                    <td>Nadřízený Ukazatel Státního Rozpočtu</td>
                    <td><?= $this->Html->link($u->statniRozpocetUkazatelNadrizenyKod, '/kapitoly-statniho-rozpoctu-ukazatele/' . $u->zaznamPlatnostOdDatum->year . '/' . $u->statniRozpocetUkazatelNadrizenyKod) ?></td>
                </tr>
                <tr>
                    <td>Název Ukazatele</td>
                    <td><?= $u->statniRozpocetUkazatelNazev ?></td>
                </tr>
                <tr>
                    <td>Platnost Od</td>
                    <td><?= $u->zaznamPlatnostOdDatum->nice() ?></td>
                </tr>
                <tr>
                    <td>Platnost Do</td>
                    <td><?= $u->zaznamPlatnostDoDatum->nice() ?></td>
                </tr>
                <tr>
                    <td>Odkaz CEDR</td>
                    <td><?= $this->Html->link($u->id) ?></td>
                </tr>
                <?php break;
            } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Vlastnost</td>
                <td>Hodnota</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="podrizene">

        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Kód Ukazatele</th>
                <th>Název Ukazatele</th>
                <th>Platnost Od</th>
                <th>Platnost Do</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($podrizene as $u) {
                $u = (object)$u; ?>
                <tr>
                    <td><?= $this->Html->link($u->statniRozpocetUkazatelKod, '/kapitoly-statniho-rozpoctu-ukazatele/' . $u->zaznamPlatnostOdDatum->year . '/' . $u->statniRozpocetUkazatelKod) ?></td>
                    <td><?= $this->Html->link($u->statniRozpocetUkazatelNazev, '/kapitoly-statniho-rozpoctu-ukazatele/' . $u->zaznamPlatnostOdDatum->year . '/' . $u->statniRozpocetUkazatelKod) ?></td>
                    <td><?= empty($u->zaznamPlatnostOdDatum) ? 'N/A' : $u->zaznamPlatnostOdDatum->nice() ?></td>
                    <td><?= empty($u->zaznamPlatnostDoDatum) ? 'N/A' : $u->zaznamPlatnostDoDatum->nice() ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Kód Ukazatele</td>
                <td>Název Ukazatele</td>
                <td>Platnost Od</td>
                <td>Platnost Do</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="dotacnitituly">
        <table class="datatable datatable_simple" style="width: 100%;">
            <thead>
            <tr>
                <th>Název</th>
                <th>Kód Titulu</th>
                <th>Platnost Od</th>
                <th>Platnost Do</th>
                <th class="nosearch">Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($dotacniTituly as $d) {
                ?>
                <tr>
                    <td><?= $d->dotaceTitulNazev ?></td>
                    <td><?= $d->dotaceTitulKod ?></td>
                    <td><?= $d->zaznamPlatnostOdDatum->nice() ?></td>
                    <td><?= $d->zaznamPlatnostDoDatum->nice() ?></td>
                    <td><?= $this->Html->link('Otevřit', '/detail-dotacni-titul/' . $d->dotaceTitulKod) ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název</td>
                <td>Kód Titulu</td>
                <td>Platnost Od</td>
                <td>Platnost Do</td>
                <td>Otevřít</td>
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
