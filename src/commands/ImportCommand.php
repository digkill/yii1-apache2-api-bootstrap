<?php

class ImportCommand extends CConsoleCommand
{
    public $verbose = false;

    public function actionIndex()
    {
        $template = \Yii::app()->params['parser']['template'] ?? null;
        $logsFolder = \Yii::app()->params['parser']['logs_folder'] ?? null;

        $logs = file_get_contents($logsFolder);
        preg_match_all($template, $logs, $matches, PREG_SET_ORDER, 0);

        $attributes = array_map(function ($key, $value) {
            $current = DateTime::createFromFormat('d/M/Y:H:i:s', trim($value[3]));

            return [
                'ip' => $value[1],
                'date' => $current->format('Y-m-d H:i:s'),
                'method' => $value[4],
                'code' => $value[5],
            ];
        }, array_keys($matches), $matches);
        return Log::create($attributes) ? 0 : 1;
    }

}