<?php
$this->set('title', 'Odhalování spol. fyzických osob u příjemců dotací');
?>

<table class="datatable" style="width: 100%;" data-ajax="<?= $this->request->getAttribute("here") ?>">
    <thead>
    <tr>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th>Datum Narození</th>
        <th>Počet firem</th>
        <th data-type="currency">Součet CEDR-III Rozhodnutí</th>
        <th data-type="currency">Součet CEDR-III Spotřebováno</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td>Jméno</td>
        <td>Příjmení</td>
        <td>Datum Narození</td>
        <td>Počet firem</td>
        <td>Součet CEDR-III Rozhodnutí</td>
        <td>Součet CEDR-III Spotřebováno</td>
    </tr>
    </tfoot>
</table>