<?php


class main
{
    public $link;

    function __construct($link)
    {
        $this->link=$link;
    }
    //primary functions
    function insert($table, $column, $values){
        $query="INSERT INTO $table ($column) VALUES ($values)";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
    }

    function update($table, $change, $condition){
        $query="UPDATE $table SET $change WHERE $condition";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
    }


    //secondary checking functions
    function ifexist($table, $condition){
        $query = "SELECT * FROM $table WHERE $condition";
        $result = mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        if(mysqli_num_rows($result)==0){
            return False;
        }
        else{
            return True;
        }
    }

    //getters



}

?>
