<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rozpoctove Obdobi'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rozpoctoveObdobi form large-9 medium-8 columns content">
    <?= $this->Form->create($rozpoctoveObdobi) ?>
    <fieldset>
        <legend><?= __('Add Rozpoctove Obdobi') ?></legend>
        <?php
            echo $this->Form->control('idRozhodnuti');
            echo $this->Form->control('castkaCerpana');
            echo $this->Form->control('castkaUvolnena');
            echo $this->Form->control('castkaVracena');
            echo $this->Form->control('castkaSpotrebovana');
            echo $this->Form->control('rozpoctoveObdobi');
            echo $this->Form->control('vyporadaniKod');
            echo $this->Form->control('iriDotacniTitul');
            echo $this->Form->control('iriUcelovyZnak');
            echo $this->Form->control('dPlatnost');
            echo $this->Form->control('dtAktualizace');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
