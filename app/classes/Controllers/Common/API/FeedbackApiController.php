<?php


namespace App\Controllers\Common\API;


use App\App;
use Core\Api\Response;

class FeedbackApiController
{
    public function index(): string
    {
        $response = new Response();

        $feedbacks = App::$db->getRowsWhere('feedback');

        $rows = $this->buildRows($feedbacks);

        // Setting "what" to json-encode
        $response->setData($rows);

        // Returns json-encoded response

        return $response->toJson();
    }

    /**
     * Returns formatted time from timestamp given in row.
     *
     * @param $row
     * @return string
     */
    private function timeFormat($row)
    {
        $timeStamp = date('Y-m-d H:i:s', $row['timestamp']);
        $difference = abs(strtotime("now") - strtotime($timeStamp));
        $days = floor($difference / (3600 * 24));
        $hours = floor($difference / 3600);
        $minutes = floor(($difference - ($hours * 3600)) / 60);
        $seconds = floor($difference % 60);

        if ($days) {
            $hours = $hours - 24;
            $result = "{$days}d {$hours}:{$minutes} H";
        } elseif ($minutes) {
            $result = "{$minutes} min";
        } elseif ($hours) {
            $result = "{$hours}:{$minutes} H";
        } else {
            $result = "{$seconds} seconds";
        }

        return $result;
    }

    /**
     * Formats rows from given @param (in this case - orders data)
     * Intended use is for setting data in json.
     *
     * @param $feedbacks
     * @return mixed
     */
    private function buildRows($feedbacks)
    {
        foreach ($feedbacks as $id => &$row) {

            $row = [
                'id' => $id,
                'name' => $row['name'],
                'comment' => $row['comment'],
                'timestamp' => $this->timeFormat($row)
            ];
        }

        return $feedbacks;
    }

}