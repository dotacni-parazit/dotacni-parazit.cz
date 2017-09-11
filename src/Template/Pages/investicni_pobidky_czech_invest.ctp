<?php
$this->set('title', 'Investiční Pobídky - CzechInvest');
?>

<table class="datatable" data-ajax="<?= $this->request->here(false) ?>">
    <thead>
    <tr>
        <th>Společnost</th>
        <th>IČO</th>
        <th>Sektor</th>
        <th>Druh Investiční Akce</th>
        <th>Země Původu</th>
        <th data-type="currency">Investice EUR</th>
        <th data-type="currency">USD</th>
        <th data-type="currency">CZK</th>
        <th>Vytvořená Pracovní Místa</th>
        <th>Míra Veřejné Podpory</th>
        <th>Okres, Kraj</th>
        <th>Datum Rozhodnutí</th>
        <th>Stav Realizace</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td>Společnost</td>
        <td>IČO</td>
        <td>Sektor</td>
        <td>Druh Investiční Akce</td>
        <td>Země Původu</td>
        <td>Investice EUR</td>
        <td>USD</td>
        <td>CZK</td>
        <td>Vytvořená Pracovní Místa</td>
        <td>Míra Veřejné Podpory</td>
        <td>Okres, Kraj</td>
        <td>Datum Rozhodnutí</td>
        <td>Projekt nerealizován</td>
    </tr>
    </tfoot>
</table>
