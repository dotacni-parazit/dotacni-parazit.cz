<?php
use Cake\I18n\Number;

$this->Html->script('datatable.js', ['block' => true]);

$jmeno_prijemce = empty($prijemce->obchodniJmeno) ? $prijemce->jmeno . ' ' . $prijemce->prijmeni : $prijemce->obchodniJmeno;

$this->set('title', $jmeno_prijemce . ' - Příjemce Pomoci');
?>

<table>
    <thead>
    <tr>
        <th>Údaj</th>
        <th>Obsah</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>Název Příjemce (obchodní jméno)</td>
        <td><?= $prijemce->obchodniJmeno ?></td>
    </tr>

    <tr>
        <td>IČ (IČO)</td>
        <td><?= $prijemce->ico == 0 ? "N/A" : $prijemce->ico ?></td>
    </tr>

    <tr>
        <td>Právní Forma</td>
        <td><?= empty($prijemce->PravniForma) ? 'Nevyplněno' : $prijemce->PravniForma->pravniFormaNazev ?></td>
    </tr>

    <tr>
        <td>Stát</td>
        <td><?= $prijemce->Stat->statNazev ?></td>
    </tr>

    <tr>
        <td>Ekonomický Subjekt</td>
        <td><?= empty($prijemce->EkonomikaSubjekt) ? 'Nevyplněno' : $prijemce->EkonomikaSubjekt->id ?></td>
    </tr>

    <tr>
        <td>Rok Narození</td>
        <td><?= $prijemce->rokNarozeni == 0 ? '' : $prijemce->rokNarozeni ?></td>
    </tr>

    <tr>
        <td>Jméno</td>
        <td><?= $prijemce->jmeno ?></td>
    </tr>

    <tr>
        <td>Příjmení</td>
        <td><?= $prijemce->prijmeni ?></td>
    </tr>

    <tr>
        <td>Bydliště</td>
        <td><?= (empty($prijemce->Osoba) || empty($prijemce->Osoba->Obec)) ? 'Nevyplněno' : ($prijemce->Osoba->Obec->obecNazev . ' (NUTS: ' . $prijemce->Osoba->Obec->obecNutsKod . ')') ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <th>Údaj</th>
        <th>Obsah</th>
    </tr>
    </tfoot>
</table>

<h2>Rozhodnutí/Dotace</h2>
<input id="onlythis" type="checkbox" name="onlythis"
       value="onlythis">Neukazovat ostatní rozhodnutí příjemců se stejným IČO<br/>
<hr/>
<span id="soucet"></span><br/>
<span id="soucetSpotrebovana"></span>
<hr/>
<table id="datatable">
    <thead>
    <tr>
        <th data-type="html" class="large-2 medium-2">Dotace (kod nebo identifikator projektu)</th>
        <th data-type="currency" class="large-2 medium-2">Částka Požadovaná</th>
        <th data-type="currency" class="large-2 medium-2">Částka Rozhodnutá</th>
        <th data-type="currency" class="large-2 medium-2">Částka Spotřebovaná</th>
        <th data-type="number" class="large-1 medium-1">Rok</th>
        <th data-type="string" class="large-2 medium-2">Členění finančních prostředků</th>
        <th data-type="string" class="large-2 medium-2">Finanční Zdroj</th>
        <th data-type="string" class="large-1 medium-1">Shodný Příjemce</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($dotace as $d) {
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
            <td><?= $this->Html->link($displayDotace, '/detail-dotace/' . $d->Dotace->idDotace, ['escape' => false]) ?></td>
            <td style="text-align: right"><?= Number::currency($d->castkaPozadovana) ?></td>
            <td style="text-align: right"><?= Number::currency($d->castkaRozhodnuta) ?></td>
            <td style="text-align: right"><?= isset($d->RozpoctoveObdobi) && !empty($d->RozpoctoveObdobi) ? Number::currency($d->RozpoctoveObdobi->castkaSpotrebovana) : 'N/A' ?></td>
            <td><?= $d->rokRozhodnuti ?></td>
            <td><?= $d->CleneniFinancnichProstredku->financniProstredekCleneniNazev ?></td>
            <td><?= $d->FinancniZdroj->financniZdrojNazev ?></td>
            <td><?= $d->Dotace->idPrijemce == $prijemce->idPrijemce ? 'YES' : 'NO' ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th data-type="html">Dotace (kod nebo identifikator projektu)</th>
        <th data-type="currency" class="large-2 medium-2">Částka Požadovaná</th>
        <th data-type="currency" class="large-2 medium-2">Částka Rozhodnutá</th>
        <th data-type="currency" class="large-2 medium-2">Částka Spotřebovaná</th>
        <th data-type="number" class="large-1 medium-1">Rok</th>
        <th data-type="string" class="large-2 medium-2">Členění finančních prostředků</th>
        <th data-type="string" class="large-2 medium-2">Finanční Zdroj</th>
        <th data-type="string" class="large-1 medium-1">Shodný Příjemce</th>
    </tr>
    </tfoot>
</table>
<br/>
<br/>
<br/>

<?php if (!empty($prijemci->toArray())) {
    ?>
    <div id="prijemce_aliasy">
        Příjemce pomoci je také evidován pod těmito odkazy: <br/>
        <?php
        foreach ($prijemci as $p) { ?>
            <?= $this->Html->link('( ' . str_pad($p->idPrijemce, 44, " ") . ' ) ' . $p->obchodniJmeno, '/detail-prijemce-pomoci/' . $p->idPrijemce, ['escape' => false]) ?>
            <br/>
        <?php } ?>
    </div>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#onlythis").on('change', function () {
            var checked = $(this).is(":checked");
            var last = $('table thead tr th input').last();
            last.val(checked ? 'YES' : '');
            last.trigger('keyup')
        });

        function printSum() {
            var num = $("#datatable").dataTable().api().column(2, {page: 'current'}).data().sum();
            $("#soucet").text("Součet zobrazených řádků (částka rozhodnutá): " + $.fn.dataTable.render.number('.', ',', 0).display(num) + " Kč");
            var num = $("#datatable").dataTable().api().column(3, {page: 'current'}).data().sum();
            $("#soucetSpotrebovana").text("Součet zobrazených řádků (částka spotřebovaná): " + $.fn.dataTable.render.number('.', ',', 0).display(num) + " Kč");
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
