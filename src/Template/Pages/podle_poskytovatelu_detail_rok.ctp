<?php
use Cake\I18n\Number;

?>
<h1><?= $year ?> - <?= $poskytovatel->dotacePoskytovatelNazev ?> - Poskytovatel Dotací</h1>
<div>
    Součet za rok <?= $year ?>: <?= Number::currency($year_sum) ?>
</div>
<br/>
<br/>
<h2>Rozhodnutí/Dotace za rok <?= $year ?></h2>
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
    <?php
    foreach ($data as $d) {
        $displayDotace = $d->Dotace->projektNazev;
        if ($d->Dotace->projekKod === $d->Dotace->projektIdnetifikator && !empty($d->Dotace->projektKod) && !empty($d->Dotace->projektIdnetifikator)) {
            $displayDotace .= "<br/>(" . $d->Dotace->projektKod . ")";
        } else if (!empty($d->Dotace->projektKod) && !empty($d->Dotace->projektIdnetifikator)) {
            $displayDotace .= "<br/>(" . $d->Dotace->projektKod . ", " . $d->Dotace->projektIdnetifikator . ")";
        } else if (!empty($d->Dotace->projektIdnetifikator)) {
            $displayDotace .= "<br/>(" . $d->Dotace->projektIdnetifikator . ")";
        }
        if (strpos($displayDotace, '<br/>') === 0) {
            $displayDotace = substr($displayDotace, 5);
        }
        ?>
        <tr>
            <td><?= $this->Html->link($d->Dotace->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $d->Dotace->PrijemcePomoci->idPrijemce) ?></td>
            <td><?= $this->Html->link($displayDotace, '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]) ?></td>
            <td><?= Number::currency($d->castkaRozhodnuta) ?></td>
            <td><?= $d->rokRozhodnuti ?></td>
            <td><?= $d->CleneniFinancnichProstredku->financniProstredekCleneniNazev ?></td>
            <td><?= $d->FinancniZdroj->financniZdrojNazev ?></td>
        </tr>
        <?php
    }
    ?>
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
            "stateSave": true,
            "stateDuration": 60 * 60 * 24 * 7,
            dom: 'r<"clear">ip<"clear">lf<"clear">t',
            ajax: '/podle-poskytovatelu/<?php echo $poskytovatel->dotacePoskytovatelKod ?>/complete/ajax/<?= $year ?>',
            "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]],
            "language": {
                "processing": "Načítám data (maximálně 20.000 položek)"
            }
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