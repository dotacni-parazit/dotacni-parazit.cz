<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cache'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cache form large-9 medium-8 columns content">
    <?= $this->Form->create($cache) ?>
    <fieldset>
        <legend><?= __('Add Cache') ?></legend>
        <?php
            echo $this->Form->control('identifier');
            echo $this->Form->control('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
