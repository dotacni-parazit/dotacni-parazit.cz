<?php
$this->set('title', 'Znaky Účelu Dotačních Titulů');
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
        <th>Název</th>
        <th>Kód</th>
        <th>Kapitola Státního Rozpočtu</th>
        <th>Platnost Rok</th>
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

<script type="text/javascript">
    function filterYear(year) {
        table.column(3).search("" + year).draw();
        return false;
    }
</script>