<?php
$this->set('title', 'Poskytovatelé');
?>

<form action="/">
    <div class="row top-15">
        <div class="col-sm-6 col-md-6 col-lg-9">
            <input name="query" placeholder="Zadejte Název nebo IČO"
                   style="width: 100%; border: 1px solid #AAA; font-size: 1.2em; padding: 0.5em;">
        </div>
        <div class="col-sm-4 col-md-4 col-lg-2">
            <select style="width: 100%; background: white; font-size: 1.2em; border: 1px solid #AAA; padding: 0.5em;"
                    name="type">
                <option value="1">Příjemce Dotací</option>
                <option value="2">Poskytovatel Dotací</option>
            </select>
        </div>
        <div class="col-1">
            <input type="submit" value="Hledat!"
                   style="background: #46223E; color: white; font-weight: bold; padding: 0.7em 1em; border-radius: 0 5px 5px 5px; border: 1px solid #9c4c8a;">
        </div>
    </div>
</form>
<hr style="margin: 15px 0 20px 0; border-color: #AAA;"/>


<div class="row homepage_row homepage">
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/podle-poskytovatelu">CEDR III - Dotační Úřady</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/podle-zdroje-financi">CEDR III - Zdroje Financování</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/dotacni-tituly">CEDR III - Dotační Tituly</a>
    </div>
</div>

<div class="row homepage_row homepage">
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/operacni-programy-mmr">CEDR III - Programy MMR</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/operacni-programy-cedr">CEDR III - Ostatní Programy</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/investicni-pobidky">Investiční Pobídky (CzechInvest)</a>
    </div>
</div>

<div class="row homepage_row homepage">
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/strukturalni-fondy-2007-2013">Strukturalni-Fondy.cz<br/>(2007-2013)</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/strukturalni-fondy-2014-2020">Strukturalni-Fondy.cz<br/>(2014-2020)</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/dotinfo">DotInfo.cz<br/><br/></a>
    </div>
</div>

<div class="row homepage_row homepage">
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/program-rozvoje-venkova">Státní Zemědělský Intervenční Fond</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/granty-praha">Hlavní Město Praha - Granty</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/poskytovatel-dotaci/jmeno">Podle Jména</a>
    </div>
</div>