<?php

class Tools
{

}

function _print_r($arr)
{
    echo '<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />';
    echo '<pre>';
    print_r($arr);
    echo '<pre>';
    exit;
}

function _var_dump($obj)
{
    echo '<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />';
    echo '<pre>';
    var_dump($obj);
    echo '<pre>';
    exit;
}

