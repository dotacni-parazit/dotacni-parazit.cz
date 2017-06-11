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
                ['action' => 'delete', $rozhodnuti->idRozhodnuti],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rozhodnuti->idRozhodnuti)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rozhodnuti'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Poskytovatelv01'), ['controller' => 'CiselnikDotacePoskytovatelv01', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Dotace Poskytovatelv01'), ['controller' => 'CiselnikDotacePoskytovatelv01', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Prostredek Cleneniv01'), ['controller' => 'CiselnikFinancniProstredekCleneniv01', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Financni Prostredek Cleneniv01'), ['controller' => 'CiselnikFinancniProstredekCleneniv01', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Financni Zdrojv01'), ['controller' => 'CiselnikFinancniZdrojv01', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ciselnik Financni Zdrojv01'), ['controller' => 'CiselnikFinancniZdrojv01', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rozhodnuti form large-9 medium-8 columns content">
    <?= $this->Form->create($rozhodnuti) ?>
    <fieldset>
        <legend><?= __('Edit Rozhodnuti') ?></legend>
        <?php
            echo $this->Form->control('idDotace');
            echo $this->Form->control('castkaPozadovana');
            echo $this->Form->control('castkaRozhodnuta');
            echo $this->Form->control('iriPoskytovatelDotace', ['options' => $ciselnikDotacePoskytovatelv01]);
            echo $this->Form->control('iriCleneniFinancnichProstredku', ['options' => $ciselnikFinancniProstredekCleneniv01]);
            echo $this->Form->control('iriFinancniZdroj', ['options' => $ciselnikFinancniZdrojv01]);
            echo $this->Form->control('rokRozhodnuti');
            echo $this->Form->control('investiceIndikator');
            echo $this->Form->control('navratnostIndikator');
            echo $this->Form->control('dPlatnost');
            echo $this->Form->control('dtAktualizace');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
