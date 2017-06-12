<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rozhodnuti Smlouva'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rozhodnutiSmlouva form large-9 medium-8 columns content">
    <?= $this->Form->create($rozhodnutiSmlouva) ?>
    <fieldset>
        <legend><?= __('Add Rozhodnuti Smlouva') ?></legend>
        <?php
            echo $this->Form->control('idRozhodnuti');
            echo $this->Form->control('cisloJednaciRozhodnuti');
            echo $this->Form->control('dokumentDruhKod');
            echo $this->Form->control('rozhodnutiDatum');
            echo $this->Form->control('dtAktualizace');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
