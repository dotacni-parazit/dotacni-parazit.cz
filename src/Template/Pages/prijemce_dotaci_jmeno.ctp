<?php
$this->set('title', 'Vyhledávání Jménem - Příjemci Pomoci');

echo $this->Form->create(null, ['type' => 'get']);
echo $this->Form->input('name', ['label' => 'Obchodní jméno / Jméno / Příjmení (alespoň 3 písmena)', 'value' => $name]);
echo $this->Form->submit('Hledat!');
echo $this->Form->end();
echo 'použijte * pro hledání částí slova, např. "techn*" najde "technologie"';
?>
<hr/>
<table id="datatable" style="width: 100%" data-ajax="<?= $this->request->here(false) ?>">
    <thead>
    <tr>
        <th>Obchodní Jméno</th>
        <th>IČO</th>
        <th>Státní příslušnost</th>
        <th>Detail</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td>Obchodní Jméno</td>
        <td>IČO</td>
        <td>Státní příslušnost</td>
        <td>Detail</td>
    </tr>
    </tfoot>
</table>
