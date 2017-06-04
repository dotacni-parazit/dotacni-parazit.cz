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
                ['action' => 'delete', $ciselnikMmrPodOpatreniv01->idPodOpatreni],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikMmrPodOpatreniv01->idPodOpatreni)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Mmr Pod Opatreniv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikMmrPodOpatreniv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikMmrPodOpatreniv01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Mmr Pod Opatreniv01') ?></legend>
        <?php
            echo $this->Form->control('idOpatreni');
            echo $this->Form->control('podOpatreniKod');
            echo $this->Form->control('podOpatreniNazev');
            echo $this->Form->control('podOpatreniCislo');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
