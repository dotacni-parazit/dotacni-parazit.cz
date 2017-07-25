<?php
use Cake\I18n\Number;

$this->set('title', 'Podle sídla příjemce');
$this->Html->script('datatable.js?em=' . rand(), ['block' => true]);
$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>

<div id="tabs">
    <ul>
        <li><a href="#kraje_list">Kraje - Seznam</a></li>
        <li><a href="#kraje_map">Kraje - Mapa</a></li>
        <li><a href="#okresy_list">Okresy - Seznam</a></li>
        <li><a href="#okresy_map">Okresy - Mapa</a></li>
        <li><a href="#obce_list">Obce - Seznam</a></li>
        <li><a href="#staty_list">Státy - Seznam</a></li>
    </ul>
    <div id="kraje_map">
        <?php
        echo file_get_contents(WWW_ROOT . 'svg' . DS . 'cz_kraje_2.svg');
        ?>
    </div>
    <div id="okresy_list" style="width: 100%;">
        <table class="datatable">
            <thead>
            <tr>
                <th>Název okresu</th>
                <th class="nosearch" data-type="currency">Součet částek rozhodnutých</th>
                <th class="nosearch" data-type="currency">Součet částek spotřebovaných</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($okresy as $o) { ?>
                <tr>
                    <td><?= $o->okresNazev ?></td>
                    <td style="text-align: right;"><?= Number::currency($okresy_soucet[$o->id]->soucet) ?></td>
                    <td style="text-align: right;"><?= Number::currency($okresy_soucet[$o->id]->soucetSpotrebovano) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název okresu</td>
                <td>Součet částek rozhodnutých</td>
                <td>Součet částek spotřebovaných</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="okresy_map">
        <?php
        echo file_get_contents(WWW_ROOT . 'svg' . DS . 'cz_districts.svg');
        ?>
    </div>
    <div id="obce_list" style="width: 100%;">
        <table class="datatable">
            <thead>
            <tr>
                <th>Název obce</th>
                <th class="nosearch" data-type="currency">Součet částek rozhodnutých</th>
                <th class="nosearch" data-type="currency">Součet částek spotřebovaných</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($obce as $o) { ?>
                <tr>
                    <td><?= $o->obecNazev ?></td>
                    <td style="text-align: right;"><?= Number::currency($obce_soucet[$o->id]->soucet) ?></td>
                    <td style="text-align: right;"><?= Number::currency($obce_soucet[$o->id]->soucetSpotrebovano) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název obce</td>
                <td>Součet částek rozhodnutých</td>
                <td>Součet částek spotřebovaných</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="kraje_list" style="width: 100%;">
        <table id="datatable2">
            <thead>
            <tr>
                <th>Název Kraje</th>
                <th data-type="currency" class="nosearch">Součet rozhodnutých částek</th>
                <th data-type="currency" class="nosearch">Součet spotřebovaných částek</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($kraje_data as $k) { ?>
                <tr>
                    <td><?= $this->Html->link($k->krajNazev, '/detail-kraje/' . $k->krajKod) ?></td>
                    <td style="text-align: right;"><?= Number::currency($k->soucet) ?></td>
                    <td style="text-align: right;"><?= Number::currency($k->soucet_spotrebovano) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název Kraje</td>
                <td>Součet rozhodnutých částek</td>
                <td>Součet spotřebovaných částek</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="staty_list" style="width: 100%;">
        <table id="datatable">
            <thead>
            <tr>
                <th>Název státu</th>
                <th data-type="currency" class="nosearch">Součet rozhodnutých částek</th>
                <th data-type="currency" class="nosearch">Součet vyčerpaných částek</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($staty as $s) { ?>
                <tr>
                    <td><?= $s->statNazev ?></td>
                    <td style="text-align: right;"><?= Number::currency($soucet_staty[$s->id]) ?></td>
                    <td style="text-align: right;"><?= Number::currency($soucet_staty_spotrebovano[$s->id]) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název státu</td>
                <td>Součet rozhodnutých částek</td>
                <td>Součet vyčerpaných částek</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<style type="text/css">
    #map {
        width: 100%;
        height: 100%;
    }
</style>
<script type="text/javascript">

    var kraje_soucet = {
        "zapadocesky": {
            "soucet": "<?= Number::currency($kraje_data[34]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[34]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[34]->color ?>",
            "krajNazev": "<?= $kraje_data[34]->krajNazev ?>"
        },
        "jihocesky": {
            "soucet": "<?= Number::currency($kraje_data[33]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[33]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[33]->color ?>",
            "krajNazev": "<?= $kraje_data[33]->krajNazev ?>"
        },
        "jihomoravsky": {
            "soucet": "<?= Number::currency($kraje_data[37]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[37]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[37]->color ?>",
            "krajNazev": "<?= $kraje_data[37]->krajNazev ?>"
        },
        "severocesky": {
            "soucet": "<?= Number::currency($kraje_data[35]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[35]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[35]->color ?>",
            "krajNazev": "<?= $kraje_data[35]->krajNazev ?>"
        },
        "severomoravsky": {
            "soucet": "<?= Number::currency($kraje_data[38]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[38]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[38]->color ?>",
            "krajNazev": "<?= $kraje_data[38]->krajNazev ?>"
        },
        "stredocesky": {
            "soucet": "<?= Number::currency($kraje_data[32]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[32]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[32]->color ?>",
            "krajNazev": "<?= $kraje_data[32]->krajNazev ?>"
        },
        "vychodocesky": {
            "soucet": "<?= Number::currency($kraje_data[36]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[36]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[36]->color ?>",
            "krajNazev": "<?= $kraje_data[36]->krajNazev ?>"
        },
        "praha": {
            "soucet": "<?= Number::currency($kraje_data[31]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[31]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[31]->color ?>",
            "krajNazev": "<?= $kraje_data[31]->krajNazev ?>"
        }
    };
    var kraje = {
        "zapadocesky": "#karlovarsky-kraj, #plzensky-kraj",
        "jihocesky": "#jihocesky-kraj, #vysocina",
        "jihomoravsky": "#jihomoravsky-kraj, #zlinsky-kraj",
        "severocesky": "#ustecky-kraj, #liberecky-kraj",
        "severomoravsky": "#moravskoslezsky-kraj, #olomoucky-kraj",
        "stredocesky": "#stredocesky-kraj",
        "vychodocesky": "#kralovehradecky-kraj, #pardubicky-kraj",
        "praha": "#praha"
    };

    $(function () {
        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });

        $.each(kraje, function (key) {
            var path = kraje[key];
            $(path).css("fill", kraje_soucet[key]["color"]).css("opacity", "0.8");
            $(path)
                .mouseenter(function (event) {
                    $(path).css("fill", kraje_soucet[key]["color"]).css("opacity", "1");
                    var infoel = $("#info-" + key);
                    if (infoel.length === 0) {
                        infoel = $("#kraje_map").append("<div id='info-" + key + "' style='position:absolute;left:0;top:0;background-color:white;border:1px solid black;'><strong>" + kraje_soucet[key]["krajNazev"] + "</strong><br/>Součet rozhodnuto: " + kraje_soucet[key]["soucet"] + "<br/>Součet spotřebováno: " + kraje_soucet[key]["soucetSpotrebovano"] + "<br/></div>");
                    }
                    infoel.show();
                })
                .mousemove(function (e) {
                    var xpos = e.offsetX === undefined ? e.originalEvent.layerX : e.offsetX;
                    var ypos = e.offsetY === undefined ? e.originalEvent.layerY : e.offsetY;
                    var infoel = $("#info-" + key);
                    if (infoel.length > 0)
                        infoel.css('left', xpos + 40).css('top', ypos);
                })
                .mouseout(function (event) {
                    $(path).css("fill", kraje_soucet[key]["color"]).css("opacity", "0.8");
                    var infoel = $("#info-" + key);
                    if (infoel.length > 0)
                        infoel.hide();
                });
        });

    });
</script>