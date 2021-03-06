<?php
/**
 * @var AppView $this
 */
$this->set('title', 'Účel Dotačních Titulů');

use App\View\AppView; ?>
<div>
    Filtrovat: <span id="yearsfilter">
            <a href="javascript:filterYear('')"> "Zobrazit vše"</a>
        <?php foreach ($roky as $y) { ?>, <a
                href="javascript:filterYear('<?= $y['ROK'] ?>')" id="f<?= $y['ROK'] ?>"> <?= $y['ROK'] ?></a><?php
        } ?>
    </span>
</div>
<hr/>
<table id="datatable" data-ajax="<?= $this->request->getRequestTarget() ?>">
    <thead>
    <tr>
        <th data-type="html" class="col">Název</th>
        <th data-type="html" class="nosearch">Kód</th>
        <th data-type="num" class="nosearch">Kapitola Státního Rozpočtu</th>
        <th data-type="num" class="nosearch">Počet Dotačních Titulů</th>
        <th data-type="num">Platnost Rok</th>
        <th data-type="html" class="nosearch">Otevřít</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td>Název</td>
        <td>Kód</td>
        <td>Kapitola Státního Rozpočtu</td>
        <td>Počet Dotačních Titulů</td>
        <td>Platnost Rok</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>

<style type="text/css">
    .hilight_underline {
        text-decoration: underline;
        font-size: 150%;
    }
</style>

<script type="text/javascript">
    function filterYear(year) {
        table.column(4).search("" + year).draw();
        $("#yearsfilter a").removeClass("hilight_underline");
        $("#yearsfilter #f" + year).addClass("hilight_underline");
        return false;
    }
</script>