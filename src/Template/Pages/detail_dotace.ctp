<?php
use Cake\I18n\Number;

$this->Html->script('datatable.js', ['block' => true]);
$this->set('title', (empty($dotace->projektNazev) ? $dotace->projektIdnetifikator : $dotace->projektNazev) . ' - Detail Dotace');
?>a
<table>
    <thead>
    <tr>
        <th>Údaj</th>
        <th>Obsah</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Identifikátor Projektu</td>
        <td><?= $dotace->projektIdnetifikator ?></td>
    </tr>

    <tr>
        <td>Kód Projektu</td>
        <td><?= $dotace->projektKod ?></td>
    </tr>

    <tr>
        <td>Datum Podpisu</td>
        <td><?= $dotace->podpisDatum ?></td>
    </tr>

    <tr>
        <td>Příjemce Pomoci</td>
        <td><?= $this->Html->link($dotace->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $dotace->PrijemcePomoci->idPrijemce) ?></td>
    </tr>

    <tr>
        <td>Datum Zahájení (Plánované)</td>
        <td><?= $dotace->zahajeniPlanovaneDatum ?></td>
    </tr>

    <tr>
        <td>Datum Zahájení (Skutečné)</td>
        <td><?= $dotace->zahajeniSkutecneDatum ?></td>
    </tr>

    <tr>
        <td>Datum Ukončení (Plánované)</td>
        <td><?= $dotace->ukonceniPlanovaneDatum ?></td>
    </tr>

    <tr>
        <td>Datum Ukončení (Skutečné)</td>
        <td><?= $dotace->ukonceniSkutecneDatum ?></td>
    </tr>

    <tr>
        <td>MMR: Operační program</td>
        <td><?= empty($dotace->MmrOperacniProgram) ? 'Nevyplněno' : $this->Html->link($dotace->MmrOperacniProgram->operacaniProgramNazev . ' ( kód: ' . $dotace->MmrOperacniProgram->operacaniProgramKod . ' )', '/detail-mmr-operacni-program/?id=' . $dotace->MmrOperacniProgram->idOperacniProgram) ?></td>
    </tr>

    <tr>
        <td>MMR: Podprogram</td>
        <td><?= empty($dotace->MmrPodprogram) ? 'Nevyplněno' : $this->Html->link($dotace->MmrPodprogram->podprogramNazev . ' ( kód: ' . $dotace->MmrPodprogram->podprogramKod . ' )', '/detail-mmr-podprogram/?id=' . $dotace->MmrPodprogram->idPodprogram) ?></td>
    </tr>

    <tr>
        <td>MMR: Grantové Schéma</td>
        <td><?= empty($dotace->MmrGrantoveSchema) ? 'Nevyplněno' : $this->Html->link($dotace->MmrGrantoveSchema->grantoveSchemaNazev . ' ( kód: ' . $dotace->MmrGrantoveSchema->grantoveSchemaKod . ' )', '/detail-mmr-grantove-schema/?id=' . $dotace->MmrGrantoveSchema->idGrantoveSchema) ?></td>
    </tr>

    <tr>
        <td>MMR: Opatření</td>
        <td><?= empty($dotace->MmrOpatreni) ? 'Nevyplněno' : $this->Html->link($dotace->MmrOpatreni->opatreniNazev . ' ( kód: ' . $dotace->MmrOpatreni->opatreniKod . ' )', '/detail-mmr-opatreni/?id=' . $dotace->MmrOpatreni->idOpatreni) ?></td>
    </tr>

    <tr>
        <td>MMR: PodOpatření</td>
        <td><?= empty($dotace->MmrPodOpatreni) ? 'Nevyplněno' : $this->Html->link($dotace->MmrPodOpatreni->podOpatreniNazev . ' ( kód: ' . $dotace->MmrPodOpatreni->podOpatreniKod . ' )', '/detail-mmr-podopatreni/?id=' . $dotace->MmrPodOpatreni->idPodOpatreni) ?></td>
    </tr>

    <tr>
        <td>MMR: Priorita</td>
        <td><?= empty($dotace->MmrPriorita) ? 'Nevyplněno' : $this->Html->link($dotace->MmrPriorita->prioritaNazev . ' ( kód: ' . $dotace->MmrPriorita->prioritaKod . ' )', '/detail-mmr-priorita/?id=' . $dotace->MmrPriorita->idPriorita) ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <th>Údaj</th>
        <th>Obsah</th>
    </tr>
    </tfoot>
</table>

