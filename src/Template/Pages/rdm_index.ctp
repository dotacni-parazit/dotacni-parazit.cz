<?php
/**
 * @var AppView $this
 * @var RDM[] $all
 */

use App\Model\Entity\RDM;
use App\View\AppView;
use App\View\DPUTILS;

?>
<table class="datatable">
    <thead>
    <tr>
        <th>Období</th>
        <th>IČ příjemce (PO)</th>
        <th>Kód příjemce (FO)</th>
        <th>IČ poskytovatele</th>
        <th>Částka poskytnuta</th>
        <th>Účel (popis projektu, identifikátor dle EDS/SMVS)</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($all as $rdm) { ?>
        <tr>
            <td><?= $rdm->in_year ?></td>
            <td><?= $rdm->ico_prijemce_num ?></td>
            <td><?= $rdm->kod_prijemce_num ?></td>
            <td><?= $rdm->ico_poskytovatele ?></td>
            <td><?= DPUTILS::currency($rdm->castka_kc) ?></td>
            <td><?= $rdm->ucel ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <td>Období</td>
        <td>IČ příjemce (PO)</td>
        <td>Kód příjemce (FO)</td>
        <td>IČ poskytovatele</td>
        <td>Částka poskytnuta</td>
        <td>Účel (popis projektu, identifikátor dle EDS/SMVS)</td>
    </tr>
    </tfoot>
</table>
