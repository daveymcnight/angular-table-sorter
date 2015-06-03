<?php

include "../../db/Database.php";

class ReferredDoctors extends  Database{


    function __construct(){
        $this->tableName = "rdoc";
    }

    public function getWildCardArray(){
        return array('id', 'name', 'practice','phone','fax', 'address');
    }

    public function PUT($resource){
        // TODO: Implement CREATE() method.
    }

    public function PATCH($resource){
        // TODO: Implement UPDATE() method.
    }

    public function DELETE($resource){
        // TODO: Implement DELETE() method.
    }

    public function GET($parameters = array()){
        // TODO: Implement SELECT() method.
    }



} 