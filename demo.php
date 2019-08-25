<?php
/**
 * Created by PhpStorm.
 * User: tu6ge
 * Date: 19-8-25
 * Time: 下午4:25
 */

include_once "vendor/autoload.php";


$tree = new \ElementTree\Tree();
$rs = $tree->get('dir_name');

echo json_encode($rs);