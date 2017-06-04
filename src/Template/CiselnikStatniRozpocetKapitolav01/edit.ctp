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
                ['action' => 'delete', $ciselnikStatniRozpocetKapitolav01->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikStatniRozpocetKapitolav01->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Statni Rozpocet Kapitolav01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikStatniRozpocetKapitolav01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikStatniRozpocetKapitolav01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Statni Rozpocet Kapitolav01') ?></legend>
        <?php
            echo $this->Form->control('statniRozpocetKapitolaKod');
            echo $this->Form->control('statniRozpocetKapitolaNazev');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
