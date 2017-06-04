<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Mestsky Obvod Mestska Castv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikMestskyObvodMestskaCastv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikMestskyObvodMestskaCastv01) ?>
    <fieldset>
        <legend><?= __('Add Ciselnik Mestsky Obvod Mestska Castv01') ?></legend>
        <?php
            echo $this->Form->control('mestskyObvodMestskaCastKod');
            echo $this->Form->control('mestskyObvodMestskaCastNazev');
            echo $this->Form->control('obecNad');
            echo $this->Form->control('pad2');
            echo $this->Form->control('pad3');
            echo $this->Form->control('pad4');
            echo $this->Form->control('pad5');
            echo $this->Form->control('pad6');
            echo $this->Form->control('pad7');
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
