<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cache'), ['action' => 'edit', $cache->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cache'), ['action' => 'delete', $cache->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cache->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cache'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cache'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cache view large-9 medium-8 columns content">
    <h3><?= h($cache->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Identifier') ?></th>
            <td><?= h($cache->identifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= h($cache->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cache->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cache->modified) ?></td>
        </tr>
    </table>
</div>
