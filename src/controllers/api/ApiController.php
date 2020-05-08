<?php

abstract class ApiController extends Controller
{
// Members
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers
     */
    const APPLICATION_ID = 'ASCCPE';

    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array();
    }

// Actions
    public function actionList()
    {
    }

    public function actionView()
    {
    }

    public function actionCreate()
    {
    }

    public function actionUpdate()
    {
    }

    public function actionDelete()
    {
    }

    /**
     * @param $data
     * @param int $code
     */
    protected function responseJSON($data, $code = 200)
    {
        http_response_code($code);
        header('Content-type: application/json');
        echo CJSON::encode($data);

        foreach (Yii::app()->log->routes as $route) {
            if ($route instanceof CWebLogRoute) {
                $route->enabled = false;
            }
        }
        Yii::app()->end();
    }
}