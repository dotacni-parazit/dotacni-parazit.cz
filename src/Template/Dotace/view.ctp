<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dotace'), ['action' => 'edit', $dotace->idDotace]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dotace'), ['action' => 'delete', $dotace->idDotace], ['confirm' => __('Are you sure you want to delete # {0}?', $dotace->idDotace)]) ?> </li>
        <li><?= $this->Html->link(__('List Dotace'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dotace'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dotace view large-9 medium-8 columns content">
    <h3><?= h($dotace->idDotace) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdDotace') ?></th>
            <td><?= h($dotace->idDotace) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdPrijemce') ?></th>
            <td><?= h($dotace->idPrijemce) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjektKod') ?></th>
            <td><?= h($dotace->projektKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjektIdnetifikator') ?></th>
            <td><?= h($dotace->projektIdnetifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjektNazev') ?></th>
            <td><?= h($dotace->projektNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriOperacniProgram') ?></th>
            <td><?= h($dotace->iriOperacniProgram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriPodprogram') ?></th>
            <td><?= h($dotace->iriPodprogram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriPriorita') ?></th>
            <td><?= h($dotace->iriPriorita) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriOpatreni') ?></th>
            <td><?= h($dotace->iriOpatreni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriPodopatreni') ?></th>
            <td><?= h($dotace->iriPodopatreni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriGrantoveSchema') ?></th>
            <td><?= h($dotace->iriGrantoveSchema) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SubjektRozliseniKod') ?></th>
            <td><?= $this->Number->format($dotace->subjektRozliseniKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PodpisDatum') ?></th>
            <td><?= h($dotace->podpisDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UkonceniPlanovaneDatum') ?></th>
            <td><?= h($dotace->ukonceniPlanovaneDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UkonceniSkutecneDatum') ?></th>
            <td><?= h($dotace->ukonceniSkutecneDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZahajeniPlanovaneDatum') ?></th>
            <td><?= h($dotace->zahajeniPlanovaneDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZahajeniSkutecneDatum') ?></th>
            <td><?= h($dotace->zahajeniSkutecneDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DPlatnost') ?></th>
            <td><?= h($dotace->dPlatnost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DtAktualizace') ?></th>
            <td><?= h($dotace->dtAktualizace) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZmenaSmlouvyIndikator') ?></th>
            <td><?= $dotace->zmenaSmlouvyIndikator ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriProgramPodpora') ?></th>
            <td><?= $dotace->iriProgramPodpora ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriTypCinnosti') ?></th>
            <td><?= $dotace->iriTypCinnosti ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IriProgram') ?></th>
            <td><?= $dotace->iriProgram ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
