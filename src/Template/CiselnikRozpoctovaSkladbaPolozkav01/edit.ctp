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
                ['action' => 'delete', $ciselnikRozpoctovaSkladbaPolozkav01->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikRozpoctovaSkladbaPolozkav01->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ciselnik Rozpoctova Skladba Polozkav01'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ciselnikRozpoctovaSkladbaPolozkav01 form large-9 medium-8 columns content">
    <?= $this->Form->create($ciselnikRozpoctovaSkladbaPolozkav01) ?>
    <fieldset>
        <legend><?= __('Edit Ciselnik Rozpoctova Skladba Polozkav01') ?></legend>
        <?php
            echo $this->Form->control('rozpoctovaSkladbaPolozkaKod');
            echo $this->Form->control('rozpoctovaSkladbaPolozkaNazev');
            echo $this->Form->control('zaznamPlatnostOdDatum');
            echo $this->Form->control('zaznamPlatnostDoDatum');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
