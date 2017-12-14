<?php

use Cake\I18n\Number;

$this->set('title', 'DotInfo.cz');
?>
<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th class="nosearch">
            Poskytovatel
        </th>
        <th class="nosearch">
            IČO
        </th>
        <th class="nosearch" data-type="currency">
            Součet schválených částek
        </th>
        <th class="nosearch">
            Počet rozhodnutí
        </th>
        <th class="nosearch">
            Otevřít
        </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($poskytovatele as $p) { ?>
        <tr>
            <td><?= $p['poskytovatelNazev'] ?></td>
            <td><?= \App\View\DPUTILS::ico($p['poskytovatelIco']) ?></td>
            <td><?= Number::currency($sums[$p['poskytovatelIco']]['sumSchvaleno']) ?></td>
            <td><?= $sums[$p['poskytovatelIco']]['count'] ?></td>
            <td><?= $this->Html->link('Detail Poskytovatele', '/dotinfo/poskytovatel/' . $p['poskytovatelIco']) ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>
            Poskytovatel
        </td>
        <td>
            IČO
        </td>
        <td>
            Součet schválených částek
        </td>
        <td>
            Počet rozhodnutí
        </td>
        <td>
            Otevřít
        </td>
    </tr>
    </tfoot>
</table>
