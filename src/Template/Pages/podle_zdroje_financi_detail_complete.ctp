<?php


$this->set('title', $zdroj->financniZdrojNazev . ' - Zdroj Financí');
?>
<table id="datatable" data-ajax="/podle-zdroje-financi/<?= $zdroj->financniZdrojKod ?>/complete/ajax">
    <thead>
    <tr>
        <th data-type="html">Příjemce Pomoci</th>
        <th data-type="html">Dotace (kod nebo identifikator projektu)</th>
        <th data-type="currency">Částka Rozhodnutá</th>
        <th data-type="currency">Částka Spotřebovaná</th>
        <th data-type="number">Rok</th>
        <th data-type="string">Členění finančních prostředků</th>
        <th data-type="string">Finanční Zdroj</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <th>Příjemce Pomoci</th>
        <th>Dotace (kod nebo identifikator projektu)</th>
        <th>Částka Rozhodnutá</th>
        <th>Částka Spotřebovaná</th>
        <th>Rok</th>
        <th>Členění finančních prostředků</th>
        <th>Finanční Zdroj</th>
    </tr>
    </tfoot>
</table>