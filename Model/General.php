<?php 

namespace App;

class General {

    public function getRowData($table, $column, $condition, $input) 
    {
        global $db;

        $row = $db->table($table)->where($condition, $input)->first();
        return $row[$column];
    }

    public function getRow($table, $condition, $value)
    {
        global $db;

        $row = $db->table($table)->where($condition, $value)->first();
        return $row;
    }

   
}