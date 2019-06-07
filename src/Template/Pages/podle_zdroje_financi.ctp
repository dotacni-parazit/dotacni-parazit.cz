<?php
/**
 * @var AppView $this
 */

use App\View\AppView;
use Cake\I18n\Number;

$this->set('title', 'CEDR III - Zdroje Financování');
?>
<div class="row">
    <div style="border: 0 solid black;border-right-width: 1px;"
         class="col-sm-12 col-md-12 col-lg-6">
        <h2>Tuzemské</h2>
        <table id="datatable" class="datatable_simple">
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
                if (strpos($d['id'], 'z') === 0) continue;
                ?>
                <tr>
                    <td><?= $this->Html->link($d['nazev'], '/podle-zdroje-financi/' . $d['id']) ?></td>
                    <td style="text-align: right"><?= Number::currency($d['castkaRozhodnuta'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                    <td style="text-align: right"><?= Number::currency($d['castkaSpotrebovana'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                    <td style="text-align: right"><?= $this->Html->link('Otevřít', '/podle-zdroje-financi/' . $d['id']) ?></td>
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
    <div style="padding: 10px;" class="col-sm-12 col-md-12 col-lg-6">
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
                    <td style="text-align: right"><?= $this->Html->link('Otevřít', '/podle-zdroje-financi/' . $d['id']) ?></td>
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
</div>