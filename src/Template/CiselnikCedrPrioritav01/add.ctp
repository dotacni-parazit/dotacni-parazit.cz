<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Cedr Prioritav01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikCedrPrioritav01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikCedrPrioritav01) ?>
    <fieldset>
        <legend><?= __('Add Ciselnik Cedr Prioritav01') ?></legend>
        <?php
            echo $this->Form->control('idOperacniProgram');
            echo $this->Form->control('idPodprogram');
            echo $this->Form->control('prioritaKod');
            echo $this->Form->control('prioritaNazev');
            echo $this->Form->control('prioritaCislo');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
