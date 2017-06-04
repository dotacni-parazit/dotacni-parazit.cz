<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Vuscv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikVuscv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikVuscv01) ?>
    <fieldset>
        <legend><?= __('Add Ciselnik Vuscv01') ?></legend>
        <?php
            echo $this->Form->control('vuscKod');
            echo $this->Form->control('krajNutsKod');
            echo $this->Form->control('vuscNazev');
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
