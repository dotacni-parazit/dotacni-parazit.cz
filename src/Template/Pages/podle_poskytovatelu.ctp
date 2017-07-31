<?php
use Cake\I18n\Number;

$this->set('title', 'Poskytovatelé dotací');
$this->Html->script('datatable.js', ['block' => true]);
?>
<table id="datatable" class="datatable_simple">
    <thead>
    <tr>
        <th>Poskytovatel</th>
        <th class="nosearch text-right" data-type="currency">Součet rozhodnutých částek</th>
        <th class="nosearch text-right" data-type="currency">Součet spotřebovaných částek</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $d) {
        ?>
        <tr>
            <td><?= $this->Html->link($d->dotacePoskytovatelNazev, '/podle-poskytovatelu/' . $d->dotacePoskytovatelKod) ?></td>
            <td style="text-align: right"><?= Number::currency($counts[$d->id]['soucet']) ?></td>
            <td style="text-align: right"><?= Number::currency($counts[$d->id]['soucetSpotrebovano']) ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Poskytovatel</td>
        <td class="text-right">Součet poskytnutých dotací</td>
        <td class="text-right">Součet spotřebovaných částek</td>
    </tr>
    </tfoot>
</table>