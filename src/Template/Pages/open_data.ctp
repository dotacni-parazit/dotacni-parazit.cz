<?php
/**
 * @var AppView $this
 */

use App\View\AppView;

$this->set('title', 'OpenData');
?>
<style type="text/css">
    h2 {
        margin-top: 1em;
        margin-bottom: 1em;
    }

    .text {
        margin-left: 10px;
        padding-left: 10px;
        border-left: 2px solid #46223E;
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
    <li><a href="#parazit">O názvu "Dotační Parazit"</a></li>
    <li><a href="#dotace">O Dotacích</a></li>
    <li><a href="#downloads">Otevřená Data Ke Stažení</a></li>
    <li><a href="#concepts">Postupy při zacházení s daty</a></li>
    <li><a href="#vyhledavani">Nápověda k vyhledávání</a></li>
    <li><a href="#pravni-forma">Právní Forma a Společná Právní Forma</a></li>
    <li><a href="#presskit">Ke stažení pro novináře</a></li>
    <li><a href="#opensource">OpenSource licence</a></li>
</ul>
<hr/>

<h2 id="info">O Projektu</h2>
<div class="text">
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

<div class="text">
    Stručného průvodce prací s Dotačním Parazitem naleznete na Blogu, na adrese <a
            href="https://blog.dotacni-parazit.cz/2017/10/02/strucny-pruvodce-dotacnim-parazitem/">https://blog.dotacni-parazit.cz/2017/10/02/strucny-pruvodce-dotacnim-parazitem/</a>
    <br/>
    <br/>
    Pro správnou funkci stránek Dotační Parazit doporučujeme využívat prohlížeče <a
            href="https://www.mozilla.cz/stahnout/">Mozilla Firefox</a> nebo <a
            href="https://www.google.com/chrome/browser/desktop/index.html">Google Chrome</a>
</div>

<h2 id="parazit">O názvu "Dotační Parazit"</h2>

<div class="text">
    Název projektu je "Dotační Parazit", tento název má dvě vysvětlení
    <ol>
        <li>Projekt parazituje na otevřených datech státu o dotacích</li>
        <li>Projekt pomáhá najít příjemce pomoci, kteří parazitují na financích, které stát v dotacích alokuje</li>
    </ol>

    Je nutno říct, že rozhodně ne všichni, kteří jsou příjemci dotací, jsou zároveň parazity. Parazitem je příjemce,
    který peníze nevyužívá k obecnému prospěchu nebo naplnění veřejného zájmu.
    <br/>
    <br/>
    Z definice pojmu <a href="https://cs.wikipedia.org/wiki/Dotace">"Dotace" na Wikipedia</a> je zřejmé, že účelem
    dotace má být naplnění "veřejného zájmu". Pokud příjemce dotace peníze využívá k osobnímu prospěchu nebo naplnění
    osobních zájmů, které nejsou v souladu s veřejným zájmem, takový příjemce je "Parazitem" naší společnosti.
    <br/>
    <br/>
    Finance poskytnuté v dotačních programech jsou veřejnými penězmi, jsou to peníze z daní občanů a společností
    sídlících v České republice, takže je namístě očekávat transparentnost a možnost auditu vynakládání těchto
    prostředků.
    <br/>
    <br/>
    Náš projekt si neklade za cíl zobrazit nebo identifikovat pouze tyto "parazity", ale poskytnout jednoduchý způsob,
    jak v poskytnutých dotačních financích vyhledávat, jelikož tuto možnost občané České republiky doposud neměli. Nebo
    alespoň ne takto jednoduchou.
    <br/>
    <br/>
    Posouzení viny příjemce je otázkou následného správního nebo soudního řízení, příp. policejního šetření.
</div>

<h2 id="dotace">O dotacích</h2>

<div class="text">
    Je třeba rozlišovat, zda dotace zakládá veřejnou podporu, či nikoliv.<br/><br/>
    O veřejnou podporu se nejedná, pokud je příjemcem podpory státní instituce a jde o investici ve veřejném zájmu
    (výstavba dálnice, oprava kulturní památky apod.).<br/><br/>
    O veřejnou podporu se obvykle jedná pouze za podmínky, že příjemcem podpory je podnik (subjekt, který vykonává
    hospodářskou činnost, bez ohledu na svůj právní status a způsob svého financování) Podnikem se rozumí i organizace
    fungující na neziskové bázi. Poskytování veřejné podpory je nežádoucí pro fungování tržního prostředí, a proto je
    její použití upraveno v evropském právu. Pravidla pro poskytování veřejné podpory jsou definována ve Smlouvě o
    fungování Evropské unie (čl. 106 a čl. 107) a podrobně upravena v dalších předpisech.<br/><br/>
    Veřejná podpora je obecně zakázána. Její poskytnutí je možné tehdy, pokud se nalezne právní titul (výjimku) k jejímu
    legálnímu poskytnutí. Kromě výjimek vyplývajících přímo ze Smlouvy o fungování Evropské unie existují tyto tři druhy
    výjimek.<br/><br/>
    <h3>1. Blokové výjimky</h3>
    <ol type="a">
        <li>Regionální podpora</li>
        <li>Podpora malých a středních podniků (MSP)</li>
        <li>Podpora výzkumu, vývoje a inovací</li>
        <li>Podpora na vzdělávání</li>
        <li>Podpora pro znevýhodněné pracovníky a pracovníky se zdravotním postižením</li>
        <li>Podpora na ochranu životního prostředí</li>
        <li>Podpory na náhradu škod způsobených některými přírodními pohromami</li>
        <li>Podpora na širokopásmovou infrastrukturu</li>
        <li>Podpora kultury a zachování kulturního dědictví</li>
        <li>Podpora na sportovní a multifunkční rekreační infrastrukturu</li>
        <li>Podpora na místní infrastrukturu</li>
    </ol>
    Společnosti, které se snaží čerpat maximální množství dotací a naformulovat svůj projekt tak, aby splnili podmínky
    blokové výjimky, jsou pro nás dotační paraziti. Platí to zejména pro společnosti, které tvoří konsolidovaný holding
    a díky své velikosti nemusí v žádném rozsahu bojovat se znevýhodněním, kterým obvykle trpí malé a střední podniky.
    Jejich zisky nezůstávají na regionální úrovni, ale jsou transferovány do mateřské společnosti.<br/><br/>
    Samozřejmě primárním problémem je způsob, jakým jsou dotační tituly vypisovány, jejich výběr a následná
    administrace. Kontrolují se převážně formální náležitosti, ale nejde o splnění primárního účelu, za jakým byla
    bloková výjimka udělena.<br/><br/>
    <h3>2. Podpora de minimis</h3> - neboli podpora malého rozsahu může poskytovatel poskytnout jednomu podniku podporu
    na jakýkoli účel. Celková výše podpory de minimis, kterou členský stát poskytne jednomu podniku, nesmí za libovolná
    tři po sobě jdoucí jednoletá účetní období překročit 200 000 EUR.<br/><br/>
    Společnosti čerpající dotace v rámci režimu de minimis nejsou z našeho pohledu dotační paraziti.<br/><br/>
    Od členských států je požadováno, aby sledovaly poskytnuté podpory, a tím zajistily, že příslušné stropy nejsou
    překročeny a že pravidla kumulace jsou dodržena. Členské státy by měly zřídit centrální registr, který by obsahoval
    úplné informace o poskytnutých podporách de minimis a zajišťovat kontrolu, že žádné nové poskytnutí podpory
    nepřekračuje příslušný strop.<br/><br/>
    V České republice je tento požadavek splněn tím, že v gesci Ministerstva zemědělství je zřízen registr de minimis.
    Není jasné, proč dotace v režimu de minimis nejsou součástí CEDR (navržen jako centrální evidenční dotační registr).
    Ministerstvo zemědělství nepublikuje data registru de minimis (jedná se o neveřejný registr). Registr de minimis tak
    není součástí Dotačního parazita (s Ministerstvem zemědělství se snažíme domluvit na jeho zpřístupnění).<br/><br/>
    <h3>3. Služby v obecném hospodářském zájmu (SOHZ)</h3>
    SOHZ musí vykazovat odlišné vlastnosti v porovnání s běžnými ekonomickými činnostmi. To znamená, že jejich
    poskytování je odrazem existence tržního selhání, jinak by neexistoval důvod pro jejich poskytování, neboť by tyto
    činnosti mohl zabezpečovat sám trh. Podstatou tržního selhání je situace, kdy trh není schopen sám působit k tomu,
    aby určité služby byly nabízeny v požadované podobě a za ceny, které jsou kupující ochotni zaplatit. To znamená, že
    služby nejsou nabízeny vůbec, nebo jsou nabízeny za podmínek, které jsou sice výhodné pro jejich příjemce, ale
    nikoliv pro jejich poskytovatele.<br/><br/>
    Příklad: Poskytování sociálních služeb (maximální ceny za poskytnuté služby jsou regulovány vyhláškou, poskytování
    služeb se ekonomicky nevyplatí, je třeba je dotovat). Autobusová linka do míst s nízkým počtem cestujících
    (ekonomicky se provoz linky nevyplatí, pro jeho zachování je třeba dotace).<br/><br/>
    Společnosti poskytující služby obecného hospodářského zájmu, na jejichž provoz čerpají dotace, nejsou z našeho
    pohledu dotační paraziti.
</div>

<h2 id="downloads">Ke stažení</h2>

<div class="text">
    Pro transparentnost projektu jsou zde ke stažení originály souborů, ze kterých jsme vycházeli při stavbě Dotačního
    Parazita.
    <br/>
    O tom jak jsme zacházeli s daty při importu více v sekci <a href="#concepts">Postupy</a>
    <br/><br/>
    <ul>
        <li><a href="/downloads/pap.gz">MFČR PAP - Pomocný Analytický Přehled - Originál (pap.gz)</a></li>
        <li><a href="/downloads/pap_ico.sql.gz">MFČR PAP - Pomocný Analytický Přehled (pap_ico.sql.gz)</a></li>
        <li><a href="/downloads/CEDR_ORIGINAL/">Kompletní data CEDR v originální podobě (vždy aktuální verze) ve formátu
                "csv.gz"</a></li>
        <li><a href="/downloads/cedr.db.dump.sql.gz">Kompletní podoba databáze CEDR v Dotačním Parazitu, formát
                MysqlDump (cedr.db.dump.sql.gz)</a></li>
        <li><a href="/downloads/DotInfo.xlsx">Poslední verze dat DotInfo.cz (DotInfo.xlsx)</a></li>
        <li><a href="/downloads/DotInfo.utf8.csv">Poslední verze dat DotInfo.cz (DotInfo.utf8.csv)</a></li>
        <li><a href="/downloads/dotinfo.sql.gz">Poslední verze dat DotInfo.cz (dotinfo.sql.gz)</a></li>
        <li><a href="/downloads/strukturalniFondy2020.csv">Strukturální Fondy 2014-2020 (strukturalniFondy2020.csv)</a>
        </li>
        <li><a href="/downloads/strukturalniFondy2014-2020.sql.gz">Strukturální Fondy 2014-2020
                (strukturalniFondy2014-2020.sql.gz)</a>
        </li>
        <li><a href="/downloads/strukturalniFondy2007-2013.xlsx">Strukturální Fondy 2007-2013
                (strukturalniFondy2007-2013.xlsx)</a></li>
        <li><a href="/downloads/strukturalniFondy2007-2013.sql.gz">Strukturální Fondy 2007-2013
                (strukturalniFondy2007-2013.sql.gz)</a></li>

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

        <li><a href="/downloads/SZIF_SPD_2014.xlsx">SZIF SPD 2014 (xlsx) - nejnovější (verze 2)</a> <a href="/downloads/SZIF_SPD_2014.csv">(csv)</a></li>

        <li><a href="/downloads/SZIF_SPD_2015.xlsx">SZIF SPD 2015 (xlsx) - nejnovější (verze 3)</a> <a href="/downloads/SZIF_SPD_2015.csv">(csv)</a></li>

        <li><a href="/downloads/SZIF_SPD_2016.xlsx">SZIF SPD 2016 (xlsx) - nejnovější (verze 3)</a> <a href="/downloads/SZIF_SPD_2016.csv">(csv)</a></li>

        <li><a href="/downloads/PRV_2017.xlsx">SZIF SPD 2017 (xlsx) - nejnovější (verze 1)</a> <a href="/downloads/PRV_2017.csv">(csv)</a></li>

        <li><a href="/downloads/PRV_2018_v6.xlsx">SZIF SPD 2018 (xlsx) - nejnovější (verze 6)</a> <a href="/downloads/PRV_2018_v6.csv">(csv)</a></li>

        <li><a href="/downloads/PRV_2014.xls">SZIF SPD 2014 (verze 1)</a></li>
        <li><a href="/downloads/PRV_2015_2.xls">SZIF SPD 2015 (verze 2)</a></li>
        <li><a href="/downloads/PRV_2015.xls">SZIF SPD 2015 (verze 1)</a></li>
        <li><a href="/downloads/PRV_2016_2.xls">SZIF SPD 2016 (verze 2)</a></li>
        <li><a href="/downloads/PRV_2016.xls">SZIF SPD 2016 (verze 1)</a></li>
    </ul>
    <br/>
    Zároveň zdrojové kódy aplikace Dotační Parazit, včetně databázového schéma, budou zveřejněny na GitHub v repozitáři
    <a href="https://github.com/dotacni-parazit/dotacni-parazit.cz">https://github.com/dotacni-parazit/dotacni-parazit.cz</a>
</div>

<h2 id="concepts">Postupy</h2>

<div class="text">
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

<h2 id="vyhledavani">Nápověda k vyhledávání</h2>

<div class="text">
    Vyhledávání v aplikaci Dotační parazit je dvojího druhu
    <ol type="1">
        <li>Podle IČO - Pouze příjemci pomoci</li>
        <li>Podle Jména - Příjemci a Poskytovatelé</li>
    </ol>
    Pokud zadáte do hlavního vyhledávacího pole číslo, bude vyhledáváno podle IČO (pouze pro příjemce pomoci).
    <br/><br/>
    Vyhledávání podle jména:
    <ul>
        <li>Text v uvozovkách, bude hledán jako "přesná fráze", např. <a
                    href="https://dotacni-parazit.cz/poskytovatel-dotaci/jmeno?name=%22ministerstvo+%C5%A1kolstv%C3%AD%22">"ministerstvo
                školství"</a></li>
        <li>Slova prefixována znakem "-" budou vyloučena z výsledků, např. <a
                    href="https://dotacni-parazit.cz/poskytovatel-dotaci/jmeno?name=ministerstvo+-dopravy+-%C5%A1kolstv%C3%AD+-financ%C3%AD">ministerstvo
                -dopravy -školství -financí</a></li>
    </ul>
</div>

<h2 id="pravni-forma">(Společná) Právní Forma</h2>

<div class="text">
    Při klasifikaci příjemců v sekci <a href="/prijemce-dotaci/pravni-forma">Podle Právní Formy</a> jsme užili číselníku
    Právní Forma, který je k prohlédnutí vypsán na stránce <a href="/pravni-formy">Číselníky > Právní Formy</a>.
    <br/><br/>
    Zároveň jsme definovali Společnou Právní Formu, která sdružuje 113 právních forem dle evidence CEDR-III do 13 skupin
    <br/>
    Skupiny jsou vytvořeny takto:
    <ol id="spolecna-pravni-forma">
        <li>Církevní Instituce
            <ul>
                <li>703, C, Církev a církevní organizace</li>
                <li>721, CO, Církevní organizace</li>
            </ul>
        </li>
        <li>Fyzická Osoba Nepodnikatel
            <ul>
                <li>100, FO, Fyzická Osoba</li>
            </ul>
        </li>
        <li>Fyzická Osoba Podnikatel
            <ul>
                <li>101, FŽN, Fyzická osoba podnikající dle živnostenského zákona nezapsaná v obchodním rejstříku</li>
                <li>102, FŽZ, Fyzická osoba podnikající dle živnostenského zákona zapsaná v obchodním rejstříku</li>
                <li>103, FRN, Samostatně hospodařící rolník nezapsaný v obchodním rejstříku</li>
                <li>104, FRZ, Samostatně hospodařící rolník zapsaný v obchodním rejstříku</li>
                <li>105, FJN, Fyzická osoba podnikající dle jiných zákonů než živnostenského a zákona o zemědělství
                    nezapsaná v obchodním rejstříku
                </li>
                <li>106, FJZ, Fyzická osoba podnikající dle jiných zákonů než živnostenského a zákona o zemědělství
                    zapsaná v obchodním rejstříku
                </li>
                <li>107, ZPN, Zemědělský podnikatel - fyzická osoba nezapsaná v obchodním rejstříku</li>
                <li>108, ZPZ, Zemědělský podnikatel - fyzická osoba zapsaná v obchodním rejstříku</li>
                <li>150, FOP, Fyz. os. - podnikatelský subj.</li>
            </ul>
        </li>
        <li>Nezisková Organizace
            <ul>
                <li>116, ZáS, Zájmové Sdružení</li>
                <li>117, Nad, Nadace</li>
                <li>118, NaF, Nadační fond</li>
                <li>141, OPS, Obecně prospěšná společnost</li>
                <li>145, SVJ, Společenství vlastníků jednotek</li>
                <li>233, BDr, Bytové družstvo</li>
                <li>234, JDr, Jiné družstvo</li>
                <li>251, ZOD, Zájmová organizace družstev</li>
                <li>353, RDA, Rada pro veřejný dohled nad auditem</li>
                <li>361, VPI, Veřejně prospěšná instituce (2001)</li>
                <li>401, SMO, Sdružení mezinárodního obchodu</li>
                <li>442, ÚZO, Účelová zahraničně obchodní organizace</li>
                <li>701, Sdr, Sdružení (svaz, spolek, společnost, klub aj.)</li>
                <li>701, OPO, Obecně prospěšná organizace (humanitární)</li>
                <li>705, NO, Neziskové a podobné organizace (nadace)</li>
                <li>706, HZS, Podnik nebo hospodářské zařízení sdružení</li>
                <li>731, OJS, Organizační jednotka sdružení</li>
                <li>741, StO, Samosprávná stavovská organizace (profesní komora)</li>
                <li>745, Kom, Komora (hospodářská, agrární)</li>
                <li>751, ZSO, Zájmové sdružení právnických osob</li>
                <li>761, HoS, Honební společenstvo</li>
                <li>921, MOS, Mezinárodní organizace a sdružení</li>
                <li>922, OMP, Organizační jednotka organizace s mezinárodním prvkem</li>
            </ul>
        </li>
        <li>Právnická Osoba Podnikající
            <ul>
                <li>111, VOS, Veřejná obchodní společnost</li>
                <li>112, SRO, Společnost s ručením omezeným</li>
                <li>113, SKo, Společnost komanditní</li>
                <li>115, SpP, Společný podnik</li>
                <li>121, AS, Akciová společnost</li>
                <li>151, KB, Komoditní burza</li>
                <li>201, ZD, Zemědělské družstvo</li>
                <li>205, Dru, Družstvo</li>
                <li>231, VDr, Výrobní družstvo</li>
                <li>232, SDr, Spotřební družstvo</li>
                <li>241, DrP, Družstevní podnik (s jedním zakladatelem)</li>
                <li>242, SpP, Společný podnik (s více zakladateli)</li>
                <li>300, PRO, Práv. os. - podnikatelský subj</li>
                <li>301, SP, Státní podnik</li>
                <li>320, SP, Státní podnik</li>
                <li>330, DR, Družstvo</li>
                <li>352, SŽC, Správa železniční dopravní cesty, státní organizace</li>
                <li>352, ČD, České Dráhy</li>
                <li>501, OdZ, Odštěpný závod</li>
                <li>521, SDP, Samostatná drobná provozovna (obecního úřadu)</li>
                <li>531, OOJ, Oblastní organizační jednotka ČD</li>
                <li>532, ÚOJ, Účelová organizační jednotka ČD</li>
                <li>533, SOJ, Specializovaná organizační jednotka ČD</li>
                <li>705, HZS, Podnik nebo hospodářské zařízení sdružení</li>
                <li>931, ESd, Evropské hospodářské zájmové sdružení</li>
                <li>932, ESp, Evropská společnost</li>
                <li>933, Eds, Evropská družstevní společnost</li>
            </ul>
        </li>
        <li>Veřejná Instituce
            <ul>
                <li>314, ČKA, Česká konsolidační agentura</li>
                <li>321, RO, Rozpočtová organizace</li>
                <li>325, OSS, Organizační složka státu</li>
                <li>331, PO, Příspěvková organizace</li>
                <li>341, SHO, Státní hospodářská organizace řízená okresním úřadem</li>
                <li>343, ObP, Obecní podnik</li>
                <li>352, SŽC, Správa železniční dopravní cesty, státní organizace</li>
                <li>381, Fnd, Fond (ze zákona)</li>
                <li>400, RO, Rozpočtová organizace</li>
                <li>500, PO, Příspěvková organizace</li>
                <li>601, VŠ, Vysoká škola (veřejná, státní)</li>
                <li>771, DSO, Dobrovolný svazek obcí</li>
                <li>801, Obc, Obec (obecní úřad)</li>
                <li>801, Obc, Obec nebo městská část hlavního města Prahy</li>
                <li>802, Okr, Okresní úřad</li>
                <li>804, Krj, Kraj</li>
                <li>805, RRS, Regionální rada regionu soudržnosti</li>
                <li>901, ZOJ, Zastupitelský orgán jiných států</li>
                <li>941, ESU, Evropské seskupení pro územní spolupráci</li>
                <li>950, PMS, Právnická osoba podle mezinárodní smlouvy</li>
                <li>950, SPN, Subjekt právním řádem výslovně neupravený</li>
            </ul>
        </li>
        <li>Vzdělávací Instituce
            <ul>
                <li>601, VŠ, Vysoká škola (veřejná, státní)</li>
                <li>602, FVŠ, Fakulta vysoké školy</li>
                <li>603, JVŠ, Jiné pracoviště vysoké školy/fakulty</li>
                <li>611, SŠ, Střední škola</li>
                <li>621, ZŠ, Základní škola</li>
                <li>625, ŠZ, Školské zařízení</li>
                <li>631, PZa, Předškolní zařízení</li>
                <li>641, ŠPO, Školská právnická osoba</li>
                <li>661, VVI, Veřejná výzkumná instituce</li>
            </ul>
        </li>
        <li>Finanční Instituce
            <ul>
                <li>310, FIN, Fin. inst. (ČMZRB, PGRLF,EGAP)</li>
                <li>312, Ban, Banka-státní peněžní ústav</li>
                <li>313, ČNB, Česká národní banka</li>
                <li>431, BAS, Banka - akciová společnost</li>
                <li>435, PSP, Pojišťovna - státní podnik</li>
                <li>436, PAS, Pojišťovna - akciová společnost</li>
                <li>437, PDr, Pojišťovna - družstvo</li>
                <li>541, PF, Podílový, penzijní fond</li>
                <li>702, PSp, Pojišťovací spolek</li>
            </ul>
        </li>
        <li>Veřejnoprávní Média
            <ul>
                <li>911, ISt, Zahraniční kulturní, informační středisko, rozhlasová, tisková a televizní agentura</li>
                <li>361, VPI, Veřejnoprávní instituce (ČT,ČRo,ČTK)</li>
            </ul>
        </li>
        <li>Politická Strana
            <ul>
                <li>711, PoS, Politická strana, politické hnutí</li>
                <li>715, PPS, Podnik nebo hospodářské zařízení politické strany</li>
                <li>732, OJP, Organizační jednotka politické strany, politického hnutí</li>
            </ul>
        </li>
        <li>Zahraniční Osoba
            <ul>
                <li>421, ZOs, Zahraniční osoba</li>
                <li>421, ZOs, Zahraniční osoba (2001-2)</li>
            </ul>
        </li>
        <li>Zdravotnická Instituce
            <ul>
                <li>391, ZdP, Zdravotní pojišťovna</li>
                <li>651, ZdZ, Zdravotnické zařízení</li>
                <li>671, VNZ, Veřejné neziskové ústavní zdravotnické zařízení</li>
            </ul>
        </li>
        <li>Ostatní
            <ul>
                <li>0, neu, Zatím neurčeno</li>
                <li>950, PMS, Právnická osoba podle mezinárodní smlouvy</li>
                <li>950, SPN, Subjekt právním řádem výslovně neupravený</li>
                <li>999, OST, Ostatní</li>
            </ul>
        </li>
    </ol>
</div>

<h2 id="presskit">PressKit</h2>

<div class="text">
    <ul>
        <li><a href="/presskit/Dotacni-Parazit-Tiskova-Zprava-1.pdf">Tisková zpráva o spuštění projektu (3.10.2017)</a>
        </li>
        <li><a href="/presskit/logo.zip">Logo v různých formátech a velikostech (logo.zip)</a> - Vytvořil <a
                    href="https://tom-kurka.cz/">Tomáš Kůrka</a></li>
    </ul>
</div>

<h2 id="opensource">OpenSource</h2>

<div class="text">
    V projektu jsou využity následující Open-Source technologie:
    <ul>
        <li><a href="https://github.com/cakephp/cakephp">CakePHP (MIT License)</a></li>
        <li><a href="https://github.com/czgov/hlidacsmluv-dotace">Proxy k API Hlídače Smluv - Díky Josef Ludvíček (MIT
                License)</a></li>
        <li><a href="https://jquery.org/">jQuery a jQuery UI (MIT License)</a></li>
        <li><a href="https://github.com/DataTables/DataTables">jQuery DataTables (MIT License)</a></li>
        <li><a href="https://v4-alpha.getbootstrap.com/about/license/">Twitter Bootstrap v4</a></li>
        <li><a href="https://mariadb.com/kb/en/library/licensing-faq/">MariaDB (GPL v2)</a></li>
        <li><a href="https://secure.php.net/license/index.php">PHP 7 (PHP License v3.01)</a></li>
        <li><a href="https://en.wikipedia.org/wiki/Nginx">Nginx web-server (Simplified BSD License)</a></li>
        <li><a href="https://www.debian.org/legal/licenses/">Debian Linux OS (various licenses)</a></li>
    </ul>
</div>
