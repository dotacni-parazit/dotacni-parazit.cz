<?php
/**
 * @var AppView $this
 */

use App\View\AppView;
use Cake\I18n\Number;

$this->set('title', $zdroj->financniZdrojNazev);
?>
<h2>Rozhodnutí/Dotace za rok <?= $year ?></h2>
<hr/>
<div>
    Součet za rok <?= $year ?>: <?= Number::currency($year_sum) ?>
</div>
<hr/>
<table id="datatable_custom">
    <thead>
    <tr>
        <th data-type="html">Příjemce Pomoci</th>
        <th data-type="html">Dotace (kod nebo identifikator projektu)</th>
        <th data-type="currency">Částka Rozhodnutá</th>
        <th data-type="currency">Částka Spotřebovaná</th>
        <th data-type="number">Rok</th>
        <th data-type="string">Členění finančních prostředků</th>
        <th data-type="string">Finanční Zdroj</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <td>Příjemce Pomoci</td>
        <td>Dotace (kod nebo identifikator projektu)</td>
        <td>Částka Rozhodnutá</td>
        <td>Částka Spotřebovaná</td>
        <td>Rok</td>
        <td>Členění finančních prostředků</td>
        <td>Finanční Zdroj</td>
    </tr>
    </tfoot>
</table>
<script type="text/javascript">
    $(document).ready(function () {
        var table_custom = $('#datatable_custom').DataTable({
            fixedColumns: true,
            paging: true,
            serverSide: false,
            processing: true,
            "stateSave": true,
            "stateDuration": 60 * 60 * 24 * 7,
            dom: 'r<"clear">ip<"clear">lf<"clear">t',
            ajax: '/podle-zdroje-financi/<?php echo $zdroj->financniZdrojKod ?>/complete/ajax/<?= $year ?>',
            "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Czech.json"
            }
        });

        $('#datatable_custom thead th').each(function (i) {
            var title = $('#datatable_custom thead th').eq($(this).index()).text();
            $(this).html('<input onclick="event.stopPropagation()" onmousedown="event.stopPropagation()" type="text" placeholder="Search ' + title + '" data-index="' + i + '" />');
        });

        $(table_custom.table().container()).on('keyup change', 'thead input', function () {
            table_custom
                .column($(this).data('index'))
                .search(this.value)
                .draw();
        });
    });
</script>