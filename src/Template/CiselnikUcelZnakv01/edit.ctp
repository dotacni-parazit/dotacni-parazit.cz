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
                ['action' => 'delete', $ciselnikUcelZnakv01->idUcelZnak],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikUcelZnakv01->idUcelZnak)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Ucel Znakv01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikUcelZnakv01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikUcelZnakv01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Ucel Znakv01') ?></legend>
        <?php
            echo $this->Form->control('ucelZnakKod');
            echo $this->Form->control('statniRozpocetKapitolaKod');
            echo $this->Form->control('ucelZnakNazev');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
