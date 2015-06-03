<?php
/**
 * Created by PhpStorm.
 * User: McDavis
 * Date: 4/3/15
 * Time: 1:47 PM
 */

interface IConnectionInfoSample {

    //the real thing does not have sample in the interface name
    const HOST = "127.0.0.1";
    const USERNAME = "jervey";
    const PASSWORD = "jervey";
    const DBNAME = "jervey";

    public function openConnection();
    public function closeConnection();

}