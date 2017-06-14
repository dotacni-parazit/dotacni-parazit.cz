<?php
use Cake\I18n\Number;

?>
<h1><?= $poskytovatel->dotacePoskytovatelNazev ?> - Poskytovatel Dotací</h1>
<br/>
<br/>
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
        var table = $('#datatable').DataTable({
            fixedColumns: true,
            paging: true,
            serverSide: false,
            processing: true,
            dom: 'r<"clear">ip<"clear">lf<"clear">t',
            ajax: '/podle-poskytovatelu/<?php echo $poskytovatel->dotacePoskytovatelKod ?>/complete/ajax',
            "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]]
        });

        $('#datatable thead th').each(function (i) {
            var title = $('#datatable thead th').eq($(this).index()).text();
            $(this).html('<input onclick="event.stopPropagation()" onmousedown="event.stopPropagation()" type="text" placeholder="Search ' + title + '" data-index="' + i + '" />');
        });

        $(table.table().container()).on('keyup change', 'thead input', function () {
            table
                .column($(this).data('index'))
                .search(this.value)
                .draw();
        });
    });
</script>