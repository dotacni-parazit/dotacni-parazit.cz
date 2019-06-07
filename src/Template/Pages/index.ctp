<?php
/**
 * @var AppView $this
 */

use App\View\AppView;

?>
<?php $this->set('title', 'Dotační Parazit'); ?>

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
        <a href="https://blog.dotacni-parazit.cz" target="_blank">Blog</a>
    </div>
    <div class="col-lg-4 col-sm-9 col-md-4">
        <a href="/vlastni-sestavy">Sestavy</a>
    </div>
</div>