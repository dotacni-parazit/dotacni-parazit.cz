<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="ciselnikStatV01">
    <h3><?= __('Ciselnik Stat V01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('about') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statKod3Cisla') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statKod3Znaky') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statKodOmezeny') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statNazev') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statNazevZkraceny') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statCiselnikAxisStatKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statNazevEn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statNazevZkracenyEn') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostDoDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zaznamPlatnostOdDatum') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikStatV01 as $ciselnikStatV01): ?>
            <tr>
                <td><?= $this->Number->format($ciselnikStatV01->id) ?></td>
                <td><?= h($ciselnikStatV01->about) ?></td>
                <td><?= $this->Number->format($ciselnikStatV01->statKod3Cisla) ?></td>
                <td><?= h($ciselnikStatV01->statKod3Znaky) ?></td>
                <td><?= h($ciselnikStatV01->statKodOmezeny) ?></td>
                <td><?= h($ciselnikStatV01->statNazev) ?></td>
                <td><?= h($ciselnikStatV01->statNazevZkraceny) ?></td>
                <td><?= h($ciselnikStatV01->statCiselnikAxisStatKod) ?></td>
                <td><?= h($ciselnikStatV01->statNazevEn) ?></td>
                <td><?= h($ciselnikStatV01->statNazevZkracenyEn) ?></td>
                <td><?= h($ciselnikStatV01->zaznamPlatnostDoDatum) ?></td>
                <td><?= h($ciselnikStatV01->zaznamPlatnostOdDatum) ?></td>
                <td><?= h($ciselnikStatV01->title) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
