<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Programv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikProgramv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikProgramv01) ?>
    <fieldset>
        <legend><?= __('Add Ciselnik Programv01') ?></legend>
        <?php
            echo $this->Form->control('programKod');
            echo $this->Form->control('programNazev');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
