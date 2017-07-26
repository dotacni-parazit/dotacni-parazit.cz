<?php
$this->set('title', 'Dotační tituly');
?>
<h2>Dynamický strom Dotačních Titulů</h2>
<div>Řazeno nejprve podle kapitol státního rozpočtu</div>
<input type="text" id="treesearch"/>
<div id="sourcestree"></div>
<?php
$tojson = [];

foreach ($data as $d) {
    if (isset($tojson[$d->statniRozpocetKapitolaKod])) continue;
    $out = [
        'text' => $d->statniRozpocetKapitolaKod . " :: " . $d->statniRozpocetKapitolaNazev
    ];
    if (!empty($d->ciselnik_dotace_titulv01)) {
        foreach ($d->ciselnik_dotace_titulv01 as $c) {
            $out['children'][] = [
                'text' => $c->dotaceTitulKod . " :: " . $c->dotaceTitulNazev . " (" . $c->zaznamPlatnostOdDatum->year . " - " . $c->zaznamPlatnostDoDatum->year . ")"
            ];
        }
    }
    $tojson[$d->statniRozpocetKapitolaKod] = $out;
}
?>
<script type="text/javascript">
    var sources = <?php echo json_encode(array_values($tojson)) ?>;
    var to = false;

    $(function () {
        $('#treesearch').keyup(function () {
            if(to) { clearTimeout(to); }
            to = setTimeout(function () {
                var v = $('#treesearch').val();
                $('#sourcestree').jstree(true).search(v);
            }, 250);
        });

        $("#sourcestree").jstree({
            'core': {
                'data': sources
            },
            'plugins': [
                'search'
            ],
            'search': {
                'show_only_matches': true,
                'case_insensitive': true
            }
        });
    });

</script>