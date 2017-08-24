<?php

use Cake\I18n\Number;

$this->set('title', 'Zdroje Financí / Financování');
?>
<div style="float: left; border: 0 solid black;border-right-width: 1px;padding: 10px;"
     class="small-12 medium-12 large-6">
    <h2>Tuzemské</h2>
    <table id="datatable" class="datatable_simple">
        <thead>
        <tr>
            <th data-type="html"><a href="?sort=zdroj">Zdroj</a></th>
            <th data-type="currency" class="nosearch">Součet "částka rozhodnutá"</th>
            <th data-type="currency" class="nosearch">Součet "částka spotřebovaná"</th>
            <th data-type="html" class="nosearch small-2 medium-1 large-2">Otevřít</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $d) {
            if (strpos($d['id'], 'z') === 0) continue;
            ?>
            <tr>
                <td><?= $this->Html->link($d['nazev'], '/podle-zdroje-financi/' . $d['id']) ?></td>
                <td style="text-align: right"><?= Number::currency($d['castkaRozhodnuta'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                <td style="text-align: right"><?= Number::currency($d['castkaSpotrebovana'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                <td><?= $this->Html->link('Otevřít', '/podle-zdroje-financi/' . $d['id']) ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <td>Zdroj</td>
            <td data-type="currency" class="nosearch">Součet "částka rozhodnutá"</td>
            <td data-type="currency" class="nosearch">Součet "částka spotřebovaná"</td>
            <td>Otevřít</td>
        </tr>
        </tfoot>
    </table>
</div>
<div style="float: left;  padding: 10px;" class="medium-12 large-6 small-12">
    <h2>Zahraniční</h2>
    <table id="datatable2" class="datatable_simple">
        <thead>
        <tr>
            <th data-type="html">Zdroj</th>
            <th data-type="currency" class="nosearch">Součet "částka rozhodnutá"</th>
            <th data-type="currency" class="nosearch">Součet "částka spotřebovaná"</th>
            <th data-type="html" class="nosearch small-2 medium-1 large-2">Otevřít</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $d) {
            if (strpos($d['id'], 'z') !== 0) continue;
            ?>
            <tr>
                <td><?= $this->Html->link($d['nazev'], '/podle-zdroje-financi/' . $d['id']) ?></td>
                <td style="text-align: right"><?= Number::currency($d['castkaRozhodnuta'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                <td style="text-align: right"><?= Number::currency($d['castkaSpotrebovana'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                <td><?= $this->Html->link('Otevřít', '/podle-zdroje-financi/' . $d['id']) ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <td>Zdroj</td>
            <td data-type="currency" class="nosearch">Součet "částka rozhodnutá"</td>
            <td data-type="currency" class="nosearch">Součet "částka spotřebovaná"</td>
            <td>Otevřít</td>
        </tr>
        </tfoot>
    </table>
</div>