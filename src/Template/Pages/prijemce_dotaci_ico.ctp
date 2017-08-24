<?php
$this->set('title', 'Vyhledávání IČO - Příjemci Pomoci');
?>
<?php
echo $this->Form->create(null, ['type' => 'get']);
echo $this->Form->input('ico', ['label' => 'IČO (pouze čísla)', 'value' => $ico]);
echo $this->Form->submit('Hledat!');
echo $this->Form->end();
?>
<hr/>
<table id="datatable" style="width: 100%" data-ajax="<?= $this->request->here(false) ?>">
    <thead>
    <tr>
        <th>Jméno</th>
        <th>IČO</th>
        <th>Státní Příslušnost</th>
        <th>Otevřít</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td>Jméno</td>
        <td>IČO</td>
        <td>Státní Příslušnost</td>
        <td>Otevřít</td>
    </tr>
    </tfoot>
</table>
