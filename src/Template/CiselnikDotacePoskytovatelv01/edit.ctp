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
                ['action' => 'delete', $ciselnikDotacePoskytovatelv01->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikDotacePoskytovatelv01->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Poskytovatelv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikDotacePoskytovatelv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikDotacePoskytovatelv01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Dotace Poskytovatelv01') ?></legend>
        <?php
            echo $this->Form->control('dotacePoskytovatelKod');
            echo $this->Form->control('dotacePoskytovatelNazev');
            echo $this->Form->control('dotacePoskytovatelNadrizenyKod');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
