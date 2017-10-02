<?php
$this->set('title', 'OpenData');
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


<ul>
    <li><a href="#info">O Projektu</a></li>
    <li><a href="#downloads">Ke Stažení</a></li>
    <li><a href="#"></a></li>
    <li><a href="#"></a></li>
</ul>
<hr/>

<h2>O Projektu</h2>
<div id="info">
    Dotační parazit je otevřená aplikace nad otevřenými daty ohledně poskytovaných dotací a investičních pobídek,
    spravovanými státními úřady.
    <br/>
    Cílem projektu je zpřístupnit na jednom místě co nejkomplexnější data ohledně způsobu poskytování dotací státu v
    České republice
    <br/>
    V Dotačním parazitovi je možné vyhledávat dotace jak z pohledu jejich poskytovatelů tak i příjemců. Můžete
    vyhledávat společnosti, které jsou na jedné straně příjemci dotací a pobídek a na druhé straně darují finanční
    prostředky politických stranám.
    <br/>
    Stejně tak můžete posoudit, jaké dotační tituly v minulosti vypsaly jednotlivé dotační úřady, jak se měnil celkový
    objem alokace těchto dotačních titulů v letech, nebo kdo jsou jejich největší příjemci.
    <br/>
    Vlastníkem a provozovatelem aplikace je nezávislý think tank <a href="https://goodgovernance.cz">Centrum of
        Excellence for Good Governance, z.s.</a>
</div>
