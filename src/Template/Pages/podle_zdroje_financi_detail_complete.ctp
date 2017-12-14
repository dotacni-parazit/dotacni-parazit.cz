<?php


$this->set('title', $zdroj->financniZdrojNazev);
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
        <td>Příjemce Pomoci</td>
        <td>Dotace (kod nebo identifikator projektu)</td>
        <td>Částka Rozhodnutá</td>
        <td>Částka Spotřebovaná</td>
        <td>Rok</td>
        <td>Členění finančních prostředků</td>
        <td>Finanční Zdroj</td>
    </tr>
    </tfoot>
</table>