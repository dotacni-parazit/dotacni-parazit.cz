<?php
/**
 * @var AppView $this
 */
$this->assign('title', empty($title) ? "" : $title);
$title = $this->fetch('title');

use App\View\AppView; ?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta property="og:image" content="https://dotacni-parazit.cz/img/brouk_128.png"/>
    <meta name="theme-color" content="#ffffff">
    <title>
        <?= strtolower($title) === "dotační parazit" ? "Hlavní Stránka" : $title ?> - Dotační Parazit
    </title>
    <?= $this->Html->meta('icon') ?>

    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" crossorigin="anonymous"
            integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"></script>
    <?php
    echo $this->Html->script([
        'jquery.min.js',
        'https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/r-2.2.0/sl-1.2.3/datatables.min.js',
        'https://cdn.datatables.net/plug-ins/1.10.16/sorting/currency.js',
        'datatable.js?v444=ok',
        'bootstrap.min.js'
    ]);
    ?>

    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700&amp;subset=latin-ext" rel="stylesheet">
    <?= $this->fetch('css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('//cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/r-2.2.0/sl-1.2.3/datatables.min.css') ?>
    <?= $this->Html->css('parazit.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="container-fluid">
    <div class="row-fluid">
        <div class="col">
            <a href="/" style="float: left;"><img src="/img/brouk_64.png" title="Dotační Parazit"></a>
            <h1><?= empty($title) ? 'Dotační Parazit' : $title ?></h1>
            <br class="clear"/>
        </div>
    </div>
</nav>
<?php if (isset($crumbs) && !empty($crumbs)) { ?>
    <ol class="breadcrumb">
        <?php foreach ($crumbs as $name => $href) { ?>
            <li class="breadcrumb-item <?= $href == 'self' ? 'active' : '' ?>">
                <?php if ($href != 'self') { ?><a href="<?= $href ?>"> <?php } ?>
                    <?= $name ?>
                    <?php if ($href != 'self') { ?></a><?php } ?>
            </li>
        <?php } ?>
    </ol>
<?php } ?>
<div class="container-fluid">
    <div class="row-fluid top30">
        <div class="col">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </div>
</div>

<footer>
    <div id="sitefooter" style="margin: 4em 0 0 0; text-align: center;">
        <a href="http://goodgovernance.cz/" title="Sponsored by Centrum of excellence for Good Governance, z.s."
           class="text-right"><img src="/img/good_governance_logo.png"></a>
        <a href="https://www.jetbrains.com/?from=DotacniParazit" title="Sponsored by JetBrains"
           class="col text-left"><img src="/img/jetbrains.png" height="84"></a>
    </div>

    <div id="footercontent"
         style="color: #fff; width: 100%; text-align: center; padding: 2em 0; background: #46223E; margin: 1em 0 0 0;">
        &copy; Copyright <a href="http://goodgovernance.cz/" style="color: #fff; text-decoration: underline;">Good
            Governance</a> - Centrum of Excellence for Good Governance
        <br/>
        <a style="color: white;" href="mailto:info@dotacni-parazit.cz">info@dotacni-parazit.cz</a>
    </div>
    </div>
</footer>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107377525-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments)
    }

    gtag('js', new Date());

    gtag('config', 'UA-107377525-1');
</script>

</body>
</html>
