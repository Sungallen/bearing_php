<?php
require "DataBaseConfig.php";

class Database
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function find($table, $diameter, $H, $L, $A, $J)
    {
        $diameter = $this->prepareData($diameter);
        $H = $this->prepareData($H);
        $L = $this->prepareData($L);
        $A = $this->prepareData($A);
        $J = $this->prepareData($J);
        $this->sql =
            "select model from ". $table . " where diameter = '" . $diameter ."' and H = '".$H."' and L = '".$L."' and A = '".$A."' and J = '".$J."'";
        $result = mysqli_query($this->connect, $this->sql);
        $ans = mysqli_fetch_row($result);
        return $ans[0];
    }

}