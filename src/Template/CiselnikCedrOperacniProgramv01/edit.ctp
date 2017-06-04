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
                ['action' => 'delete', $ciselnikCedrOperacniProgramv01->idOperacniProgram],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrOperacniProgramv01->idOperacniProgram)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Cedr Operacni Programv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikCedrOperacniProgramv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikCedrOperacniProgramv01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Cedr Operacni Programv01') ?></legend>
        <?php
            echo $this->Form->control('operacaniProgramKod');
            echo $this->Form->control('operacaniProgramNazev');
            echo $this->Form->control('operacaniProgramCislo');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
