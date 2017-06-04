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
                ['action' => 'delete', $ciselnikStatniRozpocetUkazatelv01->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikStatniRozpocetUkazatelv01->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Statni Rozpocet Ukazatelv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikStatniRozpocetUkazatelv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikStatniRozpocetUkazatelv01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Statni Rozpocet Ukazatelv01') ?></legend>
        <?php
            echo $this->Form->control('idStatniRozpocetKapitola');
            echo $this->Form->control('statniRozpocetUkazatelKod');
            echo $this->Form->control('statniRozpocetKapitolaKod');
            echo $this->Form->control('statniRozpocetUkazatelNadrizenyKod');
            echo $this->Form->control('statniRozpocetUkazatelNazev');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
