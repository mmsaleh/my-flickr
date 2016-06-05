<?php
require_once 'config.php';
/**
* MySql Database class
*
* @package   mysqldb
* @author   Mayada Saleh <saleh.mayada@gmail.com>
* @licence   GNU General Public License (GPL)
* ..
**/

class mysqlDatabase {

  public $link;
  public $last_query;
  public $recordSet = array();

  public function __construct(){
    $this->openConnection();
  }

  public function openConnection(){
    /*
    * OpenConnection()
    * create link on mysql server to open connection
    * @null
    * @array  (mix)
    */

    $this->link = mysqli_connect(SERVERNAME, DBUSER, DBPASS, DBNAME);
    if (!$this->link){
      die("cannot open connection");
    } else {
      // echo "connection established";
    }
  }

  public function performQuery($query){
    $this->last_query = mysqli_query($this->link, $query);
    return $this->last_query ? $this->last_query : mysqli_error($this->link);
    // never show mysql errors on production server
  }

  public function fetchAll(){
    if ($this->last_query){
      while($row = mysqli_fetch_assoc($this->last_query)){
        $this->recordSet[] = $row;
      }
      return !empty($this->recordSet) ? $this->recordSet : FALSE;
    }
  }

  public function lastId(){
    return mysqli_insert_id($this->link);
  }

}