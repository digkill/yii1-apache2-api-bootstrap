
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Logs</a>
                </li>


            </ul>
            <ul class="navbar-nav mr-right">
                <?php if (!Yii::app()->user->isGuest): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="site/logout">(<?= Yii::app()->user->name ?>) Log out</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="site/login">Log in</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="page-container">



    <div class="container">
        <?php
        $this->breadcrumbs = array(
            'Logs',
        );
        ?>
        <h1>Logs</h1>
        <div class="row mt-5 mb-3 align-items-center">
            <div class="col-md-4">
                Start Date: <input id="startDate" width="276"/>
                End Date: <input id="endDate" width="276"/>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Filter IP" id="searchField">
            </div>
            <div class="col-md-2 text-right">
                <span class="pr-3">Rows Per Page:</span>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-end">
                    <select class="custom-select" name="rowsPerPage" id="changeRows">
                        <option value="1">1</option>
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="root"></div>

    </div>
</div>



<footer class="footer mt-auto py-3">
    <div class="container">
        Copyright &copy; <?php echo date('Y'); ?> by Edifanoff.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div>
</footer>
<link rel="stylesheet" type="text/css"
      href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/grid/table-sortable.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/grid/styles.css"/>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/grid/script.js" type="text/javascript"></script>
