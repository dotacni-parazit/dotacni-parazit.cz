<?php
/**
 * @var AppView $this
 */


use App\View\AppView;

$this->set('title', 'Fyzické osoby Nepodnikatelé')
?>
<div class="alert alert-info">Všechny Fyzické osoby nepodnikatelé evidované v CEDR-III jako příjemci dotací</div>
<hr/>
Filtr Příjmení: <br/>
<?php
$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
for ($index = 0; $index < strlen($letters); $index++) {
    $char = $letters[$index];
    echo '<a href="javascript:filterLetter(\'' . $char . '\')">' . $char . '</a> ';
}
?>
| <a href="javascript:filterLetter('')">Zobrazit vše</a>
<hr/>
<table id="datatable" data-ajax="/fyzicke-osoby/ajax">
    <thead>
    <tr>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th data-type="number" class="medium-1 large-1">Rok narození</th>
        <th>Bydliště</th>
        <th>Státní příslušnost</th>
        <th data-type="currency" class="medium-1 large-1">Částka rozhodnutá</th>
        <th data-type="currency" class="medium-1 large-1">Částka spotřebovaná</th>
        <th data-type="html" class="medium-1 large-1 nosearch">Otevřít</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
    <tr>
        <td>Jméno</td>
        <td>Příjmení</td>
        <td data-type="number" class="medium-1 large-1">Rok narození</td>
        <td>Bydliště</td>
        <td>Státní příslušnost</td>
        <td data-type="currency" class="medium-1 large-1">Částka rozhodnutá</td>
        <td data-type="currency" class="medium-1 large-1">Částka spotřebovaná</td>
        <td data-type="html" class="medium-1 large-1">Otevřít</td>
    </tr>
    </tfoot>
</table>
<script type="text/javascript">
    function filterLetter(letter) {
        table.column(1).search('^' + letter, true, false).draw();
    }
</script>