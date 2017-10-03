<?php
$this->set('title', 'OpenData');
?>
<style type="text/css">
    h2 {
        margin-top: 1em;
        margin-bottom: 1em;
    }
</style>

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
    <li><a href="#info">Obecně O Projektu</a></li>
    <li><a href="#pruvodce">Stručný průvodce</a></li>
    <li><a href="#downloads">Otevřená Data Ke Stažení</a></li>
    <li><a href="#concepts">Postupy při zacházení s daty</a></li>
    <li><a href="#presskit">Ke stažení pro novináře</a></li>
</ul>
<hr/>

<h2 id="info">O Projektu</h2>
<div>
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

<h2 id="pruvodce">Průvodce</h2>

<div>
    Stručného průvodce prací s Dotačním Parazitem naleznete na Blogu, na adrese <a
            href="https://blog.dotacni-parazit.cz/2017/10/02/strucny-pruvodce-dotacnim-parazitem/">https://blog.dotacni-parazit.cz/2017/10/02/strucny-pruvodce-dotacnim-parazitem/</a>
</div>

<h2 id="downloads">Ke stažení</h2>

<div>
    Pro transparentnost projektu jsou zde ke stažení originály souborů, ze kterých jsme vycházeli při stavbě Dotačního
    Parazita.
    <br/>
    O tom jak jsme zacházeli s daty při importu více v sekci <a href="#concepts">Postupy</a>
    <br/><br/>
    <ul>
        <li><a href="/downloads/pap.gz">MFČR PAP - Pomocný Analytický Přehled - Originál (pap.gz)</a></li>
        <li><a href="/downloads/pap_ico.sql.gz">MFČR PAP - Pomocný Analytický Přehled (pap_ico.sql.gz)</a></li>
        <li><a href="/downloads/CEDR_7Z/">Kompletní data CEDR v originální podobě (vždy aktuální verze) ve formátu
                "csv.7z"</a></li>
        <li><a href="/downloads/cedr.db.dump.sql.gz">Kompletní podoba databáze CEDR v Dotačním Parazitu, formát
                MysqlDump (cedr.db.dump.sql.gz)</a></li>
        <li><a href="/downloads/DotInfo.utf8.csv">Poslední verze dat DotInfo.cz (DotInfo.utf8.csv)</a></li>
        <li><a href="/downloads/dotinfo.sql.gz">Poslední verze dat DotInfo.cz (dotinfo.sql.gz)</a></li>
        <li><a href="/downloads/strukturalniFondy2020.csv">Strukturální Fondy 2014-2020 (strukturalniFondy2020.csv)</a>
        </li>
        <li><a href="/downloads/strukturalniFondy2014-2020.sql.gz">Strukturální Fondy 2014-2020
                (strukturalniFondy2014-2020.sql.gz)</a>
        </li>
        <li><a href="/downloads/strukturalniFondy2007-2013.xlsx">Strukturální Fondy 2007-2013
                (strukturalniFondy2007-2013.xlsx)</a></li>
        <li><a href="/downloads/strukturalniFondy2007-2013.sql">Strukturální Fondy 2007-2013
                (strukturalniFondy2007-2013.sql)</a></li>

        <li><a href="/downloads/investicniPobidky-CzechInvest.xls">Investiční Pobídky - Czech Invest
                (investicniPobidky-CzechInvest.xls)</a></li>
        <li><a href="/downloads/investicniPobidkyCzechInvest.sql.gz">Investiční Pobídky - Czech Invest
                (investicniPobidkyCzechInvest.sql.gz)</a></li>
        <li><a href="/konsolidace-holdingy">Konsolidovaní Příjemci Dotací</a> - Výroční zprávy holdingů, pro účely
            konsolidace společností a hledání příjemců dotací, najdete v detailu jednotlivých holdingů
        </li>
        <li><a href="/dary-politickym-stranam">Dotace Dárců Politických Stran</a> - Výroční zprávy politických stran,
            pro účely hledání příjemců dotací, kteří jsou dárci politických subjektů, najdete v detailu jednotlivých
            politických stran
        </li>
        <li><a href="/downloads/konsolidace.sql.gz">Aktuální stav databáze konsolidací holdingů/dceřinných společností a
                darů právnických osob politickým stranám (konsolidace.sql.gz)</a></li>
    </ul>
    <br/>
    Zároveň zdrojové kódy aplikace Dotační Parazit, včetně databázového schéma, budou zveřejněny na GitHub v repozitáři
    <a href="https://github.com/dotacni-parazit/dotacni-parazit.cz">https://github.com/dotacni-parazit/dotacni-parazit.cz</a>
