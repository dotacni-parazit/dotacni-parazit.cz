<?php

$this->set('title', 'Seznam příjemců dotace, podle času od vzniku IČO po poskytnutí dotace');
?>
<div class="alert alert-info">
    &#8226; Byly použity datové sady: CEDR-III (<?= $this->Html->link("http://cedropendata.mfcr.cz") ?>) a MFČR PAP
    (<?= $this->Html->link("http://www.statnipokladna.cz/cs/csuis/sprava-ciselniku") ?>)
    <br/>
    &#8226; Za závazné se považuje datum založení/ukončení IČO dle Pomocného Analytického Přehledu a Datum podpisu
    Smlouvy o
    Dotaci dle CEDR-III (Dotace.podpisDatum)
    <br/><br/>
    "Rozdíl k První Dotaci" je rozdíl (ve dnech) mezi založením IČO a podpisem smlouvy první udělené dotace
    <br/>
    "Rozdíl k Poslední Dotaci" je rozdíl (ve dnech) mezi ukončením IČO a podpisem smlouvy poslední udělené dotace
    <br/><br/>
    Pokud není znám datum ukončení IČO, není rozdíl k poslední dotaci uveden
    <br/>
    Pokud je rozdíl záporný, znamená to, že první dotace byla podepsána před založením ičo, nebo poslední dotace po
    ukončení IČO
    <br/><br/>
    Jsou zobrazeny záznamy kde je rozdíl k první dotaci záporný nebo max. 90 dnů od založení IČO. Pokud máte zájem o
    kompletní data, kontaktujte nás.
</div>

<table class="datatable" data-ajax="<?= $this->request->getAttribute("here") ?>">
    <thead>
    <tr>
        <th>Příjemce</th>
        <th>Založení IČO</th>
        <th>Ukončení IČO</th>
        <th>První Dotace</th>
        <th>Poslední Dotace</th>
        <th>Rozdíl k První Dotaci</th>
        <th>Rozdíl k Poslední Dotaci</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td>Příjemce</td>
        <td>Založení IČO</td>
        <td>První Dotace</td>
        <td>Poslední Dotace</td>
        <td>Rozdíl k První Dotaci</td>
        <td>Rozdíl k Poslední Dotaci</td>
    </tr>
    </tfoot>
</table>
