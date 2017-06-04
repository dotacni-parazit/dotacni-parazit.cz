<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Mmr Grantove Schemav01'), ['action' => 'edit', $ciselnikMmrGrantoveSchemav01->idGrantoveSchema]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Mmr Grantove Schemav01'), ['action' => 'delete', $ciselnikMmrGrantoveSchemav01->idGrantoveSchema], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrGrantoveSchemav01->idGrantoveSchema)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Mmr Grantove Schemav01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Mmr Grantove Schemav01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikMmrGrantoveSchemav01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikMmrGrantoveSchemav01->idGrantoveSchema) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdGrantoveSchema') ?></th>
            <td><?= h($ciselnikMmrGrantoveSchemav01->idGrantoveSchema) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GrantoveSchemaKod') ?></th>
            <td><?= h($ciselnikMmrGrantoveSchemav01->grantoveSchemaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GrantoveSchemaNazev') ?></th>
            <td><?= h($ciselnikMmrGrantoveSchemav01->grantoveSchemaNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikMmrGrantoveSchemav01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikMmrGrantoveSchemav01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GrantoveSchemaCislo') ?></th>
            <td><?= $ciselnikMmrGrantoveSchemav01->grantoveSchemaCislo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
