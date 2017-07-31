<?php

use Cake\I18n\Number;

$this->set('title', 'Podle sídla příjemce');
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
        <br/>
        <input type="checkbox" id="kraje_opacity" value="Vypnout průhlednost">Vypnout průhlednost
        <br/>
    </div>
    <div id="okresy_list" style="width: 100%;">
        <table class="datatable datatable_simple">
            <thead>
            <tr>
                <th>Název okresu</th>
                <th class="nosearch" data-type="currency" style="text-align: right;">Součet částek rozhodnutých</th>
                <th class="nosearch" data-type="currency" style="text-align: right;">Součet částek spotřebovaných</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($okresy as $o) { ?>
                <tr>
                    <td><?= $this->Html->link($o->okresNazev, '/detail-okres/' . $o->okresKod) ?></td>
                    <td style="text-align: right;"><?= Number::currency($okresy_soucet[$o->id]->soucet) ?></td>
                    <td style="text-align: right;"><?= Number::currency($okresy_soucet[$o->id]->soucetSpotrebovano) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název okresu</td>
                <td style="text-align: right;">Součet částek rozhodnutých</td>
                <td style="text-align: right;">Součet částek spotřebovaných</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="okresy_map">
        <?php
        echo file_get_contents(WWW_ROOT . 'svg' . DS . 'cz_districts.svg');
        ?>
        <br/>
        <input type="checkbox" id="okresy_opacity" value="Vypnout průhlednost">Vypnout průhlednost
        <br/>
    </div>
    <div id="obce_list" style="width: 100%;">
        <table class="datatable">
            <thead>
            <tr>
                <th>Název obce</th>
                <th class="nosearch" data-type="currency" style="text-align: right;">Součet částek rozhodnutých</th>
                <th class="nosearch" data-type="currency" style="text-align: right;">Součet částek spotřebovaných</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($obce as $o) { ?>
                <tr>
                    <td><?= $this->Html->link($o->obecNazev, '/detail-obce/' . $o->obecKod) ?></td>
                    <td style="text-align: right;"><?= Number::currency($obce_soucet[$o->id]->soucet) ?></td>
                    <td style="text-align: right;"><?= Number::currency($obce_soucet[$o->id]->soucetSpotrebovano) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název obce</td>
                <td style="text-align: right;">Součet částek rozhodnutých</td>
                <td style="text-align: right;">Součet částek spotřebovaných</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="kraje_list" style="width: 100%;">
        <table id="datatable2" class="datatable_simple">
            <thead>
            <tr>
                <th>Název Kraje</th>
                <th data-type="currency" class="nosearch" style="text-align: right;">Součet rozhodnutých částek</th>
                <th data-type="currency" class="nosearch" style="text-align: right;">Součet spotřebovaných částek</th>
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
                <td style="text-align: right;">Součet rozhodnutých částek</td>
                <td style="text-align: right;">Součet spotřebovaných částek</td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div id="staty_list" style="width: 100%;">
        <table id="datatable">
            <thead>
            <tr>
                <th>Název státu</th>
                <th data-type="currency" class="nosearch" style="text-align: right;">Součet rozhodnutých částek</th>
                <th data-type="currency" class="nosearch" style="text-align: right;">Součet vyčerpaných částek</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($staty as $s) { ?>
                <tr>
                    <td><?= $this->Html->link($s->statNazev, '/detail-statu/' . $s->statKod3Znaky) ?></td>
                    <td style="text-align: right;"><?= Number::currency($soucet_staty[$s->id]) ?></td>
                    <td style="text-align: right;"><?= Number::currency($soucet_staty_spotrebovano[$s->id]) ?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td>Název státu</td>
                <td style="text-align: right;">Součet rozhodnutých částek</td>
                <td style="text-align: right;">Součet vyčerpaných částek</td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<style type="text/css">
    svg#czech_districts_by_frettie g#okresy path {
        opacity: 1;
        fill-opacity: 1;
    }
</style>
<script type="text/javascript">

    var kraje_soucet = {
        "zapadocesky": {
            "soucet": "<?= Number::currency($kraje_data[34]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[34]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[34]->color ?>",
            "krajNazev": "<?= $kraje_data[34]->krajNazev ?>",
            "krajKod": 34
        },
        "jihocesky": {
            "soucet": "<?= Number::currency($kraje_data[33]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[33]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[33]->color ?>",
            "krajNazev": "<?= $kraje_data[33]->krajNazev ?>",
            "krajKod": 33
        },
        "jihomoravsky": {
            "soucet": "<?= Number::currency($kraje_data[37]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[37]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[37]->color ?>",
            "krajNazev": "<?= $kraje_data[37]->krajNazev ?>",
            "krajKod": 37
        },
        "severocesky": {
            "soucet": "<?= Number::currency($kraje_data[35]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[35]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[35]->color ?>",
            "krajNazev": "<?= $kraje_data[35]->krajNazev ?>",
            "krajKod": 35
        },
        "severomoravsky": {
            "soucet": "<?= Number::currency($kraje_data[38]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[38]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[38]->color ?>",
            "krajNazev": "<?= $kraje_data[38]->krajNazev ?>",
            "krajKod": 38
        },
        "stredocesky": {
            "soucet": "<?= Number::currency($kraje_data[32]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[32]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[32]->color ?>",
            "krajNazev": "<?= $kraje_data[32]->krajNazev ?>",
            "krajKod": 32
        },
        "vychodocesky": {
            "soucet": "<?= Number::currency($kraje_data[36]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[36]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[36]->color ?>",
            "krajNazev": "<?= $kraje_data[36]->krajNazev ?>",
            "krajKod": 36
        },
        "praha": {
            "soucet": "<?= Number::currency($kraje_data[31]->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($kraje_data[31]->soucet_spotrebovano) ?>",
            "color": "<?= $kraje_data[31]->color ?>",
            "krajNazev": "<?= $kraje_data[31]->krajNazev ?>",
            "krajKod": 31
        }
    };

    var okresy_soucet = {
        <?php foreach($okresy_soucet as $okres) {?>
        "<?= $okres->okresKod ?>": {
            "soucet": "<?= Number::currency($okres->soucet) ?>",
            "soucetSpotrebovano": "<?= Number::currency($okres->soucetSpotrebovano) ?>",
            "color": "<?= $okres->color ?>",
            "okresNazev": "<?= $okres->okresNazev ?>",
            "okresKod": "<?= $okres->okresKod ?>"
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

    var enable_opacity_kraje = false;
    var enable_opacity_okresy = false;

    $(function () {

        $("#kraje_opacity").on('change', function () {
            var checked = $(this).is(":checked");
            enable_opacity_kraje = !checked;
            $.each(kraje, function (key) {
                var path = kraje[key];
                if (enable_opacity_kraje)
                    $(path, $("#svgmapy")).css("fill", kraje_soucet[key]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");
                else
                    $(path, $("#svgmapy")).css("fill", kraje_soucet[key]["color"]).css("opacity", "1").css("fill-opacity", "1");
            });
        });
        enable_opacity_kraje = !$("#kraje_opacity").is(":checked");
        $("#okresy_opacity").on('change', function () {
            var checked = $(this).is(":checked");
            enable_opacity_okresy = !checked;
            $.each(okresy, function (key) {
                var path = "#" + key;
                var id = okresy[key];
                if (enable_opacity_okresy)
                    $(path, $("#czech_districts_by_frettie g#okresy")).css("fill", okresy_soucet[id]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");
                else
                    $(path, $("#czech_districts_by_frettie g#okresy")).css("fill", okresy_soucet[id]["color"]).css("opacity", "1").css("fill-opacity", "1");
            });
        });
        enable_opacity_okresy = !$("#okresy_opacity").is(":checked");

        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });

        $.each(kraje, function (key) {
            var path = kraje[key];
            if (enable_opacity_kraje) {
                $(path, $("#svgmapy")).css("fill", kraje_soucet[key]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");
            } else {
                $(path, $("#svgmapy")).css("fill", kraje_soucet[key]["color"]).css("opacity", "1").css("fill-opacity", "1");
            }
            $(path, $("#svgmapy"))
                .mouseenter(function (event) {
                    $(path, $("#svgmapy")).css("fill", kraje_soucet[key]["color"]).css("opacity", "1").css("fill-opacity", "1");
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
                    if (infoel.length > 0) {
                        infoel.css('left', xpos + 40).css('top', ypos);
                    }
                })
                .mouseout(function (event) {
                    if (enable_opacity_kraje) {
                        $(path, $("#svgmapy")).css("fill", kraje_soucet[key]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");
                    }
                    var infoel = $("#info-" + key);
                    if (infoel.length > 0) {
                        infoel.hide();
                    }
                })
                .click(function (e) {
                    e.preventDefault();
                    if (e.ctrlKey) {
                        window.open('/detail-kraje/' + kraje_soucet[key]["krajKod"], '_blank')
                    } else {
                        window.location.href = '/detail-kraje/' + kraje_soucet[key]["krajKod"];
                    }
                });
        });

        $.each(okresy, function (key) {
            var path = "#" + key;
            var id = okresy[key];
            if (enable_opacity_okresy) {
                $(path, $("#czech_districts_by_frettie g#okresy")).css("fill", okresy_soucet[id]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");
            }

            $(path, $("#czech_districts_by_frettie g#okresy"))
                .mouseenter(function (event) {
                    $(path, $("#czech_districts_by_frettie g#okresy")).css("fill", okresy_soucet[id]["color"]).css("opacity", "1").css("fill-opacity", "1");
                    var infoel = $("#info-okres-" + key, $("#okresy_map"));
                    if (infoel.length === 0) {
                        infoel = $("#okresy_map").append("<div id='info-okres-" + key + "' style='padding:10px;position:absolute;left:0;top:0;background-color:white;border:1px solid black;'><strong>" + okresy_soucet[id]["okresNazev"] + "</strong><br/>Součet rozhodnuto: " + okresy_soucet[id]["soucet"] + "<br/>Součet spotřebováno: " + okresy_soucet[id]["soucetSpotrebovano"] + "<br/></div>");
                    }
                    infoel.show();
                })
                .mousemove(function (e) {
                    var xpos = (e.offsetX || (event.pageX - $(event.target).offset().left));
                    var ypos = (e.offsetY || (event.pageY - $(event.target).offset().top));
                    var infoel = $("#info-okres-" + key, $("#okresy_map"));
                    if (infoel.length > 0) {
                        infoel.css('left', xpos + 40).css('top', ypos);
                    }
                })
                .mouseout(function (event) {
                    if (enable_opacity_okresy) {
                        $(path, $("#czech_districts_by_frettie g#okresy")).css("fill", okresy_soucet[id]["color"]).css("opacity", "0.8").css("fill-opacity", "0.8");
                    }
                    var infoel = $("#info-okres-" + key, $("#okresy_map"));
                    if (infoel.length > 0) {
                        infoel.hide();
                    }
                })
                .click(function (e) {
                    e.preventDefault();
                    if (e.ctrlKey) {
                        window.open('/detail-okres/' + id, '_blank')
                    } else {
                        window.location.href = '/detail-okres/' + id;
                    }
                });
        });

    });
</script>