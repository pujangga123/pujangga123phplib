<?php
    function generateId() {
        return date("ymdHis").rand(1000,9999);
    }

    function generateUpdate($row) {
        $line = '';
        foreach($row as $key => $val) {
          $val = is_null($val)?"NULL":$val;
          if(is_num($key)||($val=='NULL')) {
            $line .= " $key = $val,";
    
          } else {
            $line .= " $key = '". addslashes($val)."',";
          }
        }
        $line = substr($line,0, -1);
        return $line;
      }
    
      function generateInsert($row) {
        $keystr = '(';
        $valstr = '(';
        foreach($row as $key => $val) {
          $val = is_null($val)?"NULL":$val;
          if(is_num($key)||($val=='NULL')) {
            $keystr .= "$key,";
            $valstr .= "$val,";
          } else {
            $keystr .= "$key,";
            $valstr .= "'".addslashes($val)."',";
          }
        }
        $keystr = substr($keystr,0, -1).') ';
        $valstr = substr($valstr,0, -1).') ';
        
        $lines = $keystr.' VALUES '.$valstr;
        return $lines;
      }