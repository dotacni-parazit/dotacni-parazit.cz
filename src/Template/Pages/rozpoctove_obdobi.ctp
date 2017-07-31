<?php
use Cake\I18n\Number;

$this->set('title', 'Rozpočtové Období' . ($year == null ? '' : ' - ' . $year));
?>
<h2>Prvních 1000 záznamů, seřazeno podle spotřebované částky sestupně</h2>
<hr/>
Rok:
<a href="/rozpoctove-obdobi/2010">2010 </a>
<a href="/rozpoctove-obdobi/2011">2011 </a>
<a href="/rozpoctove-obdobi/2012">2012 </a>
<a href="/rozpoctove-obdobi/2013">2013 </a>
<a href="/rozpoctove-obdobi/2014">2014 </a>
<a href="/rozpoctove-obdobi/2015">2015 </a>
<a href="/rozpoctove-obdobi/2016">2016 </a>
<a href="/rozpoctove-obdobi/2017">2017 </a>
<hr/>
<table id="datatable">
    <thead>
    <tr>
        <th data-type="html" class="nosearch medium-1 large-1">Rozhodnutí</th>
        <th data-type="currency" class="nosearch">Částka čerpaná</th>
        <th data-type="currency" class="nosearch">uvolněná</th>
        <th data-type="currency" class="nosearch">vrácená</th>
        <th data-type="currency" class="nosearch">spotřebovaná</th>
        <th data-type="year">Rok</th>
        <th data-type="html">Dotační Titul</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $c) { ?>
        <tr>
            <td><?= $this->Html->link('[R]', "https://dotacni-parazit.cz/detail-rozhodnuti/" . $c->idRozhodnuti) ?></td>
            <td style="text-align: right"><?= Number::currency($c->castkaCerpana, 'CZK') ?></td>
            <td style="text-align: right"><?= Number::currency($c->castkaUvolnena, 'CZK') ?></td>
            <td style="text-align: right"><?= Number::currency($c->castkaVracena, 'CZK') ?></td>
            <td style="text-align: right"><?= Number::currency($c->castkaSpotrebovana, 'CZK') ?></td>
            <td><?= $c->rozpoctoveObdobi ?></td>
            <td><?= isset($c->CiselnikDotaceTitulv01) ? $this->Html->link($c->CiselnikDotaceTitulv01->dotaceTitulNazev, "/detail-dotacni-titul/" . $c->CiselnikDotaceTitulv01->dotaceTitulKod) : "" ?></td>
            <!--            <td><?= $c->iriUcelovyZnak ?></td>-->
        </tr>
    <?php } ?>
    </tbody>

    <tfoot>
    <tr>
        <th>Rozhodnutí</th>
        <th>Částka čerpaná</th>
        <th>uvolněná</th>
        <th>vrácená</th>
        <th>spotřebovaná</th>
        <th>Rok</th>
        <th>Dotační Titul</th>
    </tr>
    </tfoot>
</table>
