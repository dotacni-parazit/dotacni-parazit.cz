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
use Cake\Routing\Route\DashedRoute;
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
    $routes->connect('/ciselniky', ['controller' => 'Pages', 'action' => 'ciselniky']);

    $routes->connect('/operacni-programy-cedr', ['controller' => 'Pages', 'action' => 'cedrOperacniProgramy']);
    $routes->connect('/operacni-programy-mmr', ['controller' => 'Pages', 'action' => 'mmrOperacniProgramy']);
    $routes->connect('/financni-zdroje', ['controller' => 'Pages', 'action' => 'financniZdroje']);
    $routes->connect('/pravni-formy', ['controller' => 'Pages', 'action' => 'pravniFormy']);
    $routes->connect('/kapitoly-statniho-rozpoctu', ['controller' => 'Pages', 'action' => 'kapitolyStatnihoRozpoctu']);
    $routes->connect('/kapitoly-statniho-rozpoctu-ukazatele', ['controller' => 'Pages', 'action' => 'kapitolyStatnihoRozpoctuUkazatele']);
    $routes->connect('/rozpoctove-obdobi', ['controller' => 'Pages', 'action' => 'rozpoctoveObdobi']);
    $routes->connect('/rozpoctove-obdobi/:year', ['controller' => 'Pages', 'action' => 'rozpoctoveObdobi']);
    $routes->connect('/dotacni-tituly', ['controller' => 'Pages', 'action' => 'dotacniTituly']);
    $routes->connect('/vyhledavani', ['controller' => 'Pages', 'action' => 'filtr']);
    $routes->connect('/get-tituly-podle-kapitol', ['controller' => 'Pages', 'action' => 'cbFiltrKapitoly']);
    $routes->connect('/dotacni-titul/detail/*', ['controller' => 'CiselnikDotaceTitulv01', 'action' => 'view']);
    // Finalni vystupy
    $routes->connect('/fyzicke-osoby', ['controller' => 'Pages', 'action' => 'fyzickeOsoby']);
    $routes->connect('/fyzicke-osoby/ajax', ['controller' => 'Pages', 'action' => 'fyzickeOsobyAjax']);

    $routes->connect('/podle-poskytovatelu', ['controller' => 'Pages', 'action' => 'podlePoskytovatelu']);
    $routes->connect('/podle-poskytovatelu/:id', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetail'], ['id' => '\d+']);
    $routes->connect('/podle-poskytovatelu/:id/rok/:year', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetailRok'], ['id' => '\d+', 'year' => '\d+']);
    $routes->connect('/podle-poskytovatelu/:id/complete', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetailComplete'], ['id' => '\d+']);
    $routes->connect('/podle-poskytovatelu/:id/complete/ajax', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetailCompleteAjax'], ['id' => '\d+']);
    $routes->connect('/podle-poskytovatelu/:id/complete/ajax/:year', ['controller' => 'Pages', 'action' => 'podlePoskytovateluDetailCompleteAjax'], ['id' => '\d+', 'year' => '\d+']);
    $routes->connect('/detail-prijemce-pomoci/:id', ['controller' => 'Pages', 'action' => 'detailPrijemcePomoci'], ['id' => '[a-zA-Z0-9]+']);
    $routes->connect('/detail-dotace/:id', ['controller' => 'Pages', 'action' => 'detailDotace'], ['id' => '[a-zA-Z0-9]+']);

    $routes->connect('/podle-prijemcu/', ['controller' => 'Pages', 'action' => 'podlePrijemcu']);
    $routes->connect('/podle-prijemcu/multiple/:ico', ['controller' => 'Pages', 'action' => 'detailPrijemceMulti'], ['ico' => '[0-9\,]+']);

    $routes->connect('/podle-zdroje-financi', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanci']);
    $routes->connect('/podle-zdroje-financi/:kod', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciDetail'], ['kod' => '[tz0-9]{2,5}']);
    $routes->connect('/podle-zdroje-financi/:kod/rok/:year', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciDetailRok'], ['kod' => '[tz0-9]{2,5}', 'year' => '\d+']);
    $routes->connect('/podle-zdroje-financi/:kod/complete', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciDetailComplete'], ['kod' => '[tz0-9]{2,5}']);
    $routes->connect('/podle-zdroje-financi/:kod/complete/ajax/:year', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciCompleteAjax'], ['kod' => '[tz0-9]{2,5}', 'year' => '\d+']);
    $routes->connect('/podle-zdroje-financi/:kod/complete/ajax', ['controller' => 'Pages', 'action' => 'podleZdrojeFinanciCompleteAjax'], ['kod' => '[tz0-9]{2,5}']);

    $routes->connect('/detail-rozhodnuti/:id', ['controller' => 'Pages', 'action' => 'detailRozhodnuti'], ['id' => '[a-zA-Z0-9]+']);
    $routes->connect('/podle-sidla-prijemce', ['controller' => 'Pages', 'action' => 'podleSidlaPrijemce']);

    $routes->connect('/detail-statu/:id', ['controller' => 'Pages', 'action' => 'detailStatu'], ['id' => '[a-zA-Z]{3}']);
    $routes->connect('/detail-obce/:id', ['controller' => 'Pages', 'action' => 'detailObce'], ['id' => '5[0-9]{5}']);
    $routes->connect('/detail-okres/:id', ['controller' => 'Pages', 'action' => 'detailOkres'], ['id' => '3[0-9]{3}']);
    $routes->connect('/detail-kraje/:id', ['controller' => 'Pages', 'action' => 'detailKraje'], ['id' => '3[0-9]']);

    // fallback
    // $routes->fallbacks(\Cake\Routing\Route\InflectedRoute::class);
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
