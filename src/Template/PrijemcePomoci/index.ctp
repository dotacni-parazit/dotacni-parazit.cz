<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="prijemcePomoci">
    <h3><?= __('Prijemce Pomoci') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('about') ?></th>
            <th scope="col"><?= $this->Paginator->sort('jePrislusnikStatu') ?></th>
            <th scope="col"><?= $this->Paginator->sort('jeRegistrovanSPravniFormou') ?></th>
            <th scope="col"><?= $this->Paginator->sort('obdrzelDotaci') ?></th>
            <th scope="col"><?= $this->Paginator->sort('sidliNaAdrese') ?></th>
            <th scope="col"><?= $this->Paginator->sort('ico') ?></th>
            <th scope="col"><?= $this->Paginator->sort('obchodniJmeno') ?></th>
            <th scope="col"><?= $this->Paginator->sort('legalName') ?></th>
            <th scope="col"><?= $this->Paginator->sort('maTrvaleBydlisteNaAdrese') ?></th>
            <th scope="col"><?= $this->Paginator->sort('jmeno') ?></th>
            <th scope="col"><?= $this->Paginator->sort('prijmeni') ?></th>
            <th scope="col"><?= $this->Paginator->sort('narozeniRok') ?></th>
            <th scope="col"><?= $this->Paginator->sort('firstName') ?></th>
            <th scope="col"><?= $this->Paginator->sort('lastName') ?></th>
            <th scope="col"><?= $this->Paginator->sort('dic') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($prijemcePomoci as $prijemcePomoci): ?>
            <tr>
                <td><?= $this->Number->format($prijemcePomoci->id) ?></td>
                <td><?= h($prijemcePomoci->about) ?></td>
                <td><?= $this->Html->link(h($prijemcePomoci->ciselnik_stat_v01->statNazev), ['controller' => 'CiselnikStatV01', 'action' => 'view', $prijemcePomoci->ciselnik_stat_v01->id]) ?></td>
                <td><?= h($prijemcePomoci->ciselnik_pravni_forma_v01->pravniFormaNazev) ?></td>
                <td><?= $this->Html->link(h($prijemcePomoci->dotace->title) . " (" . h($prijemcePomoci->dotace->projektKod) . ')', ['controller' => 'Dotace', 'action' => 'view', $prijemcePomoci->dotace->id]) ?></td>
                <td><?= empty($prijemcePomoci->adresa_sidlo) ? "" : h($prijemcePomoci->adresa_sidlo->title) ?></td>
                <td><?= h($prijemcePomoci->ico) ?></td>
                <td><?= h($prijemcePomoci->obchodniJmeno) ?></td>
                <td><?= h($prijemcePomoci->legalName) ?></td>
                <td><?= empty($prijemcePomoci->adresa_trvale_bydliste) ? "" : h($prijemcePomoci->adresa_trvale_bydliste->title) ?></td>
                <td><?= h($prijemcePomoci->jmeno) ?></td>
                <td><?= h($prijemcePomoci->prijmeni) ?></td>
                <td><?= h($prijemcePomoci->narozeniRok) ?></td>
                <td><?= h($prijemcePomoci->firstName) ?></td>
                <td><?= h($prijemcePomoci->lastName) ?></td>
                <td><?= h($prijemcePomoci->dic) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
