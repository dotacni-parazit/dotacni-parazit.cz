<?php


$years = $titul->zaznamPlatnostOdDatum->year == $titul->zaznamPlatnostDoDatum->year ? $titul->zaznamPlatnostDoDatum->year : $titul->zaznamPlatnostOdDatum->year . '-' . $titul->zaznamPlatnostDoDatum->year;
$this->set('title', $titul->dotaceTitulNazev);
$props = [
    "dotaceTitulKod" => "Kód Dotačního Titulu",
    "dotaceTitulVlastniKod" => "Vlastní kód Dotačního Titulu",
    "statniRozpocetKapitolaKod" => "Kód kapitoly státního rozpočtu",
    "dotaceTitulNazev" => "Název Dotačního Titulu",
    "dotaceTitulNazevZkraceny" => "Zkrácený název Dotačního Titulu",
    "zaznamPlatnostOdDatum" => "Začátek platnosti",
    "zaznamPlatnostDoDatum" => "Konec platnosti"
];

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné informace</a></li>
        <li><a href="#rozhodnuti">Rozhodnutí / Dotace</a></li>
    </ul>
    <div id="obecne">
        <table>
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
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
    </div>
    <div id="rozhodnuti">
        <h2>Rozhodnutí / Dotace</h2>

        <hr/>
        <span id="soucet"></span><br/>
        <span id="soucetSpotrebovana"></span>
        <hr/>

        <table id="datatable" data-ajax="/detail-dotacni-titul/3040000001/ajax/?id=<?= $idTitul ?>">
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
    </div>
</div>

<script type="text/javascript">
    var table;
    $(document).ready(function () {

        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });

        $(table.table().container()).on('keyup change', 'thead input', function () {
            table
                .column($(this).data('index'))
                .search(this.value)
                .draw();
        });

        function printSum() {
            var soucet = 0, soucetSpotrebovano = 0;

            $("#datatable").dataTable().api().rows().every(function (index, tableLoop, rowLoop) {
                //if (this.data()[5].lastIndexOf('p)') !== 0) {
                soucet += this.data()[4].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                soucetSpotrebovano += this.data()[5].replace(/\,00/g, '').replace(/[^\d.-]/g, '') * 1;
                //}
            });

            $("#soucet").text("Součet zobrazených řádků (částka rozhodnutá): " + $.fn.dataTable.render.number('.', ',', 0).display(soucet) + " Kč");
            $("#soucetSpotrebovana").text("Součet zobrazených řádků (částka spotřebovaná): " + $.fn.dataTable.render.number('.', ',', 0).display(soucetSpotrebovano) + " Kč");
        }

        $("#datatable").dataTable().fnSettings().aoDrawCallback.push({
            'sName': 'showSum',
            'fn': function () {
                printSum();
            }
        });

        printSum();
    });
</script>