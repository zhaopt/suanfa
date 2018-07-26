
1.字符串，在进行比较和判断的时候会进行自动转换类型,

字符串如果按数组进行获取的话，
如果里面有汉子 会读取空

如
$str = "abc";
var_dump(intval($str)); //0
$str = "1abc";
var_dump(intval($str)); //1 只会保留是数字的部分

2.判断一个字符串是否为整形

$str = "123abc"; //不是数字
if(is_numeric($str)){
	var_dump("是数字");
}
var_dump(is_numeric($str));
var_dump(is_int($str));
var_dump(preg_match("/^\d*$/","123")); // 1
var_dump(preg_match("/^\d*$/",$str));  // 0
数学运算 不一定能判断是 字符串
var_dump("123abc"); //123
var_dump("abc123"); // 0
乘法运算
var_dump("123abc"*1); //123
var_dump("abc123" *1); //0

3.字符串截取
$str = "123456";
var_dump(substr($str,0,3)); // 123,从零开始截取3个字符
var_dump(strpos($str,"4")); //3 查找字符串第一次出现的位置
var_dump(strrpos($str,"4")); //3 查找字符串最后一次出现的位置
var_dump(strstr($str,"a")); //abc 查找字符串并返回他跟剩下的字符串
var_dump(strchr($str,"s"));//abc 查找字符串并返回他跟剩下的字符串
var_dump(strchr($str,"a",true));//123 查找字符串并返回他跟剩下的字符串
var_dump(strrchr($str,"3"));函数查找字符串在另一个字符串中最后一次出现的位置，并返回从该位置到字符串结尾的所有字符。


$pathfile = __FILE__; // 
var_dump($pathfile); "/home/test/zifuchuan.php"
var_dump(strrchr($pathfile,".")); .php
var_dump(substr(strrchr($pathfile,"."),1)); //php


var_dump(explode(".",$pathfile)); 
array(2) {
  [0]=>
  string(20) "/home/test/zifuchuan"
  [1]=>
  string(3) "php"
}

var_dump(end(explode(".",$pathfile))); //php
var_dump(array_pop(explode(".",$pathfile)));  //php
var_dump(pathinfo($pathfile)['extension']); // php

$str ="sdf健身房";
$encode = mb_detect_encoding($str, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
var_dump($encode);
var_dump(mb_substr($str,0,4,$encode)); //无乱码截取字符串

$str_encode = mb_convert_encoding($str, 'UTF-8', $encode); 将字符串编码转为utf-8

echo iconv('GB2312', 'UTF-8', $str); //将字符串的编码从GB2312转到UTF-8




①两个数字比较–正常情况 
②其中有一个数据是布尔型的，则都转成布尔型进行比较 true>false 
③数据中没有布尔型的，但其中有一个数据是数字，则转成数字 比较 
④两边都是数字字符串，转成数字来比较 
⑤比较运算符中两边都是字符串类型，从首个字符开始依次比较ASCII值，哪个大就停止后续比较。


中文在utf8下占用3个字节
function jiequ($str,$i,$len){
   var_dump(mb_detect_encoding($str, "UTF-8,GB2312,GBK"));
    for($j = $i;$j<$len;$j++){
        if(ord(substr($str,$j,1))>127){
            var_dump("ccc");
            $newstr .= substr($str,$j,3);
            $j = $j+2; //补数---------
        }else{
            $newstr .= substr($str,$j,1);
        }
    }
    var_dump($newstr);
}
jiequ("就惊xdsf123a",0,8);
























