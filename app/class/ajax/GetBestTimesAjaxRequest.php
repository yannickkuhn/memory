<?php

    class GetBestTimesAjaxRequest {

        private $response;

        public function __construct() {
            $this->response = [
                "success" => "Récupération des données de meilleurs temps ok !"
            ];
        }

        public function getResponse() {
            http_response_code(200);
            return json_encode($this->response);
        }
    }