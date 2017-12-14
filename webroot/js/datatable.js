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

var buttonCommon = {
    exportOptions: {
        format: {
            body: function (data, row, column, node) {
                var tmp = $("<a>" + data + "</a>").text();
                if (tmp.match(/\sKč$/)) return tmp.replace(/\sKč/g, '').replace(/\s/g, '').replace(/\,/, '.');
                return tmp;
            }
        }
    }
};

function setupDataTable(selector) {
    $e = (typeof(selector) === 'string') ? $(selector) : selector;
    var ttable = $($e).DataTable({
        fixedColumns: false,
        paging: !$($e).hasClass('datatable_simple'),
        "pageLength": 100,
        initComplete: function () {
            if (typeof initCallback === "function") {
                initCallback(ttable);
            }
        },
        "drawCallback": function( settings ) {
            var api = new $.fn.dataTable.Api( settings );

            if (typeof printSum === "function") {
                printSum(api);
            }
        },
        "language": {
            "emptyTable": "Tabulka neobsahuje žádná data",
            "info": "Zobrazuji _START_ až _END_ z celkem _TOTAL_ záznamů",
            "infoEmpty": "Zobrazuji 0 až 0 z 0 záznamů",
            "infoFiltered": "(filtrováno z celkem _MAX_ záznamů)",
            "infoPostFix": "",
            "infoThousands": " ",
            "lengthMenu": "Zobraz záznamů _MENU_",
            "loadingRecords": "Načítám...",
            "search": "Hledat:",
            "zeroRecords": "Žádné záznamy nebyly nalezeny",
            "paginate": {
                "first": "První",
                "last": "Poslední",
                "next": "Další",
                "previous": "Předchozí"
            },
            "aria": {
                "sortAscending": ": aktivujte pro řazení sloupce vzestupně",
                "sortDescending": ": aktivujte pro řazení sloupce sestupně"
            }
        },
        "autoWidth": false,
        scrollX: false,
        scrollCollapse: true,
        colReorder: true,
        responsive: false,
        ajax: $($e).attr('data-ajax') ? $($e).attr('data-ajax') : '',
        "stateDuration": 60 * 60 * 24 * 7,
        dom: $($e).hasClass('datatable_simple') ? '<"table-responsive"t>B' : 'r<"clear">ip<"clear">lf<"clear"><"table-responsive"t>B',
        buttons: [
            $.extend(true, {}, buttonCommon, {
                extend: 'csv'
            }),
            $.extend(true, {}, buttonCommon, {
                extend: 'excel'
            }),
            'print'
        ],
        "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]]
    });

    $($e).find('thead th').each(function (i) {
        var title = $($e).find('thead th').eq($(this).index()).text();
        if (!$(this).hasClass('nosearch') && $(this).data('type') !== "currency") {
            $(this).html('<input onclick="event.stopPropagation()" onmousedown="event.stopPropagation()" type="text" placeholder="' + title + '" data-index="' + i + '" />');
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