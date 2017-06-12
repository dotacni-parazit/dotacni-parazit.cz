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
                ['action' => 'delete', $rozhodnutiSmlouva->idSmlouva],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rozhodnutiSmlouva->idSmlouva)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rozhodnuti Smlouva'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rozhodnutiSmlouva form large-9 medium-8 columns content">
    <?= $this->Form->create($rozhodnutiSmlouva) ?>
    <fieldset>
        <legend><?= __('Edit Rozhodnuti Smlouva') ?></legend>
        <?php
            echo $this->Form->control('idRozhodnuti');
            echo $this->Form->control('cisloJednaciRozhodnuti');
            echo $this->Form->control('dokumentDruhKod');
            echo $this->Form->control('rozhodnutiDatum');
            echo $this->Form->control('dtAktualizace');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
