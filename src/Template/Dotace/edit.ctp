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
                ['action' => 'delete', $dotace->idDotace],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dotace->idDotace)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dotace'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="dotace form large-9 medium-8 columns content">
    <?= $this->Form->create($dotace) ?>
    <fieldset>
        <legend><?= __('Edit Dotace') ?></legend>
        <?php
            echo $this->Form->control('idPrijemce');
            echo $this->Form->control('projektKod');
            echo $this->Form->control('podpisDatum');
            echo $this->Form->control('subjektRozliseniKod');
            echo $this->Form->control('ukonceniPlanovaneDatum', ['empty' => true]);
            echo $this->Form->control('ukonceniSkutecneDatum', ['empty' => true]);
            echo $this->Form->control('zahajeniPlanovaneDatum', ['empty' => true]);
            echo $this->Form->control('zahajeniSkutecneDatum', ['empty' => true]);
            echo $this->Form->control('zmenaSmlouvyIndikator');
            echo $this->Form->control('projektIdnetifikator');
            echo $this->Form->control('projektNazev');
            echo $this->Form->control('iriOperacniProgram');
            echo $this->Form->control('iriPodprogram');
            echo $this->Form->control('iriPriorita');
            echo $this->Form->control('iriOpatreni');
            echo $this->Form->control('iriPodopatreni');
            echo $this->Form->control('iriGrantoveSchema');
            echo $this->Form->control('iriProgramPodpora');
            echo $this->Form->control('iriTypCinnosti');
            echo $this->Form->control('iriProgram');
            echo $this->Form->control('dPlatnost');
            echo $this->Form->control('dtAktualizace');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
