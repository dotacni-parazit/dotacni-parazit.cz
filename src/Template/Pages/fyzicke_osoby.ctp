<?php
use Cake\I18n\Number;

$this->set('title', 'Fyzické osoby - Přijemci Dotací')
?>
<h2>Všechny Fyzické osoby evidované v CEDR-III jako Příjemci dotací</h2>
<table id="datatable_custom">
    <thead>
    <tr>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th data-type="number" class="medium-1 large-1">Rok narození</th>
        <th>Bydliště</th>
        <th>Státní příslušnost</th>
        <th data-type="currency" class="medium-1 large-1">Částka rozhodnutá</th>
        <th data-type="currency" class="medium-1 large-1">Částka spotřebovaná</th>
        <th data-type="html" class="medium-1 large-1">Otevřít</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th data-type="number" class="medium-1 large-1">Rok narození</th>
        <th>Bydliště</th>
        <th>Státní příslušnost</th>
        <th data-type="currency" class="medium-1 large-1">Částka rozhodnutá</th>
        <th data-type="currency" class="medium-1 large-1">Částka spotřebovaná</th>
        <th data-type="html" class="medium-1 large-1">Otevřít</th>
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
            ajax: '/fyzicke-osoby/ajax',
            "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]],
            "language": {
                "processing": "Načítám data"
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