<?php
/** @var \App\Model\Entity\StrukturalniFondy2020 $data */

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
        <td>Název Programu</td>
        <td><?= $data->operacniProgram ?></td>
    </tr>

    <tr>
        <td>Číslo Priority MMR</td>
        <td><?= $data->cisloPrioritniOsy ?></td>
    </tr>

    <tr>
        <td>Fond</td>
        <td><?= $data->fond ?></td>
    </tr>

    <tr>
        <td>Identifikátor Projektu</td>
        <td><?= $data->registracniCisloProjektu ?></td>
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
        <td><?= \App\View\DPUTILS::ico($data->zadatelIco) ?></td>
    </tr>

    <tr>
        <td>Právní Forma Žadatele</td>
        <td><?= $data->zadatelPravniForma ?></td>
    </tr>

    <tr>
        <td>Stav Projektu</td>
        <td><?= $data->stavRealizace ?></td>
    </tr>

    <tr>
        <td>Datum Zahájení Realizace</td>
        <td><?= $data->datumZahajeni ?></td>
    </tr>

    <tr>
        <td>Plánované Datum Ukončení Realizace</td>
        <td><?= $data->datumUkonceniPredpokladane ?></td>
    </tr>

    <tr>
        <td>Skutečné Datum Ukončení Realizace</td>
        <td><?= $data->datumUkonceniSkutecne ?></td>
    </tr>

    <tr>
        <td>PSČ Žadatele</td>
        <td><?= $data->zadatelPsc ?></td>
    </tr>

    <tr>
        <td>Podíl EU</td>
        <td><?= Number::toPercentage($data->miraSpolufinancovaniEU) ?></td>
    </tr>

    <tr>
        <td>Celkové Zdroje</td>
        <td><?= Number::currency($data->celkoveZdroje) ?></td>
    </tr>

    <tr>
        <td>Veřejné Zdroje Celkem</td>
        <td><?= Number::currency($data->schvaleneZdrojeVerejne) ?></td>
    </tr>

    <tr>
        <td>EU Zdroje</td>
        <td><?= Number::currency($data->schvaleneZdrojeEU) ?></td>
    </tr>

    <tr>
        <td>Soukromé Zdroje</td>
        <td><?= Number::currency($data->schvaleneZdrojeSoukrome) ?></td>
    </tr>

    <tr>
        <td>Vyúčtované Zdroje Celkem</td>
        <td><?= Number::currency($data->vyuctovaneZdroje) ?></td>
    </tr>

    <tr>
        <td>Vyúčtované EU Zdroje</td>
        <td><?= Number::currency($data->vyuctovaneZdrojeEU) ?></td>
    </tr>

    <tr>
        <td>Vyúčtované Veřejné Finance Celkem</td>
        <td><?= Number::currency($data->vyuctovaneZdrojeVerejne) ?></td>
    </tr>

    <tr>
        <td>Vyúčtované Soukromé Zdroje</td>
        <td><?= Number::currency($data->vyuctovaneZdrojeSoukrome) ?></td>
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
