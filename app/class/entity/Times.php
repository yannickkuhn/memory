<?php

namespace Entity;

class Times {

    public $id;
    public $datetime;
    public $time;

    public function getFormattedDateTime() {
        $date = strtotime($this->datetime);
        return date('d/m/Y à H:i:s', $date);
    }

}

