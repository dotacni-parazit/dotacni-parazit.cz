<?php

/** @var \App\Model\Entity\InvesticniPobidky $data */

use Cake\I18n\Number;

$this->set('title', $data->name);
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
        <td>Název Příjemce</td>
        <td><?= $data->name ?></td>
    </tr>

    <tr>
        <td>IČO Příjemce</td>
        <td><?= \App\View\DPUTILS::ico($data->ico) ?></td>
    </tr>

    <tr>
        <td>Sektor</td>
        <td><?= $data->sektor ?></td>
    </tr>

    <tr>
        <td>Druh Investiční Akce</td>
        <td><?= $data->druhInvesticniAkce ?></td>
    </tr>

    <tr>
        <td>Země Žadatele</td>
        <td><?= $data->zemePuvodu ?></td>
    </tr>

    <tr>
        <td>Výše investice</td>
        <td><?= Number::currency($data->investiceCZK * 1000000) ?></td>
    </tr>

    <tr>
        <td>Vytvořená pracovní místa</td>
        <td><?= $data->vytvorenaPracovniMista ?></td>
    </tr>

    <tr>
        <td>Daňová pobídka?</td>
        <td><?= empty($data->pobidkaDane) ? 'NE' : 'ANO' ?></td>
    </tr>

    <tr>
        <td>Pobídka pro vytvoření pracovních míst?</td>
        <td><?= empty($data->pobidkaPracovniMista) ? 'NE' : 'ANO' ?></td>
    </tr>

    <tr>
        <td>Pobídka pro Rekvalifikaci?</td>
        <td><?= empty($data->pobidkaRekvalifikace) ? 'NE' : 'ANO' ?></td>
    </tr>

    <tr>
        <td>Pobídka pro nákup pozemků?</td>
        <td><?= empty($data->pobidkaPozemky) ? 'NE' : 'ANO' ?></td>
    </tr>

    <tr>
        <td>Pobídka je Kapitálová Podpora?</td>
        <td><?= empty($data->pobidkaKapitalovaPodpora) ? 'NE' : 'ANO' ?></td>
    </tr>

    <tr>
        <td>Míra veřejné podpory</td>
        <td><?= Number::toPercentage($data->miraVerejnePodpory * 100) ?></td>
    </tr>

    <tr>
        <td>Strop Veřejné Podpory</td>
        <td><?= Number::currency($data->stropVerejnePodpory * 1000000) ?></td>
    </tr>

    <tr>
        <td>Okres realizace</td>
        <td><?= $data->okres ?></td>
    </tr>

    <tr>
        <td>Kraj realizace</td>
        <td><?= $data->kraj ?></td>
    </tr>

    <tr>
        <td>Rok podání záměru</td>
        <td><?= $data->podaniZameruRok ?></td>
    </tr>

    <tr>
        <td>Datum Rozhodnutí</td>
        <td><?= ($data->rozhodnutiDen == 0 ? '' : $data->rozhodnutiDen . ' ') . $data->rozhodnutiMesic . ' ' . $data->rozhodnutiRok ?></td>
    </tr>

    <tr>
        <td>Stav realizace</td>
        <td><?= $data->zruseniRozhodnutiNeboOdstoupeni == 'x' ? 'Nerealizováno' : 'Realizováno' ?></td>
    </tr>

    </tbody>
    <tfoot>
    <tr>
        <td>Vlastnost</td>
        <td class="nosearch">Hodnota</td>
    </tr>
    </tfoot>
</table>
