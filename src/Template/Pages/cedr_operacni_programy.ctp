<?php
/**
 * @var AppView $this
 */

use App\Model\Entity\CiselnikCedrOperacniProgramv01;
use App\View\AppView;
use App\View\DPUTILS;
use Cake\I18n\Number;

$this->set('title', 'CEDR III - Ostatní Programy');
?>
<table class="datatable">
    <thead>
    <tr>
        <th>Název</th>
        <th>Kód Programu</th>
        <th>Číslo Programu</th>
        <th>Počet evidovaných dotací</th>
        <th>Platnost Do</th>
        <th data-type="currency">Součet rozhodnutí Spotřebováno</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /** @var CiselnikCedrOperacniProgramv01[] $cedr */
    foreach ($cedr as $c) {
        ?>
        <tr>
            <td><?= $this->Html->link($c->operacaniProgramNazev, '/detail-cedr-operacni-program/?id=' . $c->idOperacniProgram) ?></td>
            <td><?= $c->operacaniProgramKod ?></td>
            <td><?= $c->operacaniProgramCislo ?></td>
            <td><?= $counts[$c->idOperacniProgram] ?></td>
            <td><?= $c->zaznamPlatnostDoDatum->year ?></td>
            <td><?= DPUTILS::currency(isset($sums[$c->idOperacniProgram]) ? $sums[$c->idOperacniProgram] : 0) ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>

    <tfoot>
    <tr>
        <td>Název</td>
        <td>Kód Programu</td>
        <td>Číslo Programu</td>
        <td>Počet evidovaných dotací</td>
        <td>Platnost Do</td>
        <td>Součet rozhodnutí Spotřebováno</td>
    </tr>
    </tfoot>
</table>
