<?php

namespace Entity;

// Représentation d'un objet Times 
// Cette classe servira à accueillir un enregistrement
// provenant de la base de données (dans la table Times)

class Times {

    public $id;
    public $datetime;
    public $time;

    public function getFormattedDateTime() {
        $date = strtotime($this->datetime);
        return date('d/m/Y à H:i:s', $date);
    }

}

