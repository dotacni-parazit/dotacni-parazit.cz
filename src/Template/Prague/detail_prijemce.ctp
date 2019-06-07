<?php
/**
 * @var AppView $this
 */
$this->set('title', $prijemce[0]['nazev']);

$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);

use App\View\AppView; ?>
<div id="tabs">
    <ul>
        <li><a href="#basics">Základní informace</a></li>
        <li><a href="#aliasy">Aliasy příjemce</a></li>
        <li><a href="#projects">Projekty</a></li>
    </ul>

    <div id="basics">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th class="nosearch">Vlastnost</th>
                <th class="nosearch">Hodnota</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>IČO</td>
                <td><?= $prijemce[0]['ic'] ?></td>
            </tr>

            <tr>
                <td>Právní Forma</td>
                <td><?= $prijemce[0]['pravni_forma'] ?></td>
            </tr>

            <tr>
                <td>Sídlo</td>
                <td><?= $prijemce[0]['ulice'] . ' ' . $prijemce[0]['cislo_popisne'] . '/' . $prijemce[0]['cislo_orientacni'] . ', ' . $prijemce[0]['mestska_cast'] . ', ' . $prijemce[0]['obec'] . ', ' . $prijemce[0]['psc'] ?></td>
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
    <div id="aliasy">
        <table class="datatable">
            <thead>
            <tr>
                <th>Název</th>
                <th>Adresa</th>
                <th>Projekt</th>
                <th>Rok Od</th>
                <th>Rok Do</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($prijemce as $p) { ?>
                <tr>
                    <td><?= $p['nazev'] ?></td>
                    <td><?= $prijemce[0]['ulice'] . ' ' . $prijemce[0]['cislo_popisne'] . '/' . $prijemce[0]['cislo_orientacni'] . ', ' . $prijemce[0]['mestska_cast'] . ', ' . $prijemce[0]['obec'] . ', ' . $prijemce[0]['psc'] ?></td>
                    <td><?= $p['Projekt']['nazev_projektu'] ?></td>
                    <td><?= $p['Projekt']['rok_od'] ?></td>
                    <td><?= $p['Projekt']['rok_do'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název</td>
                <td>Adresa</td>
                <td>Projekt</td>
                <td>Rok Od</td>
                <td>Rok Do</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="projects">
        <table class="datatable nowrap"
               data-ajax="/granty-praha/ajax/prijemce/projekty/<?= $prijemce[0]['id_zadatel'] ?>">
            <thead>
            <tr>
                <th data-type="html">Číslo projektu</th>
                <th data-type="html">Název projektu</th>
                <th>Rok Od</th>
                <th>Rok Do</th>
                <th data-type="currency">Celkové náklady</th>
                <th data-type="currency">Požadovaná částka</th>
                <th data-type="currency">Přidělená částka</th>
                <th data-type="currency">Vyčerpaná částka</th>
                <th>Stav</th>
                <th>Název grantového programu</th>
                <th>Název oblasti</th>
                <th>Účel dotace</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <td>Číslo projektu</td>
                <td>Název projektu</td>
                <td>Rok Od</td>
                <td>Rok Do</td>
                <td>Celkové náklady</td>
                <td>Požadovaná částka</td>
                <td>Přidělená částka</td>
                <td>Vyčerpaná částka</td>
                <td>Stav</td>
                <td>Název grantového programu</td>
                <td>Název oblasti</td>
                <td>Účel dotace</td>
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
