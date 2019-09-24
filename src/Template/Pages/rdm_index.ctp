<?php
/**
 * @var AppView $this
 * @var RDM[] $all
 */

use App\Model\Entity\RDM;
use App\View\AppView;

?>
<table class="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>">
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
