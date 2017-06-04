<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ciselnikFinancniProstredekCleneniv01->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikFinancniProstredekCleneniv01->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Prostredek Cleneniv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikFinancniProstredekCleneniv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikFinancniProstredekCleneniv01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Financni Prostredek Cleneniv01') ?></legend>
        <?php
            echo $this->Form->control('financniProstredekCleneniKod');
            echo $this->Form->control('financniProstredekCleneniNazev');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
