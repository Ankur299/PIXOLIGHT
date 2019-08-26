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

    function delete($table, $condition){
        $query = "DELETE FROM $table WHERE $condition";
        return mysqli_query($this->link, $query) or die(mysqli_error($this->link));
    }

    //secondary checking functions
    function ifexist($table, $condition){

        /*
         * is a boolean function.
         * accepts two strings. one is table name and the other is condition
         */

        $query = "SELECT * FROM $table WHERE $condition";
        $result = mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        if(mysqli_num_rows($result)==0){
            return False;
        }
        else{
            return True;
        }
    }

    function count($table, $condition){
        /*
        * returns row count.
        * accepts two strings. one is table name and the other is condition
        */

        $query = "SELECT * FROM $table WHERE $condition";
        $result = mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        $num=mysqli_num_rows($result);

        return $num;
    }


    //getters

    function FindColumn($table, $condition, $column){
        /*
         * it returns the value of the column defined by $column
         * accepts 3 @params. table_name, condition, column_name
         */

        $query = "SELECT * FROM $table WHERE $condition";
        $result = mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        $row = mysqli_fetch_array($result);
        return $row["$column"];
    }

    function ReturnResult($table, $condition){
        /*
         * returns the result of a query
         * accepts two  @params. table_name and condition
         */

        $query = "SELECT * FROM $table WHERE $condition";
        $result = mysqli_query($this->link, $query) or die(mysqli_error($this->link));
        return $result;
    }



}

