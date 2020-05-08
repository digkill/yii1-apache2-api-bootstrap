<?php

class LogController extends ApiController
{

    public function actionList()
    {
        $sortBy = $_GET['sortBy'] ?? 'date ASC';
        $groupBy = $_GET['groupBy'] ?? 'ip';
        $dateStart = $_GET['dateStart'] ?? null;
        $dateEnd = $_GET['dateEnd'] ?? null;

        $logs = Log::search($sortBy, $groupBy, $dateStart, $dateEnd);

        if (empty($logs)) {
            $this->responseJSON($logs, 200);
        }

        $this->responseJSON($logs, 200);
    }
}
