<?php
$this->pageTitle = Yii::app()->name . ' - Login';

?>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

<?php $this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => $this->breadcrumbs,
)); ?><!-- breadcrumbs -->

<div class="form-signin">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableAjaxValidation' => true,
    )) ?>

    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>


    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text" id="inputEmail" name="LoginForm[username]" class="form-control" placeholder="User" required
           autofocus>
    <?php echo $form->error($model, 'username'); ?>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="LoginForm[password]" placeholder="Password"
           required>
    <?php echo $form->error($model, 'password'); ?>


    <?php echo CHtml::submitButton('Login', ['class' => 'btn btn-lg btn-primary btn-block']); ?>
    <?php $this->endWidget(); ?>
</div>

