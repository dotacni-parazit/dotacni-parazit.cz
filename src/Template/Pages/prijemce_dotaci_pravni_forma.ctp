<?php
/**
 * @var AppView $this
 */
$this->set('title', 'Podle Právní Formy');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

use App\View\AppView; ?>
<div id="tabs">
    <ul>
        <li><a href="#pf">Právní Forma</a></li>
        <li><a href="#spf">Společná Právní Forma</a></li>
    </ul>
    <div id="pf">
        <div class="alert alert-info">
            Právní Forma dle evidence CEDR, <a href="/opendata#pravni-forma">Více informací ...</a>
        </div>
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->control('pravniforma', ['options' => $pravni_formy, 'value' => $pravni_forma, 'type' => 'select', 'label' => 'Právní Forma']);
        echo $this->Form->submit('Zobrazit!');
        echo $this->Form->end();
        ?>
    </div>
    <div id="spf">
        <div class="alert alert-info">
            Společná Právní Forma - Sdružení jednotlivých právních forem dle evidence CEDR, <a
                    href="/opendata#spolecna-pravni-forma">Více informací ...</a>
        </div>
        <?php
        echo $this->Form->create(null, ['type' => 'get']);
        echo $this->Form->control('spf', ['options' => $spolecne_pravni_formy, 'value' => $spolecna_pravni_forma, 'type' => 'select', 'label' => 'Právní Forma']);
        echo $this->Form->submit('Zobrazit!');
        echo $this->Form->end();
        ?>
    </div>
</div>
<table id="datatable" style="width: 100%" data-ajax="<?= $this->request->getRequestTarget() ?>">
    <thead>
    <tr>
        <th>Obchodní Jméno</th>
        <th>IČO</th>
        <th>Státní příslušnost</th>
        <th class="nosearch">Detail</th>
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
<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: false,
            active: <?= empty($spolecna_pravni_forma) ? '0' : '1' ?>
        });
    });
</script>

