<?php
$this->set('title', 'Seznam příjemců dotace, podle času od vzniku IČO po poskytnutí dotace');
?>
<div class="alert alert-info">
    &#8226; Byly použity datové sady: CEDR-III (<?= $this->Html->link("http://cedropendata.mfcr.cz")?>) a MFČR PAP (<?= $this->Html->link("http://www.statnipokladna.cz/cs/csuis/sprava-ciselniku") ?>)
    <br/>
    &#8226; Za závazné se považuje datum založení IČO dle Pomocného Analytického Přehledu a Datum podpisu Smlouvy o Dotaci dle CEDR-III (Dotace.podpisDatum)
    <br/>
    &#8226; Je zobrazeno prvních 170 nalezených nesrovnalostí
</div>

<table class="datatable datatable_simple">
    <thead>
    <tr>
        <th>Příjemce</th>
        <th>Dotace</th>
        <th class="nosearch" data-type="date">Založení IČO</th>
        <th class="nosearch" data-type="datetime">Podpis Smlouvy Dotace</th>
        <th>Rozdíl (dny)</th>
    </tr>
    </thead>
    <?php foreach($distance as $d) {
        if(empty($d[2]) || empty($d[3])) continue;
        ?>
        <tr>
            <td><?= $this->Html->link($d[0], '/detail-prijemce-pomoci/'.$d[0]) ?></td>
            <td><?= $this->Html->link($d[1], '/detail-dotace/'.$d[1]) ?></td>
            <td><?= $d[2] ?></td>
            <td><?= $d[3] ?></td>
            <td><?=
                round((date_create_from_format('d.m.y H:i', $d[3])->getTimestamp() -
                date_create_from_format("d.m.y", $d[2])->getTimestamp()) / 86400)
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
