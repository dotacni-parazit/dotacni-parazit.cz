<?php


$this->set('title', 'Fyzické osoby - Přijemci Dotací')
?>
<h2>Všechny Fyzické osoby evidované v CEDR-III jako Příjemci dotací</h2>
<table id="datatable" style="width: 100%;" data-ajax="/fyzicke-osoby/ajax">
    <thead>
    <tr>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th data-type="number" class="medium-1 large-1">Rok narození</th>
        <th>Bydliště</th>
        <th>Státní příslušnost</th>
        <th data-type="currency" class="medium-1 large-1">Částka rozhodnutá</th>
        <th data-type="currency" class="medium-1 large-1">Částka spotřebovaná</th>
        <th data-type="html" class="medium-1 large-1">Otevřít</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th data-type="number" class="medium-1 large-1">Rok narození</th>
        <th>Bydliště</th>
        <th>Státní příslušnost</th>
        <th data-type="currency" class="medium-1 large-1">Částka rozhodnutá</th>
        <th data-type="currency" class="medium-1 large-1">Částka spotřebovaná</th>
        <th data-type="html" class="medium-1 large-1">Otevřít</th>
    </tr>
    </tfoot>
</table>