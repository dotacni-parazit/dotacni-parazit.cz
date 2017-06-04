<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Statv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikStatv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikStatv01) ?>
    <fieldset>
        <legend><?= __('Add Ciselnik Statv01') ?></legend>
        <?php
            echo $this->Form->control('statKod3Znaky');
            echo $this->Form->control('statKod3Cisla');
            echo $this->Form->control('statKodOmezeny');
            echo $this->Form->control('statNazev');
            echo $this->Form->control('statNazevZkraceny');
            echo $this->Form->control('statNazevEn');
            echo $this->Form->control('statNazevZkracenyEn');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
