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
            <th scope="col"><?= $this->Paginator->sort('dotaceTitulNazev') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($ciselnikDotaceTitulV01 as $ciselnikDotaceTitulV01): ?>
            <tr>
                <td><?= h($ciselnikDotaceTitulV01->dotaceTitulNazev) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
