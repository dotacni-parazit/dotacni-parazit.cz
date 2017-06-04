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
                ['action' => 'delete', $ciselnikCedrOpatreniv01->idOpatreni],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikCedrOpatreniv01->idOpatreni)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Cedr Opatreniv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikCedrOpatreniv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikCedrOpatreniv01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Cedr Opatreniv01') ?></legend>
        <?php
            echo $this->Form->control('idPriorita');
            echo $this->Form->control('opatreniKod');
            echo $this->Form->control('opatreniNazev');
            echo $this->Form->control('opatreniCislo');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
