<style type="text/css">
    .SumoSelect.sumo_kapitolaStatnihoRozpoctu {
        width: 90%;
    }

    .SumoSelect.sumo_dotaceTitul {
        width: 90%;
    }
</style>
<script type="text/javascript">
    var kapitoly = <?= json_encode($kapitoly) ?>;
    var kapitoly_names = [];
    var kapitoly_years = [];
    for (var counter = 0; counter < kapitoly.length; counter++) {
        kapitola = kapitoly[counter];
        if (kapitoly_names[kapitola.statniRozpocetKapitolaKod] === undefined) {
            kapitoly_names[kapitola.statniRozpocetKapitolaKod] = kapitola.statniRozpocetKapitolaNazev;
        }
        if (kapitoly_years[kapitola.statniRozpocetKapitolaKod] === undefined) {
            kapitoly_years[kapitola.statniRozpocetKapitolaKod] = [];
        }
        kapitoly_years[kapitola.statniRozpocetKapitolaKod].push(kapitola.zaznamPlatnostDoDatum);

    }

    var tituly;
    var $filtr1, $filtr2;
    var $sumo1, $sumo2;

    $(document).ready(function () {
        $filtr1 = $("#filtr1");
        $filtr2 = $("#filtr2");
        $refreshbtn = $("#refresh");
        $refreshbtn.on('click', function () {
            $.ajax({
                url: "https://dotacni-parazit.cz/get-tituly-podle-kapitol",
                type: "POST",
                data: {
                    "kapitoly": $filtr1.val()
                },
                dataType: 'json'
            }).done(function (data) {
                tituly = data;
                $filtr2.find('option').remove();
                for (var counter = 0; counter < tituly.length; counter++) {
                    var titul = tituly[counter];
                    $filtr2.append($(new Option("(" + titul.dotaceTitulKod + ") " + titul.dotaceTitulNazev + " - (" + (new Date(titul.zaznamPlatnostOdDatum).getYear() + 1900) + "-" + (new Date(titul.zaznamPlatnostDoDatum).getYear() + 1900) + ")", titul.dotaceTitulKod)))
                }
                $sumo2.sumo.reload();
            });
        });
        for (var key in kapitoly_names) {
            $filtr1.append($(new Option("(" + key + ") " + kapitoly_names[key], key)));
        }
        $sumo1 = $filtr1.SumoSelect({
            placeholder: "Kapitoly státního rozpočtu",
            search: true
        });
        $sumo2 = $filtr2.SumoSelect({
            placeholder: "Dotační tituly dle vybraných kapitol",
            search: true
        });
    });
</script>
<div id="filtr_head">
    <button id="refresh">Aktualizovat podle výběru</button>
    <br/>
    <select id="filtr1" name="kapitolaStatnihoRozpoctu" multiple="multiple">
    </select>
    <br/>
    <select id="filtr2" name="dotaceTitul" multiple="multiple">
    </select>
</div>