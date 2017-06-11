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
                ['action' => 'delete', $cache->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cache->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cache'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cache form large-9 medium-8 columns content">
    <?= $this->Form->create($cache) ?>
    <fieldset>
        <legend><?= __('Edit Cache') ?></legend>
        <?php
            echo $this->Form->control('identifier');
            echo $this->Form->control('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
