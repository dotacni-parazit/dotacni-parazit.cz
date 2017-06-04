<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Dotace'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dotace form large-9 medium-8 columns content">
    <?= $this->Form->create($dotace) ?>
    <fieldset>
        <legend><?= __('Add Dotace') ?></legend>
        <?php
            echo $this->Form->control('about');
            echo $this->Form->control('byloRozhodnuto');
            echo $this->Form->control('podaniDatum', ['empty' => true]);
            echo $this->Form->control('projektKod');
            echo $this->Form->control('smlouvaPodpisDatum', ['empty' => true]);
            echo $this->Form->control('zaznamAktualizaceDatumCas', ['empty' => true]);
            echo $this->Form->control('zaznamIdentifikator');
            echo $this->Form->control('zaznamPlatnostDatum', ['empty' => true]);
            echo $this->Form->control('zmenaSmlouvaIdikator');
            echo $this->Form->control('projektIdentifikator');
            echo $this->Form->control('title');
            echo $this->Form->control('podprogram');
            echo $this->Form->control('operacniProgramCEDR');
            echo $this->Form->control('subjektRozliseniKod');
            echo $this->Form->control('operacniProgramMMR');
            echo $this->Form->control('prioritaMMR');
            echo $this->Form->control('opatreniMMR');
            echo $this->Form->control('podOpatreni');
            echo $this->Form->control('grantoveSchemaMMR');
            echo $this->Form->control('ukonceniSkutecneDatum', ['empty' => true]);
            echo $this->Form->control('zahajeniSkutecneDatum', ['empty' => true]);
            echo $this->Form->control('ukonceniPlanovaneDatum', ['empty' => true]);
            echo $this->Form->control('clenenNaEtapu');
            echo $this->Form->control('realizovanNaUzemi');
            echo $this->Form->control('prioritaCEDR');
            echo $this->Form->control('projektNadrizenyIdentifikator');
            echo $this->Form->control('podOpatreniCEDR');
            echo $this->Form->control('opatreniCEDR');
            echo $this->Form->control('poznamkaCEDR');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
