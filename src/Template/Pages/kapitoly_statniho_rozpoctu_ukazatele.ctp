<?php
$this->set('title', 'Kapitoly Státního Rozpočtu - Ukazatele');
?>
<div>
    Filtrovat: <span id="yearsfilter">
            <a href="javascript:filterYear('')"> "Zobrazit vše"</a>
        <?php foreach ($roky as $y) { ?>, <a
                href="javascript:filterYear('<?= $y['ROK'] ?>')"> <?= $y['ROK'] ?></a><?php
        } ?>
    </span>
</div>
<hr/>
<table id="datatable" data-ajax="<?= $this->request->here(false) ?>">
    <thead>
    <tr>
        <th data-type="html">Název Ukazatele</th>
        <th data-type="html">Kód Ukazatele</th>
        <th data-type="html">Kapitola Státního Rozpočtu</th>
        <th data-type="number">Počet Dotačních Titulů</th>
        <th data-type="datetime">Platnost</th>
        <th data-type="html">Otevřít</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <td>Název Ukazatele</td>
        <td>Kód Ukazatele</td>
        <td>Kapitola Státního Rozpočtu</td>
        <td>Počet Dotačních Titulů</td>
        <td>Platnost</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>

<script type="text/javascript">
    function filterYear(year) {
        table.column(4).search("" + year).draw();
        return false;
    }
</script>