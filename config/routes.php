<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(\Cake\Routing\Route\InflectedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'index']);
    // ciselniky a rozpoctove obdobi
    $routes->connect('/db-statistiky', ['controller' => 'Pages', 'action' => 'statistics']);
    $routes->connect('/ciselniky', ['controller' => 'Pages', 'action' => 'ciselniky']);
    $routes->connect('/operacni-programy-cedr', ['controller' => 'Pages', 'action' => 'cedrOperacniProgramy']);
    $routes->connect('/operacni-programy-mmr', ['controller' => 'Pages', 'action' => 'mmrOperacniProgramy']);
    $routes->connect('/financni-zdroje', ['controller' => 'Pages', 'action' => 'financniZdroje']);
    $routes->connect('/pravni-formy', ['controller' => 'Pages', 'action' => 'pravniFormy']);
    $routes->connect('/kapitoly-statniho-rozpoctu', ['controller' => 'Pages', 'action' => 'kapitolyStatnihoRozpoctu']);
    $routes->connect('/dotacni-tituly', ['controller' => 'Pages', 'action' => 'dotacniTituly']);
    // Finalni vystupy
    $routes->connect('/fyzicke-osoby', ['controller' => 'Pages', 'action' => 'fyzickeOsoby']);
    $routes->connect('/fyzicke-osoby/ajax', ['controller' => 'Pages', 'action' => 'fyzickeOsobyAjax']);

    $routes->connect('/podle-poskytovatelu/index', ['controller' => 'Pages', 'action' => 'podlePoskytovateluIndex']);
    $routes->connect('/podle-poskytovatelu', ['controller' => 'Pages', 'action' => 'podlePoskytovatelu']);
    $routes->connect('/podle-poskytovatelu/:id', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetail'], ['id' => '\d+']);
    $routes->connect('/podle-poskytovatelu/:id/rok/:year', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetailRok'], ['id' => '\d+', 'year' => '\d+']);
    $routes->connect('/podle-poskytovatelu/:id/complete', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetailComplete'], ['id' => '\d+']);
    $routes->connect('/podle-poskytovatelu/:id/complete/ajax', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetailCompleteAjax'], ['id' => '\d+']);
    $routes->connect('/podle-poskytovatelu/:id/complete/ajax/:year', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetailCompleteAjax'], ['id' => '\d+', 'year' => '\d+']);

    $routes->connect('/podle-prijemcu/', ['controller' => 'Pages', 'action' => 'podlePrijemcuIndex']);
    $routes->connect('/prijemce-dotaci/ico', ['controller' => 'Pages', 'action' => 'prijemceDotaciIco']);
    $routes->connect('/prijemce-dotaci/jmeno', ['controller' => 'Pages', 'action' => 'prijemceDotaciJmeno']);
    $routes->connect('/prijemce-dotaci/pravni-forma', ['controller' => 'Pages', 'action' => 'prijemceDotaciPravniForma']);
    $routes->connect('/podle-prijemcu/multiple/:ico', ['controller' => 'Pages', 'action' => 'detailPrijemceMulti'], ['ico' => '[0-9\, ]+']);

    $routes->connect('/podle-zdroje-financi', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanci']);
    $routes->connect('/podle-zdroje-financi/:kod', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciDetail'], ['kod' => '[tz0-9]{2,5}']);
    $routes->connect('/podle-zdroje-financi/:kod/rok/:year', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciDetailRok'], ['kod' => '[tz0-9]{2,5}', 'year' => '\d+']);
    $routes->connect('/podle-zdroje-financi/:kod/complete', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciDetailComplete'], ['kod' => '[tz0-9]{2,5}']);
    $routes->connect('/podle-zdroje-financi/:kod/complete/ajax/:year', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciCompleteAjax'], ['kod' => '[tz0-9]{2,5}', 'year' => '\d+']);
    $routes->connect('/podle-zdroje-financi/:kod/complete/ajax', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciCompleteAjax'], ['kod' => '[tz0-9]{2,5}']);

    $routes->connect('/podle-sidla-prijemce', ['controller' => 'Pages', 'action' => 'podleSidlaPrijemce']);

    $routes->connect('/detail-prijemce-pomoci/:id', ['controller' => 'Pages', 'action' => 'detailPrijemcePomoci'], ['id' => '[a-zA-Z0-9]+']);
    $routes->connect('/detail-dotace/:id', ['controller' => 'Pages', 'action' => 'detailDotace'], ['id' => '[a-zA-Z0-9]+']);
    $routes->connect('/detail-rozhodnuti/:id', ['controller' => 'Pages', 'action' => 'detailRozhodnuti'], ['id' => '[a-zA-Z0-9]+']);
    $routes->connect('/detail-statu/:id', ['controller' => 'Pages', 'action' => 'detailStatu'], ['id' => '[a-zA-Z]{3}']);
    $routes->connect('/detail-obce/:id', ['controller' => 'Pages', 'action' => 'detailObce'], ['id' => '5[0-9]{5}']);
    $routes->connect('/detail-okres/:id', ['controller' => 'Pages', 'action' => 'detailOkres'], ['id' => '3[0-9]{3}']);
    $routes->connect('/detail-kraje/:id', ['controller' => 'Pages', 'action' => 'detailKraje'], ['id' => '3[0-9]']);
    $routes->connect('/detail-dotacni-titul/:kod', ['controller' => 'Pages', 'action' => 'detailDotacniTitul'], ['kod' => '[0-9]{10}']);
    $routes->connect('/detail-dotacni-titul/:kod/rok/', ['controller' => 'Pages', 'action' => 'detailDotacniTitulRok'], ['kod' => '[0-9]{10}']);
    $routes->connect('/detail-dotacni-titul/:kod/ajax/', ['controller' => 'Pages', 'action' => 'detailDotacniTitulRokAjax'], ['kod' => '[0-9]{10}']);

    $routes->connect('/detail-mmr-podopatreni/', ['controller' => 'Pages', 'action' => 'mmrPodOpatreni']);
    $routes->connect('/detail-mmr-opatreni/', ['controller' => 'Pages', 'action' => 'mmrOpatreni']);
    $routes->connect('/detail-mmr-priorita/', ['controller' => 'Pages', 'action' => 'mmrPriorita']);
    $routes->connect('/detail-mmr-operacni-program/', ['controller' => 'Pages', 'action' => 'mmrOperacniProgram']);
    $routes->connect('/detail-mmr-grantove-schema/', ['controller' => 'Pages', 'action' => 'mmrGrantoveSchema']);

    $routes->connect('/detail-cedr-operacni-program/', ['controller' => 'Pages', 'action' => 'cedrOperacniProgram']);
    $routes->connect('/detail-cedr-priorita/', ['controller' => 'Pages', 'action' => 'cedrPriorita']);
    $routes->connect('/detail-cedr-opatreni/', ['controller' => 'Pages', 'action' => 'cedrOpatreni']);
    $routes->connect('/detail-cedr-podopatreni/', ['controller' => 'Pages', 'action' => 'cedrPodOpatreni']);

    $routes->connect('/strukturalni-fondy-2007-2013/', ['controller' => 'Pages', 'action' => 'strukturalniFondy']);
    $routes->connect('/strukturalni-fondy-2014-2020/', ['controller' => 'Pages', 'action' => 'strukturalniFondy2020']);
    $routes->connect('/strukturalni-fondy-detail/', ['controller' => 'Pages', 'action' => 'strukturalniFondyDetail']);
    $routes->connect('/strukturalni-fondy-detail-dotace/:id', ['controller' => 'Pages', 'action' => 'strukturalniFondyDetailDotace'], ['id' => '[0-9]+']);
    $routes->connect('/strukturalni-fondy-2014-2020-detail-dotace/:id', ['controller' => 'Pages', 'action' => 'strukturalniFondy2020DetailDotace'], ['id' => '[0-9]+']);

    $routes->connect('/detail-rozpoctove-obdobi/:id', ['controller' => 'Pages', 'action' => 'detailRozpoctoveObdobi'], ['id' => '[A-F0-9]{40}']);

    $routes->connect('/kapitoly-statniho-rozpoctu-ukazatele', ['controller' => 'Pages', 'action' => 'kapitolyStatnihoRozpoctuUkazatele']);
    $routes->connect('/kapitoly-statniho-rozpoctu-ukazatele/:year/:id', ['controller' => 'Pages', 'action' => 'kapitolyStatnihoRozpoctuUkazateleDetail'], ['id' => '[a-zA-Z0-9]+', 'year' => '[0-9]{4}']);

    $routes->connect('/ucel-znak-dotacnich-titulu', ['controller' => 'Pages', 'action' => 'znakUceluDotacnichTitulu']);
    $routes->connect('/ucel-znak-dotacnich-titulu/detail/:rok/:kod', ['controller' => 'Pages', 'action' => 'znakUceluDotacnichTituluDetail'], ['kod' => '[a-zA-Z0-9]+', 'year' => '[0-9]{4}']);

    $routes->connect('/investicni-pobidky', ['controller' => 'Pages', 'action' => 'investicniPobidkyCzechInvest']);
    $routes->connect('/investicni-pobidky/detail/:id', ['controller' => 'Pages', 'action' => 'investicniPobidkyCzechInvestDetail'], ['id' => '[0-9]+']);

    $routes->connect('/konsolidace-holdingy', ['controller' => 'Pages', 'action' => 'konsolidaceIndex']);
    $routes->connect('/konsolidace-holdingy/detail-vlastnik/:id', ['controller' => 'Pages', 'action' => 'konsolidaceVlastnik'], ['id' => '[0-9]+']);
    $routes->connect('/konsolidace-holdingy/detail/:id', ['controller' => 'Pages', 'action' => 'konsolidaceHolding'], ['id' => '[0-9]+']);
    $routes->connect('/konsolidace-holdingy/detail-spolecnost/:id', ['controller' => 'Pages', 'action' => 'konsolidaceSpolecnost'], ['id' => '[0-9]+']);

    $routes->connect('/dary-politickym-stranam', ['controller' => 'Pages', 'action' => 'daryPolitickymStranam']);
    $routes->connect('/dary-politickym-stranam/detail/:id', ['controller' => 'Pages', 'action' => 'daryPolitickymStranamDetail'], ['id' => '[0-9]+']);
    $routes->connect('/dary-politickym-stranam/detail-auditor/:id', ['controller' => 'Pages', 'action' => 'daryPolitickymStranamAuditor'], ['id' => '[0-9]+']);
    $routes->connect('/dary-politickym-stranam/detail-darce/:id', ['controller' => 'Pages', 'action' => 'daryPolitickymStranamDetailDarce'], ['id' => '[0-9]+']);

    $routes->connect('/hlidac-smluv/ajax', ['controller' => 'Pages', 'action' => 'hlidacSmluv']);
    $routes->connect('/distance', ['controller' => 'Pages', 'action' => 'icoDotaceDistance']);

    $routes->connect('/opendata', ['controller' => 'Pages', 'action' => 'openData']);
    $routes->connect('/dotinfo', ['controller' => 'Pages', 'action' => 'dotinfo']);
    $routes->connect('/dotinfo/poskytovatel/:ico', ['controller' => 'Pages', 'action' => 'dotinfoPoskytovatel'], ['ico' => '[0-9]+']);
    $routes->connect('/detail-dotinfo/:id', ['controller' => 'Pages', 'action' => 'dotinfoDetail'], ['id' => '[0-9]+']);

    $routes->connect('/vlastni-sestavy', ['controller' => 'Pages', 'action' => 'vlastniSestavy']);

    // fallback
    // $routes->fallbacks(\Cake\Routing\Route\InflectedRoute::class);
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
