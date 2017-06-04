<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Zdrojv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikFinancniZdrojv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikFinancniZdrojv01) ?>
    <fieldset>
        <legend><?= __('Add Ciselnik Financni Zdrojv01') ?></legend>
        <?php
            echo $this->Form->control('financniZdrojKod');
            echo $this->Form->control('financniZdrojNadrizenyKod');
            echo $this->Form->control('financniZdrojNazev');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
