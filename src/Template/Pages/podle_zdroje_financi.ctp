<?php
use Cake\I18n\Number;

?>
<h1>Zdroje Financí / Financování</h1>
<hr/>
<div style="float: left; border: 1px solid black; border-width: 0 1px 0 0; padding: 10px;"
     class="small-12 medium-12 large-6">
    <h2>Tuzemské Finanční zdroje (t)</h2>
    <table id="tuzemske">
        <thead>
        <tr>
            <th data-type="html"><a href="?sort=zdroj">Zdroj</a></th>
            <th data-type="currency" class="nosearch"><a href="?sort=sum">Součet "částka rozhodnutá"</a></th>
            <th data-type="currency" class="nosearch"><a href="?sort=sum">Součet "částka spotřebovaná"</a></th>
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
                <td><?= Number::currency($d['castkaRozhodnuta'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                <td><?= Number::currency($d['castkaSpotrebovana'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                <td><?= $this->Html->link('Otevřít', '/podle-zdroje-financi/' . $d['id']) ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th><a href="?sort=poskytovatel">Zdroj</a></th>
            <th data-type="currency" class="nosearch"><a href="?sort=sum">Součet "částka rozhodnutá"</a></th>
            <th data-type="currency" class="nosearch"><a href="?sort=sum">Součet "částka spotřebovaná"</a></th>
            <th>Otevřít</th>
        </tr>
        </tfoot>
    </table>
</div>
<div style="float: left;  padding: 10px;" class="medium-12 large-6 small-12">
    <h2>Zahraniční Finanční zdroje (z)</h2>
    <table id="zahranicni">
        <thead>
        <tr>
            <th data-type="html"><a href="?sort=zdroj">Zdroj</a></th>
            <th data-type="currency" class="nosearch"><a href="?sort=sum">Součet "částka rozhodnutá"</a></th>
            <th data-type="currency" class="nosearch"><a href="?sort=sum">Součet "částka spotřebovaná"</a></th>
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
                <td><?= Number::currency($d['castkaRozhodnuta'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                <td><?= Number::currency($d['castkaSpotrebovana'], 'CZK', ['zero' => '0.00 Kč']) ?></td>
                <td><?= $this->Html->link('Otevřít', '/podle-zdroje-financi/' . $d['id']) ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <th><a href="?sort=poskytovatel">Zdroj</a></th>
            <th data-type="currency" class="nosearch"><a href="?sort=sum">Součet "částka rozhodnutá"</a></th>
            <th data-type="currency" class="nosearch"><a href="?sort=sum">Součet "částka spotřebovaná"</a></th>
            <th>Otevřít</th>
        </tr>
        </tfoot>
    </table>
</div>
<br class="clear">
<script type="text/javascript">
    jQuery.fn.dataTable.Api.register('sum()', function () {
        return this.flatten().reduce(function (a, b) {
            if (typeof a === 'string') {
                a = a.replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
            }
            if (typeof b === 'string') {
                b = b.replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
            }

            return a + b;
        }, 0);
    });

    $(document).ready(function () {
        var tableTuzemske = $("#tuzemske").DataTable({
            fixedColumns: false,
            paging: false,
            "pageLength": 100,
            "stateSave": false,
            "stateDuration": 60 * 60 * 24 * 7,
            dom: 't'
        });
        var tableZahranicni = $("#zahranicni").DataTable({
            fixedColumns: false,
            paging: false,
            "pageLength": 100,
            "stateSave": false,
            "stateDuration": 60 * 60 * 24 * 7,
            dom: 't'
        });
    });
</script>