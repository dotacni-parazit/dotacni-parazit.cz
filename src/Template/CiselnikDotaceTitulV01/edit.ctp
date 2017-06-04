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
                ['action' => 'delete', $ciselnikDotaceTitulV01->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikDotaceTitulV01->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Titul V01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikDotaceTitulV01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikDotaceTitulV01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Dotace Titul V01') ?></legend>
        <?php
            echo $this->Form->control('about');
            echo $this->Form->control('dotaceTitulCiselnikAxisDotaceTitulKod');
            echo $this->Form->control('dotaceTitulNazevZkraceny');
            echo $this->Form->control('statniRozpocetKapitolaCiselnikAxisKapitolaKod');
            echo $this->Form->control('zaznamPlatnostDoDatum');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('dotaceTitulKod');
            echo $this->Form->control('dotaceTitulNazev');
            echo $this->Form->control('dotaceTitulVlastniKod');
            echo $this->Form->control('statniRozpocetKapitolaKod');
            echo $this->Form->control('title');
            echo $this->Form->control('prefLabel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
