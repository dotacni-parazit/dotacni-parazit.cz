<?php
/** @var \App\Model\Entity\Company $owner */

/** @var array $subsidiaries_sums */

use Cake\I18n\Number;

/** @var \App\Model\Entity\Consolidation[] $subsidiaries */
/** @var \App\Model\Entity\Owner[] $holdingy */
$this->set('title', $owner->name);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné Informace</a></li>
        <li><a href="#holdingy">Vlastněné Holdingy</a></li>
        <li><a href="#subsidiaries">Vlastněné Společnosti</a></li>
        <li><a href="#attachments">Výkazy holdingů</a></li>
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
                <td><?= $owner->name ?></td>
            </tr>

            <tr>
                <td>IČ</td>
                <td><?= \App\View\DPUTILS::ico($owner->ico) ?></td>
            </tr>

            <tr>
                <td>Počet vlastněných holdingů</td>
                <td><?= count($holdingy) ?></td>
            </tr>

            <tr>
                <td>Státní Příslušnost</td>
                <td><?= $owner->state->name . ' (' . $owner->state->kod . ')' ?></td>
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
    <div id="holdingy">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název Holdingu</th>
                <th>Rok vlastnictví</th>
                <th>Vlastnický Podíl</th>
                <th>Poznámky</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($holdingy as $h) { ?>
                <tr>
                    <td><?= $h->company->name ?></td>
                    <td><?= $h->year ?></td>
                    <td><?= Number::toPercentage($h->shares_percent) ?></td>
                    <td><?= $h->notes ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název Holdingu</td>
                <td>Rok vlastnictví</td>
                <td>Vlastnický Podíl</td>
                <td>Poznámky</td>
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
                <th>Holding</th>
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
                    <td><?= $s->company->name ?></td>
                    <td><?= $this->Html->link($s->subsidiary->name, ['controller' => 'Pages', 'action' => 'prijemceDotaciJmeno', 'name' => $s->subsidiary->name]) ?></td>
                    <td><?= $this->Html->link(\App\View\DPUTILS::ico($s->subsidiary->ico), ['controller' => 'Pages', 'action' => 'prijemceDotaciIco', 'ico' => $s->subsidiary->ico]) ?></td>
                    <td><?= $s->year ?></td>
                    <td><?= Number::toPercentage($s->shares_percent) ?></td>
                    <td><?= $s->subsidiary->state->name ?></td>
                    <td class="text-right"><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][0]) ?></td>
                    <td class="text-right"><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][1]) ?></td>
                    <td class="text-right"><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][2] * 1000000) ?></td>
                    <td class="text-right"><?= Number::currency($subsidiaries_sums[$s->subsidiary->ico][$s->year][3]) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Holding</td>
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
            collapsible: false,
            active: <?= empty($name) ? '0' : '1' ?>
        });
    });
</script>