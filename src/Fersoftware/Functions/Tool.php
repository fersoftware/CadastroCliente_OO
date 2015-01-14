<?php

namespace Fersoftware\Functions;

class Tool
{
    public static function ListStars($x)
    {
        $a = '';
        for($i=0; $i < $x;$i++)
        {
            $a .= "<i class='icon-star'></i>";
        }

        return  $a;
    }
}