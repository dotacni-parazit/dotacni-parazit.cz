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
        <th data-type="currency"> Investice CZK</th>
        <th class="nosearch">Vytvořená Pracovní Místa</th>
        <th class="nosearch">Míra Veřejné Podpory</th>
        <th>Okres, Kraj</th>
        <th>Datum Rozhodnutí</th>
        <th>Stav Realizace</th>
        <th class="nosearch">Otevřít</th>
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
        <td>Investice CZK</td>
        <td>Vytvořená Pracovní Místa</td>
        <td>Míra Veřejné Podpory</td>
        <td>Okres, Kraj</td>
        <td>Datum Rozhodnutí</td>
        <td>Projekt nerealizován</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>
