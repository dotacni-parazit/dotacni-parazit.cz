<?php
/** @var \App\Model\Entity\Dotinfo $data */

use Cake\I18n\Number;

$this->set('title', empty($data->dotaceNazev) ? (empty($data->idDotace) ? '' : $data->idDotace) : $data->dotaceNazev . ' - Detail DotInfo');
?>

<table id="datatable" class="datatable_simple">
    <thead>
    <tr>
        <th class="nosearch">Vlastnost</th>
        <th class="nosearch">Hodnota</th>
    </tr>
    </thead>

    <tbody>

    <tr>
        <td>Název Dotace</td>
        <td><?= $data->dotaceNazev ?></td>
    </tr>
    <tr>
        <td>ID Dotace</td>
        <td><?= $data->idDotace ?></td>
    </tr>
    <tr>
        <td>Příjemce Pomoci</td>
        <td><?= $data->ucastnikObchodniJmeno ?></td>
    </tr>
    <tr>
        <td>IČO Příjemce Pomoci</td>
        <td><?= \App\View\DPUTILS::ico($data->ucastnikIco) ?></td>
    </tr>
    <tr>
        <td>IČO Poskytovatele Pomoci</td>
        <td><?= \App\View\DPUTILS::ico($data->poskytovatelIco) ?></td>
    </tr>
    <tr>
        <td>Poskytovatel Pomoci</td>
        <td><?= $data->poskytovatelNazev ?></td>
    </tr>
    <tr>
        <td>Datum Poskytnutí</td>
        <td><?= $data->datumPoskytnuti ?></td>
    </tr>
    <tr>
        <td>Částka schválená</td>
        <td><?= Number::currency($data->castkaSchvalena) ?></td>
    </tr>
    <tr>
        <td>Částka žádaná</td>
        <td><?= Number::currency($data->castkaPozadovana) ?></td>
    </tr>

    </tbody>

    <tfoot>
    <tr>
        <th>Vlastnost</th>
        <th>Hodnota</th>
    </tr>
    </tfoot>
</table>
