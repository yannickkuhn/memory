<?php

    require_once('../class/database/Database.php');
    require_once('../class/entity/Times.php');

    use App\Database;
    use Entity\Times;

    class SaveTimeService {

        private $response;
        private $db;

        public function __construct($db_name) {
            $this->db = new Database($db_name);
        }

        // $time est un paramètre 
        // devant contenir le temps avec le format "00:00:00" 
        
        public function sendRequest($time) {         
            $now = date_create()->format('Y-m-d H:i:s');

            $count = $this->db->exec("
                INSERT INTO `times` (`id`, `datetime`, `time`) 
                VALUES (NULL, '$now', '$time'); 
            ");
            if($count == 1) {
                $this->response = [
                    "success" => "Temps de la partie enregistré !"
                ];
            }
            else {
                $this->response = [
                    "error" => "Problème d'enregistrement de la requête !"
                ];
            }

        }

        public function getResponse() {
            http_response_code(200);
            return json_encode($this->response);
        }
    }
