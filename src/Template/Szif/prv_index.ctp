<?php
/**
 * @var AppView $this
 */
$this->set('title', 'Státní Zemědělský Intervenční Fond');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

use App\View\AppView;
use App\View\DPUTILS; ?>
<div class="alert alert-info">
    <ul>
        <li>U právnických osob (PO) je vždy uveden název společnosti, obec a okres</li>
        <li>U fyzických osob (FO) je uvedeno jméno a
            okres. FO, u nichž je příjem za fiskální rok roven nebo nižší částce 1250 EUR, jsou uvedeny pod Jednotným
            identifikátorem (JI).
        </li>
        <li>Záporné (-) znamínko u plateb znamená:
            <ul>
                <li>Intervenční opatření – Prodej – platba za zboží</li>
                <li>Vratky</li>
            </ul>
        </li>
    </ul>
    Více info na <?= $this->Html->link("https://www.szif.cz/cs/seznam-prijemcu-dotaci") ?>
</div>
<div id="tabs">
    <ul>
        <li><a href="#sources">Zdroj Financí</a></li>
        <li><a href="#okresy">Okres příjemce</a></li>
        <li><a href="#opatreni">Opatření</a></li>
        <li><a href="#po">Příjemce (IČO)</a></li>
        <li><a href="#fo">Příjemce (Fyz.os.)</a></li>
    </ul>

    <div id="sources">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Zdroj</th>
                <th>Počet poskytnutí pomoci</th>
                <th data-type="currency">Součet (celkem)</th>
                <th data-type="html">Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($sources as $s) { ?>
                <tr>
                    <td><?= $this->Html->link($s->source, '/program-rozvoje-venkova/zdroj/?name=' . urlencode($s->source)) ?></td>
                    <td><?= $s->count ?></td>
                    <td><?= DPUTILS::currency($s->sum) ?></td>
                    <td><?= $this->Html->link('Otevřít', '/program-rozvoje-venkova/zdroj/?name=' . urlencode($s->source)) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Zdroj</td>
                <td>Počet poskytnutí</td>
                <td>Součet (celkem)</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="okresy">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název Okresu</th>
                <th>Počet poskytnutí pomoci</th>
                <th data-type="currency">Součet (celkem)</th>
                <th data-type="html">Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($okresy as $o) { ?>
                <tr>
                    <td><?= $this->Html->link($o->okres, '/program-rozvoje-venkova/okres/?name=' . urlencode($o->okres)) ?></td>
                    <td><?= $o->count ?></td>
                    <td><?= DPUTILS::currency($o->sum) ?></td>
                    <td><?= $this->Html->link('Otevřít', '/program-rozvoje-venkova/okres/?name=' . urlencode($o->okres)) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název Okresu</td>
                <td>Počet poskytnutí pomoci</td>
                <td>Součet (celkem)</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="opatreni">
        <table class="datatable">
            <thead>
            <tr>
                <th>Opatření</th>
                <th>Počet poskytnutí pomoci</th>
                <th data-type="currency">Součet (celkem)</th>
                <th data-type="html">Otevřít</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($opatreni as $o) { ?>
                <tr>
                    <td><?= $this->Html->link($o->opatreni, '/program-rozvoje-venkova/opatreni/?name=' . urlencode($o->opatreni)) ?></td>
                    <td><?= $o->count ?></td>
                    <td><?= DPUTILS::currency($o->sum) ?></td>
                    <td><?= $this->Html->link('Otevřít', '/program-rozvoje-venkova/opatreni/?name=' . urlencode($o->opatreni)) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název Okresu</td>
                <td>Počet poskytnutí pomoci</td>
                <td>Součet (celkem)</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="po">
        <table class="datatable" data-ajax="/program-rozvoje-venkova/ajax/po">
            <thead>
            <tr>
                <th>IČO</th>
                <th>Název společnosti</th>
                <th>Počet poskytnutí</th>
                <th data-type="currency">Součet poskytnutých částek</th>
                <th data-type="html">Otevřít</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>IČO</td>
                <td>Název společnosti</td>
                <td>Počet poskytnutí</td>
                <td>Součet poskytnutých částek</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="fo">
        <table class="datatable" data-ajax="/program-rozvoje-venkova/ajax/fo">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>Okres</th>
                <th>Počet poskytnutí</th>
                <th data-type="currency">Součet poskytnutých částek</th>
                <th data-type="html">Otevřít</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Jméno</td>
                <td>Okres</td>
                <td>Počet poskytnutí</td>
                <td>Součet poskytnutých částek</td>
                <td>Otevřít</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>


<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>