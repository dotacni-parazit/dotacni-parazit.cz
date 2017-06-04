<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="ciselnikDotaceTitulV01">
    <h3><?= __('Ciselnik Dotace Titul V01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('about') ?></th>
            <th scope="col"><?= $this->Paginator->sort('dotaceTitulCiselnikAxisDotaceTitulKod') ?></th>
            <th scope="col"><?= $this->Paginator->sort('dotaceTitulNazevZkraceny') ?></th>
            <th scope="col"><?= $this->Paginator->sort('statniRozpocetKapitolaCiselnikAxisKapitolaKod') ?></th>
            <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
            <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
            <th scope="col"><?= $this->Paginator->sort('dotaceTitulKod') ?></th>
            <th scope="col"><?= $this->Paginator->sort('dotaceTitulNazev') ?></th>
            <th scope="col"><?= $this->Paginator->sort('dotaceTitulVlastniKod') ?></th>
            <th scope="col"><?= $this->Paginator->sort('statniRozpocetKapitolaKod') ?></th>
            <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            <th scope="col"><?= $this->Paginator->sort('prefLabel') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($ciselnikDotaceTitulV01 as $ciselnikDotaceTitulV01): ?>
            <tr>
                <td><?= $this->Number->format($ciselnikDotaceTitulV01->id) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->about) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->dotaceTitulCiselnikAxisDotaceTitulKod) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->dotaceTitulNazevZkraceny) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->statniRozpocetKapitolaCiselnikAxisKapitolaKod) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->zaznamPlatnostDoDatum) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->dotaceTitulKod) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->dotaceTitulNazev) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->dotaceTitulVlastniKod) ?></td>
                <td><?= $this->Number->format($ciselnikDotaceTitulV01->statniRozpocetKapitolaKod) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->title) ?></td>
                <td><?= h($ciselnikDotaceTitulV01->prefLabel) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
