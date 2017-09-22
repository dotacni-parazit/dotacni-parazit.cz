<?php
$this->assign('title', empty($title) ? "" : $title);
$title = $this->fetch('title');
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <title>
        <?= strtolower($title) === "dotační parazit" ? "Hlavní stránka" : $title ?> - Dotační Parazit
    </title>
    <?= $this->Html->meta('icon') ?>

    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
            integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
            crossorigin="anonymous"></script>
    <?php
    echo $this->Html->script([
        'jquery.min.js',
        '//cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/r-2.2.0/sl-1.2.3/datatables.min.js',
        '//cdn.datatables.net/plug-ins/1.10.16/sorting/currency.js',
        'datatable.js',
        'bootstrap.min.js'
    ]);
    ?>

    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700&amp;subset=latin-ext" rel="stylesheet">
    <?= $this->fetch('css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('//cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.4.2/b-flash-1.4.2/b-html5-1.4.2/b-print-1.4.2/cr-1.4.1/r-2.2.0/sl-1.2.3/datatables.min.css') ?>
    <?= $this->Html->css('parazit.css?em=' . rand()) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="container-fluid">
    <div class="row-fluid">
        <div class="col">
            <a href="/" style="float: left;"><img src="/img/brouk_64.png"></a>
            <h1><?= empty($title) ? 'Dotační Parazit' : $title ?></h1>
            <br class="clear"/>
        </div>
    </div>
</nav>
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
        <a href="http://goodgovernance.cz/" style="display: block;"><img src="/img/good_governance_logo.png"></a>
        <div id="footercontent"
             style="color: #fff; width: 100%; text-align: center; padding: 2em 0; background: #35002f; margin: 1em 0 0 0;">
            &copy; Copyright <a href="http://goodgovernance.cz/" style="color: #fff; text-decoration: underline;">Good
                Governance</a> - Centrum of Excellence for Good Governance
        </div>
    </div>
</footer>
</body>
</html>
