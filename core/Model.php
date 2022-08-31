<?php 
namespace app\core;

abstract class Model {
    public function loadData($data) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {         // name of HTML form must same to name of attribute of model
                $this->{$key} = $value;
            }
        }
    }

    public function validate() {
        return true;
    }
}

?>