<?php
/** @var \App\Model\Entity\Owner[] $owners */
/** @var array $subsidiaries_sums */

/** @var \App\Model\Entity\Consolidation[] $subsidiaries */

use Cake\I18n\Number;

/** @var \App\Model\Entity\Company $holding */
$this->set('title', $holding->name);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

?>
<div id="tabs">

    <ul>
        <li><a href="#obecne">Informace o Holdingu</a></li>
        <li><a href="#owners">Vlastnická Historie</a></li>
        <li><a href="#subsidiaries">Konsolidované společnosti</a></li>
        <li><a href="#attachments">Výkazy Holdingu</a></li>
    </ul>

    <div id="obecne">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>Jméno</td>
                <td><?= $holding->name ?></td>
            </tr>

            <tr>
                <td>IČ</td>
                <td><?= \App\View\DPUTILS::ico($holding->ico) ?></td>
            </tr>

            <tr>
                <td>Počet konsolidovaných společností</td>
                <td><?= count($holding->subsidiaries) ?></td>
            </tr>

            <tr>
                <td>Státní Příslušnost</td>
                <td><?= $holding->state->name . ' (' . $holding->state->kod . ')' ?></td>
            </tr>

            </tbody>
            <tfoot>
            <tr>
                <td>Vlastnost</td>
                <td>Hodnota</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="owners">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Vlastník</th>
                <th class="nosearch">Rok</th>
                <th class="nosearch">Vlastnický Podíl</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($owners as $o) { ?>
                <tr>
                    <td><?= $o->owner->name ?></td>
                    <td><?= $o->year ?></td>
                    <td><?= Number::toPercentage($o->shares_percent) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Vlastník</td>
                <td>Rok</td>
                <td>Vlastnický Podíl</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="subsidiaries">
        <div class="alert alert-info">
            V každém řádku je zobrazen součet částek "Rozhodnutí [Částka Rozhodnuta]", "Rozpočtové Období [Částka
            Spotřebovaná]", "Investiční Pobídky CzechInvest [Investice CZK]" a "Strukturální Fondy [Veřejné Zdroje
            Celkem]",
            za daný rok, ve kterém byla společnost součástí holdingu.
            <br/><br/>
            Součty jsou dělány podle IČO, takže údaj nemusí být přesný.
        </div>
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Konsolidovaná Společnost</th>
                <th>IČO</th>
                <th>Rok</th>
                <th class="nosearch">Vlastnický Podíl</th>
                <th>Státní příslušnost</th>
                <th class="nosearch" data-type="currency">Součet Rozhodnutí</th>
                <th class="nosearch" data-type="currency">Součet Spotřebováno</th>
                <th class="nosearch" data-type="currency">Součet Pobídek CzechInvest</th>
                <th class="nosearch" data-type="currency">Součet Strukturálních Fondů</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($subsidiaries as $s) { ?>
                <tr>
                    <td><?= $this->Html->link($s->subsidiary->name, ['controller' => 'Pages', 'action' => 'prijemceDotaciJmeno', 'name' => $s->subsidiary->name]) ?></td>
                    <td><?= $this->Html->link(\App\View\DPUTILS::ico($s->subsidiary->ico), ['controller' => 'Pages', 'action' => 'prijemceDotaciIco', 'ico' => $s->subsidiary->ico]) ?></td>
                    <td><?= $s->year ?></td>
                    <td><?= Number::toPercentage($s->shares_percent) ?></td>
                    <td><?= $s->subsidiary->state->name ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][0]) ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][1]) ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][2] * 1000000) ?></td>
                    <td><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][3]) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Konsolidovaná Společnost</td>
                <td>IČO</td>
                <td>Rok</td>
                <td>Vlastnický Podíl</td>
                <td>Státní příslušnost</td>
                <td class="nosearch">Součet Rozhodnutí</td>
                <td class="nosearch">Součet Spotřebováno</td>
                <td class="nosearch">Součet Pobídek CzechInvest</td>
                <td class="nosearch">Součet Strukturálních Fondů</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <div id="attachments">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Název</th>
                <th class="nosearch">Odkaz (PDF)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $shown_ids = [];
            foreach ($subsidiaries as $s) {
                if (in_array($s->attachment_id, $shown_ids)) continue;
                if (empty($s->attachment)) continue;
                $shown_ids[] = $s->attachment_id;
                ?>
                <tr>
                    <td><?= $s->attachment->name ?></td>
                    <td><?= $this->Html->link(str_replace("data.dotacni-parazit.cz", "dotacni-parazit.cz", $s->attachment->url)) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název</td>
                <td>Odkaz (PDF)</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>