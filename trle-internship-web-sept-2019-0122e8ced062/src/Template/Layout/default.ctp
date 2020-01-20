<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css('/css/sb-admin.css') ?>
    <?= $this->Html->css('/vendor/fontawesome-free/css/all.min.css') ?>
    <?= $this->Html->css('/vendor/datatables/dataTables.bootstrap4.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <?= $this->Html->link('Internship ', ['controller' => 'Movies', 'action' => 'index'], ['class' => 'navbar-brand mr-1']) ;?>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                    <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => 'dropdown-item']) ;?>
            </div>
        </li>
    </ul>
</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item ">
            <?= $this->Html->link('<i class="fa fa-user"></i> Users', [ 'controller' => 'Users','action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
        </li>
        <li class="nav-item ">
            <?= $this->Html->link('<i class="fa fa-film"></i> Movies', [ 'controller' => 'Movies','action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
        </li>
        <li class="nav-item ">
            <?= $this->Html->link('<i class="fa fa-film"></i> Tv Shows', ['controller' => 'TvShows', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
        </li>
        <li class="nav-item ">
            <?= $this->Html->link('<i class="fa fa-film"></i> Seasons', [ 'controller' => 'Seasons','action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
        </li>
        <li class="nav-item ">
            <?= $this->Html->link('<i class="fa fa-film"></i> Episodes', ['controller' => 'Episodes', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
        </li>
        <li class="nav-item ">
            <?= $this->Html->link('<i class="fa fa-users"></i> Actors', ['controller' => 'Actors', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
        </li>
        <li class="nav-item ">
            <?= $this->Html->link('<i class="fa fa-film"></i> Genres', ['controller' => 'Genres', 'action' => 'index'], ['class' => 'nav-link', 'escape' => false]) ?>
        </li>
    </ul>

    <div id="content-wrapper">
    <div class="container-fluid">

        <?php $this->Breadcrumbs->setTemplates([
        'wrapper' => '<ol class="breadcrumb">{{content}}</ol>',
        'item' => '<li><a href="{{url}}">{{title}}</a></li>{{separator}}'
        ]);
        ?>

        <?= $this->Breadcrumbs->render(
        ['class' => 'breadcrumbs-trail'],
        ['separator' => '/']
        ); ?>

        <?= $this->Flash->render() ?>
        <?= $this->fetch('content'); ?>
    </div>

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Internship-web-sept 2019</span>
            </div>
        </div>
    </footer>

</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
            <!-- Bootstrap core JavaScript-->
            <?= $this->Html->script('/vendor/jquery/jquery.min.js') ?>
            <?= $this->Html->script('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>

            <!-- Bootbox JavaScript-->
            <?= $this->Html->script('/vendor/bootbox/bootbox.all.js') ?>

            <!-- Core plugin JavaScript-->
           <?= $this->Html->script('/vendor/jquery-easing/jquery.easing.min.js') ?>

            <!-- Core plugin JavaScript-->
            <?= $this->Html->script('/vendor/datatables/jquery.dataTables.js') ?>
            <?= $this->Html->script('/vendor/datatables/dataTables.bootstrap4.js') ?>

            <!-- Custom scripts for all pages-->
            <?= $this->Html->script('/js/sb-admin.min.js') ?>
            <?= $this->Html->script('/js/custom.js') ?>

</body>
</html>
