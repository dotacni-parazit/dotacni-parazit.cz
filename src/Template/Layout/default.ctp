<?php
$this->assign('title', empty($title) ? "" : $title);
$title = $this->fetch('title');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <title>
        <?= strtolower($title) === "dotační parazit" ? "Hlavní stránka" : $title ?> - Dotační Parazit
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php
    echo $this->Html->script([
        'jquery.min.js',
        'jstree.min.js',
        'jquery.sumoselect.min',
        '//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js',
        '//cdn.datatables.net/plug-ins/1.10.15/sorting/currency.js',
        'datatable.js'
    ]);
    ?>

    <?= $this->Html->css('base.css?em=' . rand()) ?>
    <?php //echo $this->Html->css('cake.css?em='.rand()) ?>
    <?= $this->Html->css('jstree-theme/style.css') ?>
    <?= $this->Html->css('sumoselect.min.css') ?>
    <?= $this->Html->css('//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css') ?>
    <?= $this->Html->css('parazit.css?em=' . rand()) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->Flash->render() ?>
<nav style="background: #35002f; color: #fff; ">
    <?php if (!empty($this->request->referer())) { ?>
        <!--<a href="<?= $this->request->referer(); ?>"><img src="/img/arrow_back.png" style="max-height: 64px;"></a>-->
    <?php } ?>
    <a href="/" style="display: block; height: 100%; float: left;" class="small-hide"><img src="/img/404.png" style="max-height: 64px; margin-right: 10px;"></a>
    <h1 style="float: left; margin-left: 20px; max-width: 85%; color: #fff;">
        <?php
        echo empty($title) ? 'Dotační Parazit' : $title;
        ?>
    </h1>
    <br class="clear"/>
</nav>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<div id="sitefooter" style="margin: 4em 0 0 0; text-align: center;">
    <a href="http://goodgovernance.cz/" style="display: block;"><img src="/img/good_governance_logo.png"></a>
    <div id="footercontent"
         style="color: #fff; width: 100%; text-align: center; padding: 2em 0; background: #35002f; margin: 1em 0 0 0;">
        &copy; Copyright <a href="http://goodgovernance.cz/" style="color: #fff; text-decoration: underline;">Good
            Governance</a> - Centrum of Excellence for Good Governance
    </div>
</div>
<footer>
</footer>
</body>
</html>
