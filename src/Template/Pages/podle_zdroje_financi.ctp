<?php
use Cake\I18n\Number;

?>
<h1>Zdroje Financí / Financování</h1>
<table>
    <thead>
    <tr>
        <th><a href="?sort=zdroj">Zdroj</a></th>
        <th><a href="?sort=sum">Součet poskytnutých financí</a></th>
        <th>Otevřít</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $d) {
        ?>
        <tr>
            <td><?= $this->Html->link($d['nazev'], '/podle-zdroje-financi/' . $d['id']) ?></td>
            <td><?= $this->Html->link(Number::currency($d['suma'], 'CZK', ['zero' => '']), '/podle-zdroje-financi/' . $d['id']) ?></td>
            <td><?= $this->Html->link('Otevřít', '/podle-zdroje-financi/' . $d['id']) ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <th><a href="?sort=poskytovatel">Zdroj</a></th>
        <th><a href="?sort=sum">Součet poskytnutých financí</a></th>
        <th>Otevřít</th>
    </tr>
    </tfoot>
</table>