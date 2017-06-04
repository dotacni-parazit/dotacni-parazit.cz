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
                ['action' => 'delete', $ciselnikCedrPodOpatreniv01->idPodOpatreni],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrPodOpatreniv01->idPodOpatreni)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Cedr Pod Opatreniv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikCedrPodOpatreniv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikCedrPodOpatreniv01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Cedr Pod Opatreniv01') ?></legend>
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
