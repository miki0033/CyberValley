<?php
/**
 * Description of mysql_db
 *
 * @author nicklongo
 */
class mysql_db {
  // mysql server configuration
  /*
  private $dbhost = 'localhost';
  private $dbuser = '';
  private $dbpass = '';
  private $dbname = '';
  protected $mysql;
  */
  private $dbhost = "localhost";
  private $dbuser = "bdboryqu_userdb";
  private $dbpass = "UserDB=asd";
  private $dbname = "bdboryqu_database";
  protected $mysql;

  public function getMysql() {
    return $this->mysql;
  }

  // check if connection is alive, if not establish it
  function __construct() {
    if ( !is_resource($this->mysql) ) {
      $this->mysql = mysqli_connect( $this->dbhost, $this->dbuser, $this->dbpass, $this->dbname ) or $this->error();
      // Change character set to utf8
      mysqli_set_charset($this->mysql,"utf8");
     // mysql_select_db( $this->dbname, $this->mysql ) or $this->error();
    }
  }
  
  function mysql_db($servername, $username, $dbpassword, $dbname){
    $this->dbhost=$servername;
    $this->dbuser=$username;
    $this->dbpass=$dbpassword;
    $this->dbname=$dbname;

    $this->__construct();
  }

  // error reporting
  private function error() {
    return printf( 'MySQL ERROR: %s (%d)', mysqli_error($this->mysql), mysqli_errno($this->mysql) );
   }

  // handles queries resulting in output
  public function fetch_array( $query ) {
      $return = array();
    $mysql_query = mysqli_query( $this->mysql, $query ) or die (mysqli_error($this->mysql));
    while( $result = mysqli_fetch_array( $mysql_query, MYSQLI_ASSOC ) ) {
      $return[] = $result;
    }
    return $return;
  }
  
   // handles queries resulting in output
  public function fetch_array_by_id( $query ) {
    
    $return = $this->fetch_array($query);
    
    return $return[0];
  }
  
  // handles statements: update, insert etc. 
  public function query( $query ) {
    mysqli_query( $this->mysql, $query );
    return mysqli_affected_rows( $this->mysql);
  }
    
  // handles statements: update, insert etc. with last insert id
  public function queryId( $query ) {
    mysqli_query( $this->mysql, $query );
    return mysqli_insert_id($this->mysql);
  }
  
  
  // handles statements: update, insert etc. with last insert id
  /*public function multiQuery( $query ) {
    mysqli_query( $this->mysql, $query );
    return mysqli_affected_rows( $this->mysql);
  }*/
    
  // handles queries resulting in output
  public function fetch_array_table( $tabella, $where = "" ) {
    $query = "Select * From ".$tabella;
    
    if($where != "") {
      $query .= "Where ".$where;
    }
    
    $return = array();
    
    $return = $this->fetch_array($query);
    
    return $return;
  }
  
  
  
}
