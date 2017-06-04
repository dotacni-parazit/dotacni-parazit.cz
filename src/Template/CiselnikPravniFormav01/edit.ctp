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
                ['action' => 'delete', $ciselnikPravniFormav01->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikPravniFormav01->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Pravni Formav01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikPravniFormav01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikPravniFormav01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Pravni Formav01') ?></legend>
        <?php
            echo $this->Form->control('pravniFormaKod');
            echo $this->Form->control('pravniFormaNazev');
            echo $this->Form->control('pravniFormaNazevZkraceny');
            echo $this->Form->control('pravniFormaTypKod');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
