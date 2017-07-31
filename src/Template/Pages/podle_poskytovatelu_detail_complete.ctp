<?php


$this->set('title', $poskytovatel->dotacePoskytovatelNazev . ' - Poskytovatel Dotací')
?>
<h2>Všechna Rozhodnutí/Dotace</h2>
<table id="datatable">
    <thead>
    <tr>
        <th data-type="html">Příjemce Pomoci</th>
        <th data-type="html">Dotace (kod nebo identifikator projektu)</th>
        <th data-type="currency">Částka</th>
        <th data-type="number">Rok</th>
        <th data-type="string">Členění finančních prostředků</th>
        <th data-type="string">Finanční Zdroj</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <th>Příjemce Pomoci</th>
        <th>Dotace (kod nebo identifikator projektu)</th>
        <th>Částka</th>
        <th>Rok</th>
        <th>Členění finančních prostředků</th>
        <th>Finanční Zdroj</th>
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
            ajax: '/podle-poskytovatelu/<?php echo $poskytovatel->dotacePoskytovatelKod ?>/complete/ajax',
            "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Czech.json"
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