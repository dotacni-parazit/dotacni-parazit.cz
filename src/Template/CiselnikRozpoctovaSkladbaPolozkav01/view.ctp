<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Rozpoctova Skladba Polozkav01'), ['action' => 'edit', $ciselnikRozpoctovaSkladbaPolozkav01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Rozpoctova Skladba Polozkav01'), ['action' => 'delete', $ciselnikRozpoctovaSkladbaPolozkav01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikRozpoctovaSkladbaPolozkav01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Rozpoctova Skladba Polozkav01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Rozpoctova Skladba Polozkav01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikRozpoctovaSkladbaPolozkav01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikRozpoctovaSkladbaPolozkav01->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($ciselnikRozpoctovaSkladbaPolozkav01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RozpoctovaSkladbaPolozkaNazev') ?></th>
            <td><?= h($ciselnikRozpoctovaSkladbaPolozkav01->rozpoctovaSkladbaPolozkaNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('RozpoctovaSkladbaPolozkaKod') ?></th>
            <td><?= $this->Number->format($ciselnikRozpoctovaSkladbaPolozkav01->rozpoctovaSkladbaPolozkaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikRozpoctovaSkladbaPolozkav01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikRozpoctovaSkladbaPolozkav01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
