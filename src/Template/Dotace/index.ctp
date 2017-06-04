<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="dotace content">
    <h3><?= __('Dotace') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('about') ?></th>
                <th scope="col"><?= $this->Paginator->sort('byloRozhodnuto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('podaniDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projektKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('smlouvaPodpisDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projektIdentifikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('podprogram') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operacniProgramCEDR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subjektRozliseniKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('operacniProgramMMR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prioritaMMR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opatreniMMR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('podOpatreni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grantoveSchemaMMR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ukonceniSkutecneDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zahajeniSkutecneDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ukonceniPlanovaneDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clenenNaEtapu') ?></th>
                <th scope="col"><?= $this->Paginator->sort('realizovanNaUzemi') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prioritaCEDR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('projektNadrizenyIdentifikator') ?></th>
                <th scope="col"><?= $this->Paginator->sort('podOpatreniCEDR') ?></th>
                <th scope="col"><?= $this->Paginator->sort('opatreniCEDR') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dotace as $dotace): ?>
            <tr>
                <td><?= h($dotace->id) ?></td>
                <td><?= h($dotace->about) ?></td>
                <td><?= h($dotace->byloRozhodnuto) ?></td>
                <td><?= h($dotace->podaniDatum) ?></td>
                <td><?= h($dotace->projektKod) ?></td>
                <td><?= h($dotace->smlouvaPodpisDatum) ?></td>
                <td><?= h($dotace->projektIdentifikator) ?></td>
                <td><?= h($dotace->title) ?></td>
                <td><?= h($dotace->podprogram) ?></td>
                <td><?= h($dotace->operacniProgramCEDR) ?></td>
                <td><?= h($dotace->subjektRozliseniKod) ?></td>
                <td><?= h($dotace->operacniProgramMMR) ?></td>
                <td><?= h($dotace->prioritaMMR) ?></td>
                <td><?= h($dotace->opatreniMMR) ?></td>
                <td><?= h($dotace->podOpatreni) ?></td>
                <td><?= h($dotace->grantoveSchemaMMR) ?></td>
                <td><?= h($dotace->ukonceniSkutecneDatum) ?></td>
                <td><?= h($dotace->zahajeniSkutecneDatum) ?></td>
                <td><?= h($dotace->ukonceniPlanovaneDatum) ?></td>
                <td><?= h($dotace->clenenNaEtapu) ?></td>
                <td><?= h($dotace->realizovanNaUzemi) ?></td>
                <td><?= h($dotace->prioritaCEDR) ?></td>
                <td><?= h($dotace->projektNadrizenyIdentifikator) ?></td>
                <td><?= h($dotace->podOpatreniCEDR) ?></td>
                <td><?= h($dotace->opatreniCEDR) ?></td>
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
