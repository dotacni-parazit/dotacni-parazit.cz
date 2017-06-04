<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dotace'), ['action' => 'edit', $dotace->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dotace'), ['action' => 'delete', $dotace->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dotace->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dotace'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dotace'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dotace view large-9 medium-8 columns content">
    <h3><?= h($dotace->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('About') ?></th>
            <td><?= h($dotace->about) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ByloRozhodnuto') ?></th>
            <td><?= h($dotace->byloRozhodnuto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjektKod') ?></th>
            <td><?= h($dotace->projektKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamIdentifikator') ?></th>
            <td><?= h($dotace->zaznamIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZmenaSmlouvaIdikator') ?></th>
            <td><?= h($dotace->zmenaSmlouvaIdikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjektIdentifikator') ?></th>
            <td><?= h($dotace->projektIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($dotace->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Podprogram') ?></th>
            <td><?= h($dotace->podprogram) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OperacniProgramCEDR') ?></th>
            <td><?= h($dotace->operacniProgramCEDR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OperacniProgramMMR') ?></th>
            <td><?= h($dotace->operacniProgramMMR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrioritaMMR') ?></th>
            <td><?= h($dotace->prioritaMMR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OpatreniMMR') ?></th>
            <td><?= h($dotace->opatreniMMR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PodOpatreni') ?></th>
            <td><?= h($dotace->podOpatreni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GrantoveSchemaMMR') ?></th>
            <td><?= h($dotace->grantoveSchemaMMR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ClenenNaEtapu') ?></th>
            <td><?= h($dotace->clenenNaEtapu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RealizovanNaUzemi') ?></th>
            <td><?= h($dotace->realizovanNaUzemi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrioritaCEDR') ?></th>
            <td><?= h($dotace->prioritaCEDR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ProjektNadrizenyIdentifikator') ?></th>
            <td><?= h($dotace->projektNadrizenyIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PodOpatreniCEDR') ?></th>
            <td><?= h($dotace->podOpatreniCEDR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('OpatreniCEDR') ?></th>
            <td><?= h($dotace->opatreniCEDR) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($dotace->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SubjektRozliseniKod') ?></th>
            <td><?= $this->Number->format($dotace->subjektRozliseniKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PodaniDatum') ?></th>
            <td><?= h($dotace->podaniDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SmlouvaPodpisDatum') ?></th>
            <td><?= h($dotace->smlouvaPodpisDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamAktualizaceDatumCas') ?></th>
            <td><?= h($dotace->zaznamAktualizaceDatumCas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDatum') ?></th>
            <td><?= h($dotace->zaznamPlatnostDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UkonceniSkutecneDatum') ?></th>
            <td><?= h($dotace->ukonceniSkutecneDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZahajeniSkutecneDatum') ?></th>
            <td><?= h($dotace->zahajeniSkutecneDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UkonceniPlanovaneDatum') ?></th>
            <td><?= h($dotace->ukonceniPlanovaneDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($dotace->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('PoznamkaCEDR') ?></h4>
        <?= $this->Text->autoParagraph(h($dotace->poznamkaCEDR)); ?>
    </div>
</div>
