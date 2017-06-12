<?php
$this->assign('title', empty($title) ? "" : $title);
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php
    echo $this->Html->script([
        'jquery.min.js',
        'jstree.min.js',
        'jquery.sumoselect.min'
    ]);
    ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('jstree-theme/style.css') ?>
    <?= $this->Html->css('sumoselect.min.css') ?>
    <?= $this->Html->css('parazit.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->Flash->render() ?>
<div class="container clearfix">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>
