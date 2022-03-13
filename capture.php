<?php
    header('Content-Type: application/json; charset=utf-8');

    class Capture {

        private $response;

        public function __construct() {
            $this->response = [
                "success" => "Bravo, vous avez réussi l'appel !"
            ];
        }

        public function getResponse() {
            http_response_code(200);
            return json_encode($this->response);
        }
    }

    $capture = new Capture();
    echo $capture->getResponse();