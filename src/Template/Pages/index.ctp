<?php $this->set('title', 'Dotační Parazit'); ?>

<form>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-9">
            <input name="query" placeholder="Zadejte Název nebo IČO" style="width: 100%; font-size: 1em; padding: 0.5em;">
        </div>
        <div class="col-sm-4 col-md-4 col-lg-2">
            <select style="width: 100%; background: white; font-size: 1.2em; padding: 0.5em;" name="type">
                <option value="1">Příjemce Dotací</option>
                <option value="2">Poskytovatel Dotací</option>
            </select>
        </div>
        <div class="col-1">
            <input type="submit" value="Hledat!" style="background: white; padding: 0.5em;">
        </div>
    </div>
</form>
<hr/>

<div class="row">
    <div class="col">
        <h2>Základní</h2>
    </div>
</div>

<div class="row homepage_row homepage">
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/podle-prijemcu">Příjemci</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/podle-poskytovatelu/index">Poskytovatelé</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/ciselniky">Číselníky</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Informace</h2>
    </div>
</div>

<div class="row homepage_row homepage">
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/opendata">OpenData</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="https://blog.dotacni-parazit.cz">Blog</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/vlastni-sestavy">Sestavy</a>
    </div>
</div>