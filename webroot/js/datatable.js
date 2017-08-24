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

function setupDataTable(selector) {
    $e = (typeof(selector) === 'string') ? $(selector) : selector;
    var ttable = $($e).DataTable({
        fixedColumns: true,
        paging: true,
        "pageLength": 100,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Czech.json"
        },
        "stateSave": true,
        ajax: $($e).attr('data-ajax') ? $($e).attr('data-ajax') : '',
        "stateDuration": 60 * 60 * 24 * 7,
        dom: $($e).hasClass('datatable_simple') ? 't' : 'r<"clear">ip<"clear">lf<"clear">t',
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]]
    });

    $('thead th', $e).each(function (i) {
        var title = $('thead th', $e).eq($(this).index()).text();
        if (!$(this).hasClass('nosearch')) {
            $(this).html('<input onclick="event.stopPropagation()" onmousedown="event.stopPropagation()" type="text" placeholder="Search ' + title + '" data-index="' + i + '" />');
        }
    });

    $(ttable.table().container()).on('keyup', 'thead input', function () {
        ttable
            .column($(this).data('index'))
            .search(this.value)
            .draw();
    });

    return ttable;
}
var table;
$(document).ready(function () {

    table = setupDataTable('#datatable');

    setupDataTable('#datatable2');
    $('.datatable').each(function () {
        setupDataTable($(this))
    });
});