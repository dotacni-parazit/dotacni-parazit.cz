<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Okresv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikOkresv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikOkresv01) ?>
    <fieldset>
        <legend><?= __('Add Ciselnik Okresv01') ?></legend>
        <?php
            echo $this->Form->control('okresKod');
            echo $this->Form->control('okresNazev');
            echo $this->Form->control('okresNutsKod');
            echo $this->Form->control('krajNad');
            echo $this->Form->control('vuscNad');
            echo $this->Form->control('globalniNavrhZmenaIdentifikator');
            echo $this->Form->control('nespravnostIndikator');
            echo $this->Form->control('transakceIdentifikator');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
