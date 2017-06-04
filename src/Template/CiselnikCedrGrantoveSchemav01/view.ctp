<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Cedr Grantove Schemav01'), ['action' => 'edit', $ciselnikCedrGrantoveSchemav01->idGrantoveSchema]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Cedr Grantove Schemav01'), ['action' => 'delete', $ciselnikCedrGrantoveSchemav01->idGrantoveSchema], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrGrantoveSchemav01->idGrantoveSchema)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Cedr Grantove Schemav01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Cedr Grantove Schemav01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikCedrGrantoveSchemav01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikCedrGrantoveSchemav01->idGrantoveSchema) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdGrantoveSchema') ?></th>
            <td><?= h($ciselnikCedrGrantoveSchemav01->idGrantoveSchema) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GrantoveSchemaKod') ?></th>
            <td><?= h($ciselnikCedrGrantoveSchemav01->grantoveSchemaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GrantoveSchemaNazev') ?></th>
            <td><?= h($ciselnikCedrGrantoveSchemav01->grantoveSchemaNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('GrantoveSchemaCislo') ?></th>
            <td><?= $this->Number->format($ciselnikCedrGrantoveSchemav01->grantoveSchemaCislo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikCedrGrantoveSchemav01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikCedrGrantoveSchemav01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
