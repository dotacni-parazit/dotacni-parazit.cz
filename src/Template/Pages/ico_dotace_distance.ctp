<?php

use Cake\I18n\Number;

$this->set('title', 'Seznam příjemců dotace, podle času od vzniku IČO po poskytnutí dotace');
?>
<div class="alert alert-info">
    &#8226; Byly použity datové sady: CEDR-III (<?= $this->Html->link("http://cedropendata.mfcr.cz") ?>) a MFČR PAP
    (<?= $this->Html->link("http://www.statnipokladna.cz/cs/csuis/sprava-ciselniku") ?>)
    <br/>
    &#8226; Za závazné se považuje datum založení IČO dle Pomocného Analytického Přehledu a Datum podpisu Smlouvy o
    Dotaci dle CEDR-III (Dotace.podpisDatum)
    <br/>
    &#8226; Je zobrazeno prvních 170 nalezených nesrovnalostí
</div>

<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th class="col-1 nosearch">Rozhodnutí</th>
        <th>Příjemce</th>
        <th>Dotace</th>
        <th class="nosearch" data-type="date">Založení IČO</th>
        <th class="nosearch" data-type="datetime">Podpis Smlouvy Dotace</th>
        <th class="nosearch">Rozdíl (dny)</th>
    </tr>
    </thead>
    <?php
    foreach ($distance as $d) {
        /** @var \App\Model\Entity\Dotace $dotace */
        $dotace = $d->dotace;
        /** @var \App\Model\Entity\MFCRPAP $pap */
        $pap = $d->pap;
        if (empty($dotace->podpisDatum) || empty($pap->start)) continue;
        ?>
        <tr>
            <td><?= $this->Html->link('[R] ' . Number::currency($dotace->Rozhodnuti[0]->castkaRozhodnuta), '/detail-rozhodnuti/' . $dotace->Rozhodnuti[0]->idRozhodnuti) ?></td>
            <td><?= $this->Html->link($dotace->PrijemcePomoci->obchodniJmeno, '/detail-prijemce-pomoci/' . $dotace->idPrijemce) ?></td>
            <td><?= $this->Html->link($dotace->projektNazev . ' (' . $dotace->projektIdnetifikator . ', ' . $dotace->projektKod . ')', '/detail-dotace/' . $dotace->idDotace) ?></td>
            <td><?= $pap->start->nice() ?></td>
            <td><?= $dotace->podpisDatum->nice() ?></td>
            <td><?=
                round((date_create_from_format('d.m.y H:i', $dotace->podpisDatum)->getTimestamp() -
                        date_create_from_format("d.m.y", $pap->start)->getTimestamp()) / 86400)
                ?></td>
        </tr>
    <?php } ?>
    <tfoot>
    <tr>
        <td>Příjemce</td>
        <td>Dotace</td>
        <td>Založení IČO</td>
        <td>Podpis Smlouvy Dotace</td>
        <td>Rozdíl (dny)</td>
    </tr>
    </tfoot>
</table>
