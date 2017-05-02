<?php

$array = array(
'test'=>urlencode("我是测试")
);
$array = json_encode($array);
echo urldecode($array);
//{"test":"我是测试"} 





