<?php
/**
 * @var AppView $this
 */
$i = $ico[0];
$this->set('title', $i['jmeno']);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

$zdroje = [];
$obce = [];
$okresy = [];
$soucet_tuzemske = 0;
$soucet_eu = 0;
$soucet_celkem = 0;

use App\View\AppView;
use App\View\DPUTILS; ?>

<div id="tabs">
    <ul>
        <li><a href="#prijemce">Příjemce Pomoci</a></li>
        <li><a href="#poskytnuti">Poskytnutá pomoc</a></li>
    </ul>

    <div id="poskytnuti">
        <table class="datatable">
            <thead>
            <tr>
                <th>Obec</th>
                <th>Okres</th>
                <th>Zdroj</th>
                <th>Opatření</th>
                <th data-type="currency">Pomoc Celkem</th>
                <th data-type="currency">Pomoc Tuzemská</th>
                <th data-type="currency">Pomoc EU</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ico as $i) { ?>
                <?php
                if (!in_array($i['okres'], $okresy)) {
                    $okresy[] = $i['okres'];
                }
                if (!in_array($i['obec'], $obce)) {
                    $obce[] = $i['obec'];
                }
                if (!in_array($i['zdroj'], $zdroje)) {
                    $zdroje[] = $i['zdroj'];
                }
                $soucet_celkem += $i['czk_celkem'];
                $soucet_eu += $i['czk_evropske'];
                $soucet_tuzemske += $i['czk_tuzemske'];
                ?>
                <tr>
                    <td><?= $this->Html->link($i['obec'], '/program-rozvoje-venkova/obec/?name=' . urlencode($i['obec']) . '&okres=' . urlencode($i['okres'])) ?></td>
                    <td><?= $this->Html->link($i['okres'], '/program-rozvoje-venkova/okres/?name=' . urlencode($i['okres'])) ?></td>
                    <td><?= $this->Html->link($i['zdroj'], '/program-rozvoje-venkova/zdroj/?name=' . urlencode($i['zdroj'])) ?></td>
                    <td><?= $this->Html->link($i['opatreni'], '/program-rozvoje-venkova/opatreni/?name=' . urlencode($i['opatreni'])) ?></td>
                    <td><?= DPUTILS::currency($i['czk_celkem']) ?></td>
                    <td><?= DPUTILS::currency($i['czk_tuzemske']) ?></td>
                    <td><?= DPUTILS::currency($i['czk_evropske']) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Obec</td>
                <td>Okres</td>
                <td>Zdroj</td>
                <td>Opatření</td>
                <td>Pomoc Celkem</td>
                <td>Pomoc Tuzemská</td>
                <td>Pomoc EU</td>
            </tr>
            </tfoot>
        </table>
    </div>


    <div id="prijemce">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Vlastnost</th>
                <th>Hodnota</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Název PO</td>
                <td><?= $i['jmeno'] ?></td>
            </tr>

            <tr>
                <td>IČO</td>
                <td><?= $i['ico'] ?></td>
            </tr>

            <tr>
                <td>Okresy realizace</td>
                <td><?= join(", ", $okresy) ?></td>
            </tr>

            <tr>
                <td>Obce realizace</td>
                <td><?= join(", ", $obce) ?></td>
            </tr>

            <tr>
                <td>Součet přijmuté pomoci (tuzemské fondy)</td>
                <td><?= DPUTILS::currency($soucet_tuzemske) ?></td>
            </tr>

            <tr>
                <td>Součet přijmuté pomoci (EU fondy)</td>
                <td><?= DPUTILS::currency($soucet_eu) ?></td>
            </tr>

            <tr>
                <td>Součet přijmuté pomoci (celkem)</td>
                <td><?= DPUTILS::currency($soucet_celkem) ?></td>
            </tr>

            <tr>
                <td>Zdroje čerpání</td>
                <td><?= join(", ", $zdroje) ?></td>
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
</div>


<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>