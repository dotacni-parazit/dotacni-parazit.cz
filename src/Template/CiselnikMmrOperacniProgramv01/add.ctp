<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Mmr Operacni Programv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikMmrOperacniProgramv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikMmrOperacniProgramv01) ?>
    <fieldset>
        <legend><?= __('Add Ciselnik Mmr Operacni Programv01') ?></legend>
        <?php
            echo $this->Form->control('operacaniProgramKod');
            echo $this->Form->control('operacaniProgramNazev');
            echo $this->Form->control('operacaniProgramCislo', ['empty' => true]);
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
