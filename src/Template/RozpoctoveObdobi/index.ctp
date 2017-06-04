<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rozpoctove Obdobi'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rozpoctoveObdobi index large-9 medium-8 columns content">
    <h3><?= __('Rozpoctove Obdobi') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idObdobi') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idRozhodnuti') ?></th>
                <th scope="col"><?= $this->Paginator->sort('castkaCerpana') ?></th>
                <th scope="col"><?= $this->Paginator->sort('castkaUvolnena') ?></th>
                <th scope="col"><?= $this->Paginator->sort('castkaVracena') ?></th>
                <th scope="col"><?= $this->Paginator->sort('castkaSpotrebovana') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rozpoctoveObdobi') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vyporadaniKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriDotacniTitul') ?></th>
                <th scope="col"><?= $this->Paginator->sort('iriUcelovyZnak') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dPlatnost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dtAktualizace') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rozpoctoveObdobi as $rozpoctoveObdobi): ?>
            <tr>
                <td><?= h($rozpoctoveObdobi->idObdobi) ?></td>
                <td><?= h($rozpoctoveObdobi->idRozhodnuti) ?></td>
                <td><?= $this->Number->format($rozpoctoveObdobi->castkaCerpana) ?></td>
                <td><?= $this->Number->format($rozpoctoveObdobi->castkaUvolnena) ?></td>
                <td><?= $this->Number->format($rozpoctoveObdobi->castkaVracena) ?></td>
                <td><?= $this->Number->format($rozpoctoveObdobi->castkaSpotrebovana) ?></td>
                <td><?= $this->Number->format($rozpoctoveObdobi->rozpoctoveObdobi) ?></td>
                <td><?= h($rozpoctoveObdobi->vyporadaniKod) ?></td>
                <td><?= h($rozpoctoveObdobi->iriDotacniTitul) ?></td>
                <td><?= h($rozpoctoveObdobi->iriUcelovyZnak) ?></td>
                <td><?= h($rozpoctoveObdobi->dPlatnost) ?></td>
                <td><?= h($rozpoctoveObdobi->dtAktualizace) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rozpoctoveObdobi->idObdobi]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rozpoctoveObdobi->idObdobi]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rozpoctoveObdobi->idObdobi], ['confirm' => __('Are you sure you want to delete # {0}?', $rozpoctoveObdobi->idObdobi)]) ?>
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
