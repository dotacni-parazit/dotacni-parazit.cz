<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prijemce Pomoci'), ['action' => 'edit', $prijemcePomoci->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prijemce Pomoci'), ['action' => 'delete', $prijemcePomoci->id], ['confirm' => __('Are you sure you want to delete # {0}?', $prijemcePomoci->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prijemce Pomoci'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prijemce Pomoci'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prijemcePomoci view large-9 medium-8 columns content">
    <h3><?= h($prijemcePomoci->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('About') ?></th>
            <td><?= h($prijemcePomoci->about) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('JePrislusnikStatu') ?></th>
            <td><?= h($prijemcePomoci->jePrislusnikStatu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('JeRegistrovanSPravniFormou') ?></th>
            <td><?= h($prijemcePomoci->jeRegistrovanSPravniFormou) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ObdrzelDotaci') ?></th>
            <td><?= h($prijemcePomoci->obdrzelDotaci) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SidliNaAdrese') ?></th>
            <td><?= h($prijemcePomoci->sidliNaAdrese) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamIdentifikator') ?></th>
            <td><?= h($prijemcePomoci->zaznamIdentifikator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ObchodniJmeno') ?></th>
            <td><?= h($prijemcePomoci->obchodniJmeno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LegalName') ?></th>
            <td><?= h($prijemcePomoci->legalName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MaTrvaleBydlisteNaAdrese') ?></th>
            <td><?= h($prijemcePomoci->maTrvaleBydlisteNaAdrese) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Jmeno') ?></th>
            <td><?= h($prijemcePomoci->jmeno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prijmeni') ?></th>
            <td><?= h($prijemcePomoci->prijmeni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FirstName') ?></th>
            <td><?= h($prijemcePomoci->firstName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastName') ?></th>
            <td><?= h($prijemcePomoci->lastName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dic') ?></th>
            <td><?= h($prijemcePomoci->dic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prijemcePomoci->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ico') ?></th>
            <td><?= $this->Number->format($prijemcePomoci->ico) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NarozeniRok') ?></th>
            <td><?= $this->Number->format($prijemcePomoci->narozeniRok) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamAktualizaceDatumCas') ?></th>
            <td><?= h($prijemcePomoci->zaznamAktualizaceDatumCas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDatum') ?></th>
            <td><?= h($prijemcePomoci->zaznamPlatnostDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($prijemcePomoci->modified) ?></td>
        </tr>
    </table>
</div>
