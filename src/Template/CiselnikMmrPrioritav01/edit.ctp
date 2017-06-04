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
                ['action' => 'delete', $ciselnikMmrPrioritav01->idPriorita],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrPrioritav01->idPriorita)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Mmr Prioritav01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikMmrPrioritav01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikMmrPrioritav01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Mmr Prioritav01') ?></legend>
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
