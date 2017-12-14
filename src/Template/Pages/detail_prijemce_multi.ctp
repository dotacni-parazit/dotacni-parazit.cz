<?php
$this->set('title', 'Vícero Příjemců dle IČO');

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>

<div id="tabs">
    <ul>
        <li><a href="#obecne">Obecné Informace</a></li>
        <li><a href="#aliasy">Aliasy Příjemců</a></li>
        <li><a href="#rozhodnuti">Dotace Příjemců</a></li>
    </ul>
    <div id="obecne">
        <?php foreach ($info as $i) { ?>
            <h2>IČO: <?= \App\View\DPUTILS::ico($i->ico) ?></h2>
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
                    <td><?= $i->jmeno ?></td>
                </tr>

                <tr>
                    <td>Příjmení</td>
                    <td><?= $i->prijmeni ?></td>
                </tr>

                <tr>
                    <td>IČO</td>
                    <td><?= \App\View\DPUTILS::ico($i->ico) ?></td>
                </tr>

                <tr>
                    <td>Obchodní Jméno</td>
                    <td><?= $i->obchodniJmeno ?></td>
                </tr>

                <tr>
                    <td>Státní příslušnost</td>
                    <td><?= $i->Stat->statNazev ?></td>
                </tr>

                <tr>
                    <td>Právní Forma</td>
                    <td><?= !empty($i->PravniForma) ? $i->PravniForma->pravniFormaNazev : (!empty($i->iriPravniForma) ? $this->Html->link($i->iriPravniForma) : 'Nevyplněno') ?></td>
                </tr>

                <tr>
                    <td>Rok Narození</td>
                    <td><?= $i->rokNarozeni ?></td>
                </tr>

                <tr>
                    <td>Datum Platnost</td>
                    <td><?= !empty($i->dPlatnost) ? $i->dPlatnost->nice() : 'N/A' ?></td>
                </tr>

                <tr>
                    <td>Datum Aktualizace</td>
                    <td><?= !empty($i->dAktualizace) ? $i->dAktualizace->nice() : 'N/A' ?></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td>Vlastnost</td>
                    <td>Hodnota</td>
                </tr>
                </tfoot>
            </table>

        <?php } ?>
    </div>
    <div id="aliasy">
        <pre><?php foreach ($aliasy as $a) {
                $jmeno = empty($a['obchodniJmeno']) ? $a['prijmeni'] . ' ' . $a['jmeno'] : $a['obchodniJmeno'];
                echo $this->Html->link($a['idPrijemce'] . ' ' . $jmeno, '/detail-prijemce-pomoci/' . $a['idPrijemce']);
                echo '<br/>';
            } ?>
        </pre>
    </div>
    <div id="rozhodnuti">
        <table class="datatable" style="width: 100%;" data-ajax="<?= $this->request->here(false) ?>">
            <thead>
            <tr>
                <th data-type="html" class="nosearch medium-1 large-1 small-1">Rozhodnutí</th>
                <th data-type="html">Dotace</th>
                <th data-type="html">Jméno příjemce</th>
                <th class="medium-1 large-1">Rozpočtové Období</th>
                <th data-type="currency" class="nosearch">Částka rozhodnutá</th>
                <th data-type="currency" class="nosearch">Částka spotřebovaná</th>
                <th>Poskytovatel Dotace</th>
                <th>Finanční Zdroj</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
                <td>Rozhodnutí</td>
                <td>Dotace</td>
                <td>Jméno příjemce</td>
                <td>Rozpočtové Období</td>
                <td>Částka rozhodnutá</td>
                <td>Částka spotřebovaná</td>
                <td>Poskytovatel Dotace</td>
                <td>Finanční Zdroj</td>
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