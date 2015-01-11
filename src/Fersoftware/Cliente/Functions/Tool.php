<?php

namespace Fersoftware\Cliente\Functions;


class Tool
{
    public function ListStars($x)
    {
        $a = '';
        for($i=0; $i < $x;$i++)
        {
            $a .= "<i class='icon-star'></i>";
        }

        return  $a;
    }
}