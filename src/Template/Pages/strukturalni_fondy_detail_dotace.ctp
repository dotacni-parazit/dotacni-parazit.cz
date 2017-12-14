<?php
/** @var \App\Model\Entity\StrukturalniFondy $data */

use Cake\I18n\Number;

$this->set('title', $data->nazevProjektu);
?>

<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th class="nosearch">Vlastnost</th>
        <th class="nosearch">Hodnota</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>Číslo a Název Programu</td>
        <td><?= $data->cisloANazevProgramu ?></td>
    </tr>

    <tr>
        <td>Číslo Priority MMR</td>
        <td><?= $data->cisloPrioritniOsy ?></td>
    </tr>

    <tr>
        <td>Číslo Opatření MMR</td>
        <td><?= $data->cisloOblastiPodpory ?></td>
    </tr>

    <tr>
        <td>Identifikátor Projektu</td>
        <td><?= $data->cisloProjektu ?></td>
    </tr>

    <tr>
        <td>Název Projektu</td>
        <td><?= $data->nazevProjektu ?></td>
    </tr>

    <tr>
        <td>Popis Projektu</td>
        <td><?= $data->popisProjektu ?></td>
    </tr>

    <tr>
        <td>Žadatel</td>
        <td><?= $data->zadatel ?></td>
    </tr>

    <tr>
        <td>Žadatel IČO</td>
        <td><?= \App\View\DPUTILS::ico($data->zadatelIcoNum) ?></td>
    </tr>

    <tr>
        <td>Právní Forma Žadatele</td>
        <td><?= $data->pravniForma ?></td>
    </tr>

    <tr>
        <td>Skupina Právní Formy Žadatele</td>
        <td><?= $data->pravniFormaSkupina ?></td>
    </tr>

    <tr>
        <td>Stav Projektu</td>
        <td><?= $data->stavProjektu ?></td>
    </tr>

    <tr>
        <td>Datum Podpisu Smlouvy</td>
        <td><?= $data->datumPodpisuSmlouvy ?></td>
    </tr>

    <tr>
        <td>Adresa Žadatele</td>
        <td><?= $data->adresaZadatele ?></td>
    </tr>

    <tr>
        <td>Kraj Žadatele</td>
        <td><?= $data->krajZadateleNazev . ' / ' . $data->krajZadateleKod ?></td>
    </tr>

    <tr>
        <td>Obec Žadatele</td>
        <td><?= $data->obecZadateleNazev . ' / ' . $data->obecZadateleKod ?></td>
    </tr>

    <tr>
        <td>Celkové Zdroje</td>
        <td><?= Number::currency($data->celkoveZdroje) ?></td>
    </tr>

    <tr>
        <td>Veřejné Zdroje Celkem</td>
        <td><?= Number::currency($data->verejneZdrojeCelkem) ?></td>
    </tr>

    <tr>
        <td>EU Zdroje</td>
        <td><?= Number::currency($data->euZdroje) ?></td>
    </tr>

    <tr>
        <td>Vyúčtované Zdroje Celkem</td>
        <td><?= Number::currency($data->vyuctovaneVerejneCelkem) ?></td>
    </tr>

    <tr>
        <td>Proplacené EU Zdroje</td>
        <td><?= Number::currency($data->proplaceneEuZdroje) ?></td>
    </tr>

    <tr>
        <td>Certifikované Veřejné Finance Celkem</td>
        <td><?= Number::currency($data->vyuctovaneVerejneCelkem) ?></td>
    </tr>

    <tr>
        <td>Počet míst realizace</td>
        <td><?= $data->pocetMistRealizace ?></td>
    </tr>

    <tr>
        <td>Realizace NUTS</td>
        <td><?= $data->nazevNUTS . ' / ' . $data->kodNUTS ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td class="nosearch">Hodnota</td>
    </tr>
    </tfoot>
</table>
