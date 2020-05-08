<?php

class PasswordCommand extends CConsoleCommand
{
    public $verbose = false;

    public function actionIndex($password)
    {
        echo CPasswordHelper::hashPassword($password) . PHP_EOL;
        return 0;
    }
}