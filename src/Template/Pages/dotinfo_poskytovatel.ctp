<?php

/** @var \App\Model\Entity\Dotinfo $poskytovatel */

use Cake\I18n\Number;

$this->set('title', $poskytovatel->poskytovatelNazev);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné Informace</a></li>
        <?php if (count($aliasy) > 1) { ?>
            <li><a href="#aliasy">Aliasy Poskytovatele</a></li>
        <?php } ?>
        <li><a href="#dotinfo">Rozhodnutí</a></li>
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
                <td>IČO Poskytovatele</td>
                <td><?= $poskytovatel->poskytovatelIco ?></td>
            </tr>
            <tr>
                <td>Název Poskytovatele</td>
                <td><?= $poskytovatel->poskytovatelNazev ?></td>
            </tr>
            <tr>
                <td>Počet Rozhodnutí v DotInfo</td>
                <td><?= $count ?></td>
            </tr>
            <tr>
                <td>Součet schválených částek</td>
                <td><?= Number::currency($sum); ?></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td class="nosearch">Vlastnost</td>
                <td class="nosearch">Hodnota</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <?php if (count($aliasy) > 1) { ?>
        <div id="aliasy">
            <?= print_r($aliasy->enableHydration(false)->toArray()) ?>
        </div>
    <?php } ?>
    <div id="dotinfo">
        <table class="datatable" style="width: 100%"
               data-ajax="<?= $this->request->here(false) . (strpos($this->request->here(false), "?") == false ? "?name=" : "") ?>&dotinfo=dotinfo">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>IČO</th>
                <th>Dotace</th>
                <th data-type="currency">Částka Schválená</th>
                <th data-type="html" class="nosearch">Otevřít</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Jméno</td>
                <td>IČO</td>
                <td>Dotace</td>
                <td data-type="currency">Částka Schválená</td>
                <td data-type="html">Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($multiple) ? '0' : '1' ?>
        });
    });
</script>