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

    var okresy_soucet = {
        <?php foreach($okresy_soucet as $okres) {?>
        "<?= $okres->okresKod ?>": {
            "soucet": "<?= Number::currency($okres->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($okres->soucetSpotrebovano) ?>",
            "color": "<?= $okres->color ?>",
            "okresNazev": "<?= $okres->okresNazev ?>"
        },
        <?php } ?>
    };

    // cz_kraje_2.svg
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

    // cz_districts.svg
    var okresy = {
        "trebic": "3710",
        "usti_nad_orlici": "3611",
        "bruntal": "3801",
        "karlovy_vary": "3403",
        "melnik": "3206",
        "jablonec_nad_nisou": "3504",
        "pribram": "3211",
        "kromeriz": "3708",
        "plzen": "3405",
        "vsetin": "3810",
        "decin": "3502",
        "cheb": "3402",
        "rakovnik": "3212",
        "zlin": "3705",
        "pelhrimov": "3304",
        "svitavy": "3609",
        "praha-zapad": "3210",
        "blansko": "3701",
        "prachatice": "3306",
        "liberec": "3505",
        "havlickuv_brod": "3601",
        "benesov": "3201",
        "hradec_kralove": "3602",
        "ceska_lipa": "3501",
        "rokycany": "3408",
        "hodonin": "3706",
        "zdar_nad_sazavou": "3714",
        "praha-vychod": "3209",
        "karvina": "3803",
        "nachod": "3605",
        "semily": "3608",
        "litomerice": "3506",
        "ceske_budejovice": "3301",
        "kolin": "3204",
        "beroun": "3202",
        "olomouc": "3805",
        "domazlice": "3401",
        "jihlava": "3707",
        "kutna_hora": "3205",
        "sokolov": "3409",
        "ostrava": "3807",
        "jesenik": "3811",
        "cesky_krumlov": "3302",
        "mlada_boleslav": "3207",
        "plzen-jih": "3406",
        "novy_jicin": "3804",
        "jindrichuv_hradec": "3303",
        "trutnov": "3610",
        "frydek-mistek": "3802",
        "sumperk": "3809",
        "brno-venkov": "3703",
        "most": "3508",
        "pisek": "3305",
        "jicin": "3604",
        "chrudim": "3603",
        "nymburk": "3208",
        "tachov": "3410",
        "teplice": "3509",
        "plzen-sever": "3407",
        "kladno": "3203",
        "pardubice": "3606",
        "klatovy": "3404",
        "vyskov": "3712",
        "chomutov": "3503",
        "opava": "3806",
        "znojmo": "3713",
        "louny": "3507",
        "praha": "3100",
        "prostejov": "3709",
        "uherske_hradiste": "3711",
        "strakonice": "3307",
        "breclav": "3704",
        "usti_nad_labem": "3510",
        "prerov": "3808",
        "rychnov_nad_kneznou": "3607",
        "tabor": "3308",
        "brno": "3702"
    };

    $(function () {
        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });

        $.each(kraje, function (key) {
            var path = kraje[key];
            $(path).css("fill", kraje_soucet[key]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");
            $(path)
                .mouseenter(function (event) {
                    $(path).css("fill", kraje_soucet[key]["color"]).css("opacity", "1").css("fill-opacity", "1");
                    var infoel = $("#info-" + key);
                    if (infoel.length === 0) {
                        infoel = $("#kraje_map").append("<div id='info-" + key + "' style='padding:10px;position:absolute;left:0;top:0;background-color:white;border:1px solid black;'><strong>" + kraje_soucet[key]["krajNazev"] + "</strong><br/>Součet rozhodnuto: " + kraje_soucet[key]["soucet"] + "<br/>Součet spotřebováno: " + kraje_soucet[key]["soucetSpotrebovano"] + "<br/></div>");
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
                    $(path).css("fill", kraje_soucet[key]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");
                    var infoel = $("#info-" + key);
                    if (infoel.length > 0)
                        infoel.hide();
                });
        });

        $.each(okresy, function (key) {
            var path = "#" + key;
            var id = okresy[key];
            $(path, $("#okresy")).css("fill", okresy_soucet[id]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");

            $(path, $("#okresy"))
                .mouseenter(function (event) {
                    $(path).css("fill", okresy_soucet[id]["color"]).css("opacity", "1").css("fill-opacity", "1");
                    var infoel = $("#info-okres-" + key, $("#okresy_map"));
                    if (infoel.length === 0) {
                        infoel = $("#okresy_map").append("<div id='info-okres-" + key + "' style='padding:10px;position:absolute;left:0;top:0;background-color:white;border:1px solid black;'><strong>" + okresy_soucet[id]["okresNazev"] + "</strong><br/>Součet rozhodnuto: " + okresy_soucet[id]["soucet"] + "<br/>Součet spotřebováno: " + okresy_soucet[id]["soucetSpotrebovano"] + "<br/></div>");
                    }
                    infoel.show();
                })
                .mousemove(function (e) {
                    var xpos = e.offsetX === undefined ? e.originalEvent.layerX : e.offsetX;
                    var ypos = e.offsetY === undefined ? e.originalEvent.layerY : e.offsetY;
                    var infoel = $("#info-okres-" + key, $("#okresy_map"));
                    if (infoel.length > 0)
                        infoel.css('left', xpos + 40).css('top', ypos);
                })
                .mouseout(function (event) {
                    $(path, $("#okresy")).css("fill", okresy_soucet[id]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");
                    var infoel = $("#info-okres-" + key, $("#okresy_map"));
                    if (infoel.length > 0)
                        infoel.hide();
                });
        });

    });
</script>