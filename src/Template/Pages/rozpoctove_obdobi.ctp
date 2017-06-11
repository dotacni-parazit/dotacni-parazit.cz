<?php
use Cake\I18n\Number;
?>
<h2>První 1000 záznamů, seřazeno podle spotřebované částky sestupně</h2>
Rok:
<a href="/rozpoctove-obdobi/2010">2010 </a>
<a href="/rozpoctove-obdobi/2011">2011 </a>
<a href="/rozpoctove-obdobi/2012">2012 </a>
<a href="/rozpoctove-obdobi/2013">2013 </a>
<a href="/rozpoctove-obdobi/2014">2014 </a>
<a href="/rozpoctove-obdobi/2015">2015 </a>
<a href="/rozpoctove-obdobi/2016">2016 </a>
<a href="/rozpoctove-obdobi/2017">2017 </a>
<table>
    <thead>
    <tr>
        <th>Rozhodnutí</th>
        <th>Částka čerpaná</th>
        <th>uvolněná</th>
        <th>vrácená</th>
        <th>spotřebovaná</th>
        <th>Rok</th>
        <th>Dotační Titul</th>
<!--        <th>Účel</th>-->
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $c) {
        //die(print_r($c));
        ?>
        <tr>
            <td><?= $this->Html->link($c->idRozhodnuti, "https://dotacni-parazit.cz/rozhodnuti/view/" . $c->idRozhodnuti) ?></td>
            <td><?= Number::currency($c->castkaCerpana,'CZK') ?></td>
            <td><?= Number::currency($c->castkaUvolnena,'CZK') ?></td>
            <td><?= Number::currency($c->castkaVracena,'CZK') ?></td>
            <td><?= Number::currency($c->castkaSpotrebovana,'CZK') ?></td>
            <td><?= $c->rozpoctoveObdobi ?></td>
            <td><?= isset($c->CiselnikDotaceTitulv01) ? $this->Html->link($c->CiselnikDotaceTitulv01->dotaceTitulNazev, "https://dotacni-parazit.cz/dotacni-titul/detail?id=" . $c->iriDotacniTitul) : "" ?></td>
<!--            <td><?= $c->iriUcelovyZnak ?></td>-->
        </tr>
        <?php
    }
    ?>
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
<!--        <th>Účel</th>-->
    </tr>
    </tfoot>
</table>
