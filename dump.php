<?php
/**
 * Created by PhpStorm.
 * User: McDavis
 * Date: 4/22/15
 * Time: 10:16 AM
 */

//    public function doWildcard($wildcardArray = array(), $parameter){
//        $counter = 0;
//        $len = count($wildcardArray);
//        $query = "SELECT * FROM $this->tableName WHERE ";
//        foreach($wildcardArray as $col){
//            if($counter == $len - 1) {
//                $query = $query . "$col LIKE '%" . $parameter . "%';";
//            }else{
//                $query = $query . " $col LIKE '%" . $parameter . "%' OR ";
//            }
//            $counter++;
//        }
//
//        $statement = $this->connection->prepare($query);
//        $statement->execute();
//        $result = $statement->fetchAll();
//        echo json_encode($result);
// }