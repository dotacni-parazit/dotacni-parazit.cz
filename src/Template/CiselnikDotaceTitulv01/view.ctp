<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="ciselnikDotaceTitulv01 view large-9 medium-8 columns content">
    <h3><?= h($ciselnikDotaceTitulv01->idDotaceTitul) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdDotaceTitul') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->idDotaceTitul) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulVlastniKod') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->dotaceTitulVlastniKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulNazev') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->dotaceTitulNazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulNazevZkraceny') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->dotaceTitulNazevZkraceny) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DotaceTitulKod') ?></th>
            <td><?= $this->Number->format($ciselnikDotaceTitulv01->dotaceTitulKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('StatniRozpocetKapitolaKod') ?></th>
            <td><?= $this->Number->format($ciselnikDotaceTitulv01->statniRozpocetKapitolaKod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostOdDatum') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->zaznamPlatnostOdDatum) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ZaznamPlatnostDoDatum') ?></th>
            <td><?= h($ciselnikDotaceTitulv01->zaznamPlatnostDoDatum) ?></td>
        </tr>
    </table>
</div>