<h2>Příjemce
    Pomoci <?= $this->Html->link('(Otevřít detail)', '/detail-prijemce-pomoci/' . $dotace->PrijemcePomoci->idPrijemce) ?></h2>
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
        <td><?= $dotace->PrijemcePomoci->obchodniJmeno ?></td>
    </tr>

    <tr>
        <td>IČ (IČO)</td>
        <td><?= $dotace->PrijemcePomoci->ico ?></td>
    </tr>

    <tr>
        <td>Právní Forma</td>
        <td><?= empty($dotace->PrijemcePomoci->PravniForma) ? 'Nevyplněno' : $dotace->PrijemcePomoci->PravniForma->pravniFormaNazev ?></td>
    </tr>

    <tr>
        <td>Stát</td>
        <td><?= $dotace->PrijemcePomoci->Stat->statNazev ?></td>
    </tr>

    <tr>
        <td>Ekonomický Subjekt</td>
        <td><?= !empty($dotace->PrijemcePomoci->EkonomikaSubjekt) ? $dotace->PrijemcePomoci->EkonomikaSubjekt->id : 'Nevyplněno' ?></td>
    </tr>

    <tr>
        <td>Rok Narození</td>
        <td><?= $dotace->PrijemcePomoci->rokNarozeni == 0 ? '' : $dotace->PrijemcePomoci->rokNarozeni ?></td>
    </tr>

    <tr>
        <td>Jméno</td>
        <td><?= $dotace->PrijemcePomoci->jmeno ?></td>
    </tr>

    <tr>
        <td>Příjmení</td>
        <td><?= $dotace->PrijemcePomoci->prijmeni ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <th>Údaj</th>
        <th>Obsah</th>
    </tr>
    </tfoot>
</table>

<h2>Rozhodnutí o udělení dotace</h2>
<hr/>
<span id="soucet"></span><br/>
<span id="soucetCerpani"></span>
<hr/>
<table id="datatable">
    <thead>
    <tr>
        <th>Dílčí Rozhodnutí</th>
        <th>Rok Rozhodnutí</th>
        <th>Částka Požadovaná</th>
        <th>Částka Rozhodnutá</th>
        <th>Částka Spotřebovaná</th>
        <th>Poskytovatel Dotace</th>
        <th>Členění Finančních Prostředků</th>
        <th>Finanční Zdroj</th>
        <th>Investice?</th>
        <th>Návratnost?</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $counter = 1;
    foreach ($rozhodnuti as $r) {
        ?>
        <tr>
            <td><?= $this->Html->link($counter, '/detail-rozhodnuti/' . $r->idRozhodnuti) ?></td>
            <td><?= $r->rokRozhodnuti ?></td>
            <td><?= Number::currency($r->castkaPozadovana) ?></td>
            <td><?= Number::currency($r->castkaRozhodnuta) ?></td>
            <td><?= !empty($r->RozpoctoveObdobi) ? Number::currency($r->RozpoctoveObdobi->castkaSpotrebovana) : "N/A" ?></td>
            <td><?= $r->PoskytovatelDotace->dotacePoskytovatelNazev ?></td>
            <td><?= $r->CleneniFinancnichProstredku->financniProstredekCleneniNazev ?></td>
            <td><?= $r->FinancniZdroj->financniZdrojNazev ?></td>
            <td><?= $r->investiceIndikator ? 'ANO' : 'NE' ?></td>
            <td><?= $r->navratnostIndikator ? 'ANO' : 'NE' ?></td>
        </tr>
        <?php
        $counter++;
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Dílčí Rozhodnutí</th>
        <th>Rok Rozhodnutí</th>
        <th>Částka Požadovaná</th>
        <th>Částka Rozhodnutá</th>
        <th>Částka Spotřebovaná</th>
        <th>Poskytovatel Dotace</th>
        <th>Členění Finančních Prostředků</th>
        <th>Finanční Zdroj</th>
        <th>Investice?</th>
        <th>Návratnost?</th>
    </tr>
    </tfoot>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        function printSum() {
            var num = $("#datatable").dataTable().api().column(3, {page: 'current'}).data().sum();
            $("#soucet").text("Součet zobrazených řádků (částka rozhodnutá): " + $.fn.dataTable.render.number('.', ',', 0).display(num) + " Kč");

            num = $("#datatable").dataTable().api().column(4, {page: 'current'}).data().sum();
            $("#soucetCerpani").text("Součet zobrazených řádků (částka spotřebovaná): " + $.fn.dataTable.render.number('.', ',', 0).display(num) + " Kč");
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