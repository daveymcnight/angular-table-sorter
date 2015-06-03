<?php
/**
 * Created by PhpStorm.
 * User: McDavis
 * Date: 4/17/15
 * Time: 2:00 PM
 */
include "../../db/Database.php";

class Patients extends Database {


    function __construct()
    {
        $this->tableName = "patients";
    }

    public function getWildCardArray()
    {
       return array('acctpat','lname','fname','addr', 'bphone','hphone','cphone','csz');
    }
    
    public function PUT($resource)
    {
        // TODO: Implement PUT() method.
    }

    public function PATCH($resource)
    {
        // TODO: Implement PATCH() method.
    }

    public function DELETE($resource)
    {
        // TODO: Implement DELETE() method.
    }

    public function GET($parameters = array())
    {
        // TODO: Implement GET() method.
    }

    //Davey Greenville

    //Search Davey


}