</div>

<h2 id="concepts">Postupy</h2>

<div>
    Obecně
    <ul>
        <li>Data CEDR je nejcitlivější a největší databází, data nebyla upravena, pouze doplněna (viz. níže)</li>
        <li>Data ostatních evidencí (MMR Strukturální Fondy, CzechInvest, DotInfo.cz) byla manuálně upravena a
            doplněna
        </li>
        <li>Data jsou zobrazována v úplné podobě, pokud je to možné, jedinou operací je agregace dat (např. součty
            částek, období, území), data nejsou při zobrazování jakkoli jinak upravována
        </li>
        <li>Transparentnost a důvěryhodnost dat je pro nás na prvním místě, takže jsou k dispozici jak originály dat,
            tak SQL exporty, tak přístup do PhpMyAdmin (na požádání na info@dotacni-parazit.cz)
        </li>
        <li>O spolehlivosti zobrazených součtů (např. za území nebo období) může vypovídat <a href="/db-statistiky">statistika
                databáze</a>, kde je vidět, zda např. v jakém procentu případů má Příjemce Pomoci uvedenou obec
            (AdresaSidlo)
        </li>
    </ul>
    Data CEDR
    <ul>
        <li>Data jsou importována v úplné podobě, z formátu CSV do MySQL databáze ("cedr")</li>
        <li>
            Jsou provedeny pouze 2 modifikace importovaných dat
            <ul>
                <li>Před importem jsou sloupce s hodnotou true/false nahrazeny hodnotou 1/0 kvůli MySQL konvenci
                    BOOL/TINYINT(1) sloupce
                </li>
                <li>Po importu jsou vygenerovány hodnoty sloupců "CiselnikOkresv01.krajNadKod",
                    "CiselnikObecv01.okresNadKod", aby bylo možné data párovat v MySQL (např. pro sekci <a
                            href="https://dotacni-parazit.cz/podle-sidla-prijemce">Podle Sídla Příjemce</a>)
                </li>
            </ul>
        </li>
        <li>Veškerá ostatní data zobrazená v aplikaci jsou uložena v druhé databázi ("cedr_custom")</li>
    </ul>
    Data DotInfo.cz, Strukturální Fondy, CzechInvest Investiční Pobídky, MFČR PAP ("cedr_custom")
    <ul>
        <li>Data jsme museli manuálně konvertovat z původních formátů (XLS, PSV, ...), u těchto dat je bohužel nemožné
            zaručit kompletní správnost a integritu
        </li>
        <li>Pro transparentnost jsou ke stažení jak originály souborů, ze kterých jsme při vytváření databáze vycházeli,
            tak exporty aktuální podoby v SQL
        </li>
        <li>Data DotInfo.cz jsou asi nejhorší databází, museli jsme manuálně smazat vadné řádky z CSV souboru (viz.
            výše), na lepším exportu se pracuje
        </li>
        <li>Data investičních pobídek CzechInvest jsme manuálně doplnili o chybějící IČO, kde nám CzechInvest data
            nedoplnil na požádání
        </li>
        <li>MFČR PAP je importovano v úplné podobě (4,421,520 řádků), je doplněno o sloupce párující PAP s daty o
            příjemcích a dotacích v CEDR
        </li>
    </ul>
    Konsolidované společnosti a dary politickým stranám
    <ul>
        <li>Data pro tyto sekce byly manuálně vytvořeny týmem GoodGovernance skrze datovou administraci</li>
        <li>Výchozími pro tato data byly výroční zprávy politických stran a holdingů</li>
        <li>Data jsou k dispozici ke stažení v podobě SQL a jako PDF v detailu politických stran nebo holdingů (viz. <a
                    href="#downloads">Ke stažení</a>)
        </li>
    </ul>
</div>

<h2 id="presskit">PressKit</h2>

<div>
   <ul>
       <li><a href="/presskit/Dotacni-Parazit-Tiskova-Zprava-1.pdf">Tisková zpráva o spuštění projektu (3.10.2017)</a></li>
       <li><a href="/presskit/logo.zip">Logo v různých formátech a velikostech (logo.zip)</a> - Vytvořil <a href="https://tom-kurka.cz/">Tomáš Kůrka</a></li>
   </ul>
</div>