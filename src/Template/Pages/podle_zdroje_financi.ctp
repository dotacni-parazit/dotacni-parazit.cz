<?php

use Cake\I18n\Number;

$this->set('title', 'Zdroje Financí / Financování');
?>
<div style="float: left; border: 0 solid black;border-right-width: 1px;padding: 10px;"
     class="small-12 medium-12 large-6">
    <h2>Tuzemské</h2>
    <table id="tuzemske">
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
            <th>Zdroj</th>
            <th data-type="currency" class="nosearch">Součet "částka rozhodnutá"</th>
            <th data-type="currency" class="nosearch">Součet "částka spotřebovaná"</th>
            <th>Otevřít</th>
        </tr>
        </tfoot>
    </table>
</div>
<div style="float: left;  padding: 10px;" class="medium-12 large-6 small-12">
    <h2>Zahraniční</h2>
    <table id="zahranicni">
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
            <th>Zdroj</th>
            <th data-type="currency" class="nosearch">Součet "částka rozhodnutá"</th>
            <th data-type="currency" class="nosearch">Součet "částka spotřebovaná"</th>
            <th>Otevřít</th>
        </tr>
        </tfoot>
    </table>
</div>
<br class="clear">
<script type="text/javascript">
    $(document).ready(function () {
        var tableTuzemske = $("#tuzemske").DataTable({
            fixedColumns: false,
            paging: false,
            "pageLength": 100,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Czech.json"
            },
            "stateSave": false,
            "stateDuration": 60 * 60 * 24 * 7,
            dom: 't'
        });
        var tableZahranicni = $("#zahranicni").DataTable({
            fixedColumns: false,
            paging: false,
            "pageLength": 100,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Czech.json"
            },
            "stateSave": false,
            "stateDuration": 60 * 60 * 24 * 7,
            dom: 't'
        });

        $('#tuzemske thead th').each(function (i) {
            var title = $('#tuzemske thead th').eq($(this).index()).text();
            if ($(this).hasClass('nosearch')) {
                $(this).text(title);
                return;
            }
            $(this).html('<input onclick="event.stopPropagation()" onmousedown="event.stopPropagation()" type="text" placeholder="Search ' + title + '" data-index="' + i + '" />');
        });

        $(tableTuzemske.table().container()).on('keyup', 'thead input', function () {
            tableTuzemske
                .column($(this).data('index'))
                .search(this.value)
                .draw();
        });

        $('#zahranicni thead th').each(function (i) {
            var title = $('#zahranicni thead th').eq($(this).index()).text();
            if ($(this).hasClass('nosearch')) {
                $(this).text(title);
                return;
            }
            $(this).html('<input onclick="event.stopPropagation()" onmousedown="event.stopPropagation()" type="text" placeholder="Search ' + title + '" data-index="' + i + '" />');
        });

        $(tableZahranicni.table().container()).on('keyup', 'thead input', function () {
            tableZahranicni
                .column($(this).data('index'))
                .search(this.value)
                .draw();
        });
    });
</script>