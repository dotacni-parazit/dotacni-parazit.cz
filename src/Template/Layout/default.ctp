<?php
$this->assign('title', empty($title) ? "" : $title);
$title = $this->fetch('title');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php
    echo $this->Html->script([
        'jquery.min.js',
        'jstree.min.js',
        'jquery.sumoselect.min',
        '//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js',
        '//cdn.datatables.net/plug-ins/1.10.15/sorting/currency.js'
    ]);
    ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('jstree-theme/style.css') ?>
    <?= $this->Html->css('sumoselect.min.css') ?>
    <?= $this->Html->css('//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css') ?>
    <?= $this->Html->css('parazit.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->Flash->render() ?>
<nav>
    <?php if (!empty($this->request->referer())) { ?>
        <!--<a href="<?= $this->request->referer(); ?>"><img src="/img/arrow_back.png" style="max-height: 64px;"></a>-->
    <?php } ?>
    <a href="/"><img src="/img/404.png" style="max-height: 64px; float: left;"></a>
    <h1 style="float: left; margin-left: 20px;">
        <?php
        echo empty($title) ? 'Dotační Parazit' : $title;
        ?>
    </h1>
</nav>
<hr/>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>
