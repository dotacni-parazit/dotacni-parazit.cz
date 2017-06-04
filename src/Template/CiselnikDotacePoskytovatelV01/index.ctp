<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="ciselnikDotacePoskytovatelV01 content">
    <h3><?= __('Ciselnik Dotace Poskytovatel V01') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('about') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dotacePoskytovatelKod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dotacePoskytovatelNazev') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciselnikDotacePoskytovatelV01 as $ciselnikDotacePoskytovatelV01): ?>
            <tr>
                <td><?= h($ciselnikDotacePoskytovatelV01->about) ?></td>
                <td><?= $this->Number->format($ciselnikDotacePoskytovatelV01->dotacePoskytovatelKod) ?></td>
                <td><?= h($ciselnikDotacePoskytovatelV01->dotacePoskytovatelNazev) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
