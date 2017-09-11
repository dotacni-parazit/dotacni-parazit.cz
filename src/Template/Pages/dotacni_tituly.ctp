<?php
$this->set('title', 'Dotační tituly podle kapitoly státního rozpočtu');
?>

<table id="datatable" data-ajax="<?= $this->request->here(false) ?>">
    <thead>
    <tr>
        <th data-type="html">Kapitola Státního Rozpočtu</th>
        <th data-type="number" class="large-1 medium-1">Kód Kapitoly</th>
        <th data-type="html">Dotační Titul</th>
        <th data-type="number" class="large-1 medium-1">Kód Titulu</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <td>Kapitola Státního Rozpočtu</td>
        <td>Kód Kapitoly</td>
        <td>Dotační Titul</td>
        <td>Kód Titulu</td>
    </tr>
    </tfoot>
</table>