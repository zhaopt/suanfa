
1.字符串，在进行比较和判断的时候会进行自动转换类型

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