<?php

class LogController extends Controller
{
    public $layout = 'main';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to access 'index' and 'view' actions.
                'actions' => array('view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated users to access all actions
                'actions' => array('index'),
                'users' => array('@'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Log('search');
        $this->render('list', array(
            'model' => $model,
        ));
    }
}
