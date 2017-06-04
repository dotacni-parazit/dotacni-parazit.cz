<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ciselnik Dotace Titul V01'), ['action' => 'edit', $ciselnikDotaceTitulV01->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ciselnik Dotace Titul V01'), ['action' => 'delete', $ciselnikDotaceTitulV01->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciselnikDotaceTitulV01->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ciselnik Dotace Titul V01'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ciselnik Dotace Titul V01'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ciselnikDotaceTitulV01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikDotaceTitulV01->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('About') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->about) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulCiselnikAxisDotaceTitulKod') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->dotaceTitulCiselnikAxisDotaceTitulKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulNazevZkraceny') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->dotaceTitulNazevZkraceny) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetKapitolaCiselnikAxisKapitolaKod') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->statniRozpocetKapitolaCiselnikAxisKapitolaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulKod') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->dotaceTitulKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulNazev') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->dotaceTitulNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulVlastniKod') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->dotaceTitulVlastniKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PrefLabel') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->prefLabel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ciselnikDotaceTitulV01->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetKapitolaKod') ?></th>
            <td><?= $this->Number->format($ciselnikDotaceTitulV01->statniRozpocetKapitolaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->zaznamPlatnostDoDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ciselnikDotaceTitulV01->modified) ?></td>
        </tr>
    </table>
</div>
