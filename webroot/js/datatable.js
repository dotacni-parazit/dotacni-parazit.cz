$(document).ready(function () {
    var table = $('#datatable').DataTable({
        fixedColumns: true,
        paging: true,
        "pageLength": 100,
        "stateSave": true,
        "stateDuration": 60 * 60 * 24 * 7,
        dom: 'r<"clear">ip<"clear">lf<"clear">t',
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]]
    });

    $('#datatable thead th').each(function (i) {
        var title = $('#datatable thead th').eq($(this).index()).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" data-index="' + i + '" />');
    });

    $(table.table().container()).on('keyup', 'thead input', function () {
        table
            .column($(this).data('index'))
            .search(this.value)
            .draw();
    });
});