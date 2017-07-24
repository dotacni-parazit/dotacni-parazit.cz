<?php
use Cake\I18n\Number;

$this->set('title', 'Podle sídla příjemce - Kraje / Státy');
$this->Html->script('datatable.js', ['block' => true]);
$this->Html->script('jquery-ui.min.js', ['block' => true]);
$this->Html->css('jquery-ui.min.css', ['block' => true]);
?>
<!--<img id="svgcontainer" src="/svg/cz_outline.svg">-->

<div id="tabs">
    <ul>
        <li><a href="#map">Mapové zobrazení</a></li>
        <li><a href="#list">Seznam krajů</a></li>
        <li><a href="#staty">Seznam států</a></li>
    </ul>
    <div id="map">
        <?php
        echo file_get_contents(WWW_ROOT . 'svg' . DS . 'cz_kraje_2.svg');
        ?>
    </div>
    <div id="list">
        <ul>
            <?php
            foreach ($kraje as $k) {
                echo '<li>' . $this->Html->link($k->krajNazev, "#") . '</li>';
            }
            ?>
        </ul>
    </div>
    <div id="staty">
        <table id="datatable">
            <thead>
            <tr>
                <th>Název státu</th>
                <th data-type="currency" class="nosearch">Součet rozhodnutých částek</th>
                <th data-type="currency" class="nosearch">Součet vyčerpaných částek</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($staty as $s) { ?>
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

    .kraj {
        fill: transparent;
    }

    .kraj:hover {
        fill: red;
    }
</style>
<script type="text/javascript">
    $(function () {
        $("#tabs").tabs({
            collapsible: true,
            active: <?= empty($name) ? '0' : '1' ?>
        });
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

        $.each(kraje, function (key) {
            var path = kraje[key];
            console.log(key + "::" + path);
            $(path)
                .mouseenter(function () {
                    $(path).css("fill", "red");
                })
                .mouseout(function () {
                    $(path).css("fill", "transparent");
                });
        });

    });
</script>