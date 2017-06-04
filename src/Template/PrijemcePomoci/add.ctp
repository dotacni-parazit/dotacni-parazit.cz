<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prijemce Pomoci'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="prijemcePomoci form large-9 medium-8 columns content">
    <?= $this->Form->create($prijemcePomoci) ?>
    <fieldset>
        <legend><?= __('Add Prijemce Pomoci') ?></legend>
        <?php
            echo $this->Form->control('about');
            echo $this->Form->control('jePrislusnikStatu');
            echo $this->Form->control('jeRegistrovanSPravniFormou');
            echo $this->Form->control('obdrzelDotaci');
            echo $this->Form->control('sidliNaAdrese');
            echo $this->Form->control('zaznamAktualizaceDatumCas', ['empty' => true]);
            echo $this->Form->control('zaznamIdentifikator');
            echo $this->Form->control('zaznamPlatnostDatum', ['empty' => true]);
            echo $this->Form->control('ico');
            echo $this->Form->control('obchodniJmeno');
            echo $this->Form->control('legalName');
            echo $this->Form->control('maTrvaleBydlisteNaAdrese');
            echo $this->Form->control('jmeno');
            echo $this->Form->control('prijmeni');
            echo $this->Form->control('narozeniRok');
            echo $this->Form->control('firstName');
            echo $this->Form->control('lastName');
            echo $this->Form->control('dic');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
