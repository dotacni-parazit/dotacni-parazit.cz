<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Poskytovatel V01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikDotacePoskytovatelV01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikDotacePoskytovatelV01) ?>
    <fieldset>
        <legend><?= __('Add Ciselnik Dotace Poskytovatel V01') ?></legend>
        <?php
            echo $this->Form->control('about');
            echo $this->Form->control('dotacePoskytovatelCiselnikAxisDotacePoskytovatelKod');
            echo $this->Form->control('zaznamPlatnostDoDatum', ['empty' => true]);
            echo $this->Form->control('zaznamPlatnostOdDatum', ['empty' => true]);
            echo $this->Form->control('dotacePoskytovatelKod');
            echo $this->Form->control('dotacePoskytovatelNazev');
            echo $this->Form->control('title');
            echo $this->Form->control('prefLabel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
