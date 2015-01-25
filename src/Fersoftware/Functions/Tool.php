<?php

namespace Fersoftware\Functions;

use Fersoftware\Database\Connection;
use Fersoftware\Database\Query;

class Tool
{
    static $pdo;
    static $connection;

    public static function ListStars($x)
    {
        $a = '';
        for($i=0; $i < $x;$i++)
        {
            $a .= "<i class='icon-star'></i>";
        }

        return  $a;
    }

    public  static  function TypePerson($x)
    {
        $a = '';

        if(strlen($x) <= 13)
        {
            $a = "F";
        }
        else
        {
            $a = "J";
        }
        return $a;
    }

    public static function pdo_sql_debug($sql,$placeholders)
    {
        foreach($placeholders as $k => $v)
        {
            $sql = preg_replace('/:'.$k.'/',"'".$v."'",$sql);
        }
        return $sql;
    }

}