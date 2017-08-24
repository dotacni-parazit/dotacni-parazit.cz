<?php
$this->set('title', 'Znaky Účelu Dotačních Titulů');
?>
<div>
    Filtrovat: <span id="yearsfilter">
            <a href="javascript:filterYear('')"> "Zobrazit vše"</a>
        <?php foreach ($roky as $y) { ?>, <a
                href="javascript:filterYear('<?= $y['ROK'] ?>')" id="f<?= $y['ROK'] ?>"> <?= $y['ROK'] ?></a><?php
        } ?>
    </span>
</div>
<hr/>
<table id="datatable" data-ajax="<?= $this->request->here(false) ?>">
    <thead>
    <tr>
        <th data-type="html">Název</th>
        <th data-type="html">Kód</th>
        <th data-type="num">Kapitola Státního Rozpočtu</th>
        <th data-type="num">Platnost Rok</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td>Název</td>
        <td>Kód</td>
        <td>Kapitola Státního Rozpočtu</td>
        <td>Platnost Rok</td>
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
        table.column(3).search("" + year).draw();
        $("#yearsfilter a").removeClass("hilight_underline");
        $("#yearsfilter #f"+year).addClass("hilight_underline");
        return false;
    }
</script>