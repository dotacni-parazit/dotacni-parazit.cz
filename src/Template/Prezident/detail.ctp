<?php
/** @var \App\Model\Entity\Company $kandidat */

use Cake\I18n\Number;

$this->set('title', $kandidat->name);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>

<div id="tabs">
    <ul>
        <li><a href="#donations">Seznam darů</a></li>
        <li><a href="#donators">Dotace dárců</a></li>
    </ul>

    <div id="donations">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Dárce</th>
                <th>IČO dárce</th>
                <th>Vlastnická struktura</th>
                <th data-type="currency">Výše daru od PO</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($kandidat->incoming_transactions as $t) { ?>
                <tr>
                    <td><?= $t['donor']['name'] ?></td>
                    <td><?= $t['donor']['ico'] ?></td>
                    <td><?= $t['donor']['transparency_label']['label'] ?></td>
                    <td><?= \App\View\DPUTILS::currency($t['amount']) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Dárce</td>
                <td>IČO dárce</td>
                <td>Vlastnická struktura</td>
                <td>Výše daru od PO</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="donators">

        <div class="alert alert-info">
            V každém řádku je zobrazen součet částek "Rozhodnutí [Částka Rozhodnuta]", "Rozpočtové Období [Částka
            Spotřebovaná]", "Investiční Pobídky CzechInvest [Investice CZK]" a "Strukturální Fondy 2007-2013 [Veřejné
            Zdroje
            Celkem]",
            za daný rok, ve kterém byla společnost součástí holdingu.
            <br/><br/>
            Součet "Strukturální Fondy 2014-2020 [Zdroje Celkem]" je bohužel u všech řádků stejného IČO stejný, jelikož
            v informacích o realizaci projektů, není datum poskytnutí dotace nebo podpisu smlouvy. Takže součet ukazuje
            celkovou výši všech dotací v nových Strukturálních Fondech, nikoliv součet za konkrétní rok, kdy společnost
            patřila do holdingu.
            <br/><br/>
            Součty jsou dělány podle IČO, takže údaj nemusí být přesný.
        </div>

        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Dárce</th>
                <th>IČO</th>
                <th>Rok poskytnutí daru</th>
                <th>Vlastnická struktura společnosti dárce</th>
                <th class="nosearch" data-type="currency">CEDR-III Součet Rozhodnutí</th>
                <th class="nosearch" data-type="currency">CEDR-III Součet Spotřebováno</th>
                <th class="nosearch" data-type="currency">Součet Pobídek CzechInvest</th>
                <th class="nosearch" data-type="currency">Součet Stropů Veřejné podpory Pobídek CzechInvest</th>
                <th class="nosearch" data-type="currency">Součet Strukturální Fondy 2007-2013</th>
                <th class="nosearch" data-type="currency">Součet Strukturální Fondy 2014-2020</th>
                <th data-type="currency">Součet DotInfo.cz</th>
                <th data-type="currency">Součet Darů Politickým Stranám</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($donors as $d) { ?>
                <?php /** @var \App\Model\Entity\Transaction $d */ ?>
                <tr>
                    <td><?= $d->donor->name ?></td>
                    <td><?= $this->Html->link(\App\View\DPUTILS::ico($d->donor->ico), ['controller' => 'Pages', 'action' => 'prijemceDotaciIco', 'ico' => $d->donor->ico]) ?></td>
                    <td><?= $d->year ?></td>
                    <td><?= $d->donor->transparency_label->label ?></td>
                    <td><?= Number::currency($sum_donors[$d->donor->ico][$d->year][0]) ?></td>
                    <td><?= Number::currency($sum_donors[$d->donor->ico][$d->year][1]) ?></td>
                    <td><?= Number::currency($sum_donors[$d->donor->ico][$d->year][2] * 1000000) ?></td>
                    <td><?= Number::currency($sum_donors[$d->donor->ico][$d->year][7] * 1000000) ?></td>
                    <td><?= Number::currency($sum_donors[$d->donor->ico][$d->year][3]) ?></td>
                    <td><?= Number::currency($sum_donors[$d->donor->ico][$d->year][5]) ?></td>
                    <td><?= Number::currency($sum_donors[$d->donor->ico][$d->year][4]) ?></td>
                    <td><?= Number::currency($sum_donors[$d->donor->ico][$d->year][6]) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Dárce</td>
                <td>IČO</td>
                <td>Rok poskytnutí daru</td>
                <td>Vlastnická struktura společnosti dárce</td>
                <td>CEDR-III Součet Rozhodnutí</td>
                <td>CEDR-III Součet Spotřebováno</td>
                <td>Součet Pobídek CzechInvest</td>
                <td>Součet Stropů Veřejné podpory Pobídek CzechInvest</td>
                <td>Součet Strukturální Fondy 2007-2013</td>
                <td>Součet Strukturální Fondy 2014-2020</td>
                <td>Součet DotInfo.cz</td>
                <td>Součet Darů Politickým Stranám</td>
            </tr>
            </tfoot>
        </table>
    </div>

</div>

<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>