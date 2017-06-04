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
                ['action' => 'delete', $ciselnikDotaceTitulv01->idDotaceTitul],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikDotaceTitulv01->idDotaceTitul)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Titulv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikDotaceTitulv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikDotaceTitulv01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Dotace Titulv01') ?></legend>
        <?php
            echo $this->Form->control('dotaceTitulKod');
            echo $this->Form->control('dotaceTitulVlastniKod');
            echo $this->Form->control('statniRozpocetKapitolaKod');
            echo $this->Form->control('dotaceTitulNazev');
            echo $this->Form->control('dotaceTitulNazevZkraceny');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
