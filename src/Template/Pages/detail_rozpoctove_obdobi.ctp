<?php


use Cake\I18n\Number;

$this->set('title', 'Detail - Rozpočtové Období')
?>

<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th>Vlastnost</th>
        <th>Hodnota</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>Částka Čerpaná</td>
        <td><?= Number::currency($data->castkaCerpana) ?></td>
    </tr>

    <tr>
        <td>Částka Rozhodnutá</td>
        <td><?= Number::currency($data->Rozhodnuti->castkaRozhodnuta) ?></td>
    </tr>

    <tr>
        <td>Částka Uvolněná</td>
        <td><?= Number::currency($data->castkaUvolnena) ?></td>
    </tr>

    <tr>
        <td>Částka Vrácená</td>
        <td><?= Number::currency($data->castkaVracena) ?></td>
    </tr>

    <tr>
        <td>Částka Spotřebovaná</td>
        <td><?= Number::currency($data->castkaSpotrebovana) ?></td>
    </tr>

    <tr>
        <td>Částka Požadovaná</td>
        <td><?= Number::currency($data->Rozhodnuti->castkaPozadovana) ?></td>
    </tr>

    <tr>
        <td>Investice?</td>
        <td><?= $data->Rozhodnuti->investiceIndikator ? 'ANO' : 'NE' ?></td>
    </tr>

    <tr>
        <td>Rozpočtové Období</td>
        <td><?= $data->rozpoctoveObdobi ?></td>
    </tr>

    <tr>
        <td>Refundace?</td>
        <td><?= $data->Rozhodnuti->refundaceIndikator ? 'ANO' : 'NE' ?></td>
    </tr>

    <tr>
        <td>Částka Požadovaná</td>
        <td><?= Number::currency($data->Rozhodnuti->castkaPozadovana) ?></td>
    </tr>

    <tr>
        <td>Dotační Titul</td>
        <td><?= $this->Html->link($data->CiselnikDotaceTitulv01->dotaceTitulNazev . ' (' . $data->CiselnikDotaceTitulv01->dotaceTitulNazevZkraceny . ')', '/detail-dotacni-titul/' . $data->CiselnikDotaceTitulv01->dotaceTitulKod) ?></td>
    </tr>

    <tr>
        <td>Název Projektu</td>
        <td><?= $this->Html->link($data->Rozhodnuti->Dotace->projektNazev, '/detail-dotace/' . $data->Rozhodnuti->idDotace); ?></td>
    </tr>

    <tr>
        <td>Identifikátor projektu</td>
        <td><?= $this->Html->link($data->Rozhodnuti->Dotace->projektIdentifikator, '/detail-dotace/' . $data->Rozhodnuti->idDotace); ?></td>
    </tr>

    <tr>
        <td>Finanční Zdroj</td>
        <td><?= $this->Html->link($data->Rozhodnuti->FinancniZdroj->financniZdrojNazev, '/podle-zdroje-financi/' . $data->Rozhodnuti->FinancniZdroj->financniZdrojKod . '/rok/' . $data->rozpoctoveObdobi) ?></td>
    </tr>

    <tr>
        <td>Členění Finančních Prostředků</td>
        <td><?= $data->Rozhodnuti->CleneniFinancnichProstredku->financniProstredekCleneniNazev ?></td>
    </tr>

    <tr>
        <td>Poskytovatel Dotace</td>
        <td><?= $this->Html->link($data->Rozhodnuti->PoskytovatelDotace->dotacePoskytovatelNazev, '/podle-poskytovatelu/' . $data->Rozhodnuti->PoskytovatelDotace->dotacePoskytovatelKod); ?></td>
    </tr>

    <tr>
        <td>Kód projektu</td>
        <td><?= $data->Rozhodnuti->Dotace->projektKod ?></td>
    </tr>

    <tr>
        <td>Ukončení skutečné datum</td>
        <td><?= empty($data->Rozhodnuti->Dotace->ukonceniSkutecneDatum) ? 'Neuvedeno' : $data->Rozhodnuti->Dotace->ukonceniSkutecneDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Ukončení plánované datum</td>
        <td><?= empty($data->Rozhodnuti->Dotace->ukonceniPlanovaneDatum) ? 'Neuvedeno' : $data->Rozhodnuti->Dotace->ukonceniPlanovaneDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Zahájení skutečné datum</td>
        <td><?= empty($data->Rozhodnuti->Dotace->zahajeniSkutecneDatum) ? 'Neuvedeno' : $data->Rozhodnuti->Dotace->zahajeniSkutecneDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Zahájení plánované datum</td>
        <td><?= empty($data->Rozhodnuti->Dotace->zahajeniPlanovaneDatum) ? 'Neuvedeno' : $data->Rozhodnuti->Dotace->zahajeniPlanovaneDatum->nice() ?></td>
    </tr>

    <tr>
        <td>Odkaz CEDR (záznam Rozpočtové Období)</td>
        <td><?= $this->Html->link('http://cedropendata.mfcr.cz/c3lod/cedr/resource/RozpoctoveObdobi/' . $data->idObdobi) ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td>Hodnota</td>
    </tr>
    </tfoot>
</table>
