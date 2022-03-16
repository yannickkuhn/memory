<?php

    class SaveTimeAjaxRequest {

        private $response;

        public function __construct() {
            $this->response = [
                "success" => "Temps de la partie enregistré !"
            ];
        }

        public function getResponse() {
            http_response_code(200);
            return json_encode($this->response);
        }
    }
