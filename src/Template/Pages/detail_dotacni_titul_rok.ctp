<?php
use \Cake\I18n\Number;

$years = $titul->zaznamPlatnostOdDatum->year == $titul->zaznamPlatnostDoDatum->year ? $titul->zaznamPlatnostDoDatum->year : $titul->zaznamPlatnostOdDatum->year . '-' . $titul->zaznamPlatnostDoDatum->year;
$this->set('title', $titul->dotaceTitulNazev . ' (' . $years . ') - Dotační Titul');
$props = [
    "dotaceTitulKod" => "Kód Dotačního Titulu",
    "dotaceTitulVlastniKod" => "Vlastní kód Dotačního Titulu",
    "statniRozpocetKapitolaKod" => "Kód kapitoly státního rozpočtu",
    "dotaceTitulNazev" => "Název Dotačního Titulu",
    "dotaceTitulNazevZkraceny" => "Zkrácený název Dotačního Titulu",
    "zaznamPlatnostOdDatum" => "Začátek platnosti",
    "zaznamPlatnostDoDatum" => "Konec platnosti"
];
?>

<table>
    <thead>
    <tr>
        <th>Vlastnost</th>
        <th>Hodnota</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($props as $key => $val) { ?>
        <tr>
            <td><?= $val ?></td>
            <td><?= $titul->{$key} ?></td>
        </tr>
    <?php } ?>

    <tr>
        <td>Kapitola Státního Rozpočtu</td>
        <td><?= $this->Html->link(
                $titul->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaNazev
                . " (" . $titul->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod . ")",
                "/podle-poskytovatelu/" . $titul->CiselnikStatniRozpocetKapitola->statniRozpocetKapitolaKod) ?></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td>Hodnota</td>
    </tr>
    </tfoot>
</table>
<h2>Rozhodnutí / Dotace</h2>
<table id="datatable_ajax">
    <thead>
    <tr>
        <th data-type="html" class="nosearch medium-1 large-1 small-1">Rozhodnutí</th>
        <th data-type="html">Dotace</th>
        <th data-type="html">Jméno příjemce</th>
        <th class="medium-1 large-1">Rozpočtové Období</th>
        <th data-type="currency" class="nosearch">Částka rozhodnutá</th>
        <th data-type="currency" class="nosearch">Částka spotřebovaná</th>
        <th>Poskytovatel Dotace</th>
        <th>Finanční Zdroj</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <td>Rozhodnutí</td>
        <td>Dotace</td>
        <td>Jméno příjemce</td>
        <td>Rozpočtové Období</td>
        <td>Částka rozhodnutá</td>
        <td>Částka spotřebovaná</td>
        <td>Poskytovatel Dotace</td>
        <td>Finanční Zdroj</td>
    </tr>
    </tfoot>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        var table = $('#datatable_ajax').DataTable({
            fixedColumns: true,
            paging: true,
            serverSide: false,
            processing: true,
            "stateSave": true,
            "stateDuration": 60 * 60 * 24 * 7,
            dom: 'r<"clear">ip<"clear">lf<"clear">t',
            ajax: '/detail-dotacni-titul/3040000001/ajax/?id=<?= $idTitul ?>',
            "lengthMenu": [[50, 100, 200, -1], [50, 100, 200, "All"]],
            "language": {
                "processing": "Načítám data (maximálně 50.000 položek)"
            }
        });

        $('#datatable_ajax thead th').each(function (i) {
            var title = $('#datatable_ajax thead th').eq($(this).index()).text();
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