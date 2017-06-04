<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dotace'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dotace index large-9 medium-8 columns content">
    <h3><?= __('Dotace') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idDotace') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idPrijemce') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projektKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('podpisDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjektRozliseniKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ukonceniPlanovaneDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ukonceniSkutecneDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zahajeniPlanovaneDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zahajeniSkutecneDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zmenaSmlouvyIndikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projektIdnetifikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projektNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriOperacniProgram') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriPodprogram') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriPriorita') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriOpatreni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriPodopatreni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriGrantoveSchema') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriProgramPodpora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriTypCinnosti') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriProgram') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dPlatnost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dtAktualizace') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dotace as $dotace): ?>
            <tr>
                <td><?= h($dotace->idDotace) ?></td>
                <td><?= h($dotace->idPrijemce) ?></td>
                <td><?= h($dotace->projektKod) ?></td>
                <td><?= h($dotace->podpisDatum) ?></td>
                <td><?= $this->Number->format($dotace->subjektRozliseniKod) ?></td>
                <td><?= h($dotace->ukonceniPlanovaneDatum) ?></td>
                <td><?= h($dotace->ukonceniSkutecneDatum) ?></td>
                <td><?= h($dotace->zahajeniPlanovaneDatum) ?></td>
                <td><?= h($dotace->zahajeniSkutecneDatum) ?></td>
                <td><?= h($dotace->zmenaSmlouvyIndikator) ?></td>
                <td><?= h($dotace->projektIdnetifikator) ?></td>
                <td><?= h($dotace->projektNazev) ?></td>
                <td><?= h($dotace->iriOperacniProgram) ?></td>
                <td><?= h($dotace->iriPodprogram) ?></td>
                <td><?= h($dotace->iriPriorita) ?></td>
                <td><?= h($dotace->iriOpatreni) ?></td>
                <td><?= h($dotace->iriPodopatreni) ?></td>
                <td><?= h($dotace->iriGrantoveSchema) ?></td>
                <td><?= h($dotace->iriProgramPodpora) ?></td>
                <td><?= h($dotace->iriTypCinnosti) ?></td>
                <td><?= h($dotace->iriProgram) ?></td>
                <td><?= h($dotace->dPlatnost) ?></td>
                <td><?= h($dotace->dtAktualizace) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dotace->idDotace]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dotace->idDotace]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dotace->idDotace], ['confirm' => __('Are you sure you want to delete # {0}?', $dotace->idDotace)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
