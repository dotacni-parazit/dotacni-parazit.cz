<?php
$this->set('title', 'Příjemci Pomoci');
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
        <a href="/fyzicke-osoby">Fyzické Osoby Nepodnikatelé</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/prijemce-dotaci/ico">Podle IČO</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/prijemce-dotaci/jmeno">Podle Jména</a>
    </div>
</div>

<div class="row homepage_row homepage">
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/prijemce-dotaci/pravni-forma">Podle Právní Formy</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/podle-sidla-prijemce">Podle Sídla Příjemce</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/dary-politickym-stranam">Dotace Dárců Politických Stran</a>
    </div>
</div>

<div class="row homepage_row homepage">
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/konsolidace-holdingy">Konsolidovaní Příjemci Dotací</a>
    </div>
</div>