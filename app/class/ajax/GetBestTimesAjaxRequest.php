<?php

    require_once('../class/database/Database.php');
    require_once('../class/entity/Times.php');

    use App\Database;
    use Entity\Times;

    class GetBestTimesAjaxRequest {

        private $response;
        private $db;

        public function __construct() {
            $this->db = new Database('memory');
        }

        public function getResultsFromDb() {
            $data = $this->db->query("SELECT * FROM times ORDER BY time ASC LIMIT 0,3", 'Entity\Times');
            $dataCount = count($data);

            $i = 0;
            foreach($data as $time) {
                $this->response[$i]["id"] = $time->id;
                $this->response[$i]["date"] = $time->getFormattedDateTime();
                $this->response[$i]["time"] = $time->time;
                $i = $i + 1;
            }
        }

        public function getResponse() {
            $this->getResultsFromDb();
            http_response_code(200);
            return json_encode($this->response);
        }
    }