<?php
/**
 * Created by PhpStorm.
 * User: McDavis
 * Date: 4/6/15
 * Time: 2:14 PM
 */

include "IConnectionInfo.php";
include "../../libs/FluentPDO/FluentPDO.php";

/* This is the abstract class that will be the contract for the model classes
such as Referred Doctors, Fee-Schedule etc. A little refarctoring will be needed
when the application matures to using CRUD. The reason why an abstract class was used
over an interface is that all the models will have the same functionality, so inheritiance
will be very neccessary on a few methods. The reason I am not using simple inheritance
is because the basic CRUD functions will need different functionality. I did not use and ORM
because that would make this application a little top heavy, and time did not allow it.

**Possible future steps**
 * 1. Refactor to add another layer between Database and Models.
 * 2. Find library that will add objects to database well.
 * 3. Explore the possible ORM --> Active Record. Be wary of one thing though:
 * The client would like to swith to Microsoft Sequel Server make sure what ever ORM
 * that will be used supports that. I do not believe Active Record supports that natively
 * but I think I remember seeing a third party support system.
*/


/* The database class will be extended by the domain class and then will
   be used on the /app/resources/[domainObjectResourePage].php
*/

/* This class uses the RESTful Terminology */

abstract class Database implements IConnectionInfo {

    private $connection;
    protected $tableName;

    public function openConnection(){

            $this->connection = new PDO(
                'mysql:host=' . IConnectionInfo::HOST .
                ';dbname=' . IConnectionInfo::DBNAME .
                ';charset=utf8',
                IConnectionInfo::USERNAME,
                IConnectionInfo::PASSWORD
            );

    }


    public function closeConnection(){
       $this->connection = null;
    }


    public function getConnection()
    {
        return $this->connection;

    }

    public function getTableName()
    {
        return $this->tableName;
    }

    /* These next 5 functions are  */

    public abstract function getWildCardArray();

    public abstract function PUT($resource);

    public abstract function PATCH($resource);

    public abstract function DELETE($resource);

    public abstract function GET($parameters = array());


    /* Inherited METHODS */

    /* RETURNS ALL RESOURCES */

    public function GET_ALL(){
        $fpdo = new FluentPDO($this->connection);
        $query = $fpdo->from($this->tableName)->fetchAll();
        echo json_encode($query);
    }

    public function GET_SAMPLE($limit){
        $query = $this->connection->prepare("SELECT * FROM $this->tableName LIMIT $limit");
        $query->execute();
        $result = $query->fetchAll();
        echo json_encode($result);
    }


    public function printJSON($query){
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        echo json_encode($result);
    }


    public  function doWildCard($wildcardArray = array(), $input){
        //places string into an array
        $paramters = explode(' ',$input);
        //counter for outside
        $outerCounter = 0;
        //gets the length of how many columns will be searched through
        $wildLen = count($wildcardArray);
        //get number of words searched for
        $numberOfParmeters = count($paramters);
        //start query
        $query = "SELECT * FROM $this->tableName WHERE ";

        /*
        Do do the wild card search we have to create the query.
        There is one search box that the user will be putting the wildcard search in.
        The search MUST have this functionality. If they search by John Doe Chicago Illinois 91723
        The result must fit all criteria. The format of the query is.

        SELECT * FROM patients
        WHERE (name LIKE '%john%' OR lname LIKE '%john%' OR addr LIKE '%john%' OR phone LIKE '%john%')
        AND   (fname LIKE '%doe%' OR lname LIKE '%doe%' OR addr LIKE '%doe%' OR phone LIKE '%doe%')
        LIMIT 100;
        */

        //iterate through the parameter array
        foreach($paramters as $param) {
            //set inner counter
            $innerCounter = 0;
            //start nested loop
            foreach($wildcardArray as $col){
                //if the inner is zero add the opening parenthesis
                if($innerCounter == 0){
                   $query = $query . "(";
                }
                //the inner loop creates the OR statements in side the AND statements
                //if it is on the last parameter close parenethis else add or statement
                if($innerCounter == $wildLen - 1) {
                    $query = $query . "$col LIKE '%" . $param . "%')";
                }else{
                    $query = $query . " $col LIKE '%" . $param . "%' OR ";
                }
                //increment inner counter
                $innerCounter++;
            }
            //if on the last word of string array stop and add limit
            if($outerCounter == $numberOfParmeters -1) {
                $query = $query . " LIMIT 100 ";
            }else{
                $query = $query . " AND ";
            }
            $outerCounter++;
        }
//        echo $query;

        $this->printJSON($query);
        /* The system will no prepare the query.
           Exexute it and then fetch results and
           then print it out in JSON format.  */

    }



}

