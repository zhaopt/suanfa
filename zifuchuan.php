
1.�ַ������ڽ��бȽϺ��жϵ�ʱ�������Զ�ת������,

�ַ��������������л�ȡ�Ļ���
��������к��� ���ȡ��

��
$str = "abc";
var_dump(intval($str)); //0
$str = "1abc";
var_dump(intval($str)); //1 ֻ�ᱣ�������ֵĲ���

2.�ж�һ���ַ����Ƿ�Ϊ����

$str = "123abc"; //��������
if(is_numeric($str)){
	var_dump("������");
}
var_dump(is_numeric($str));
var_dump(is_int($str));
var_dump(preg_match("/^\d*$/","123")); // 1
var_dump(preg_match("/^\d*$/",$str));  // 0
��ѧ���� ��һ�����ж��� �ַ���
var_dump("123abc"); //123
var_dump("abc123"); // 0
�˷�����
var_dump("123abc"*1); //123
var_dump("abc123" *1); //0

3.�ַ�����ȡ
$str = "123456";
var_dump(substr($str,0,3)); // 123,���㿪ʼ��ȡ3���ַ�
var_dump(strpos($str,"4")); //3 �����ַ�����һ�γ��ֵ�λ��
var_dump(strrpos($str,"4")); //3 �����ַ������һ�γ��ֵ�λ��
var_dump(strstr($str,"a")); //abc �����ַ�������������ʣ�µ��ַ���
var_dump(strchr($str,"s"));//abc �����ַ�������������ʣ�µ��ַ���
var_dump(strchr($str,"a",true));//123 �����ַ�������������ʣ�µ��ַ���
var_dump(strrchr($str,"3"));���������ַ�������һ���ַ��������һ�γ��ֵ�λ�ã������شӸ�λ�õ��ַ�����β�������ַ���


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

$str ="sdf����";
$encode = mb_detect_encoding($str, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
var_dump($encode);
var_dump(mb_substr($str,0,4,$encode)); //�������ȡ�ַ���

$str_encode = mb_convert_encoding($str, 'UTF-8', $encode); ���ַ�������תΪutf-8

echo iconv('GB2312', 'UTF-8', $str); //���ַ����ı����GB2312ת��UTF-8




���������ֱȽϨC������� 
��������һ�������ǲ����͵ģ���ת�ɲ����ͽ��бȽ� true>false 
��������û�в����͵ģ���������һ�����������֣���ת������ �Ƚ� 
�����߶��������ַ�����ת���������Ƚ� 
�ݱȽ�����������߶����ַ������ͣ����׸��ַ���ʼ���αȽ�ASCIIֵ���ĸ����ֹͣ�����Ƚϡ�


������utf8��ռ��3���ֽ�
function jiequ($str,$i,$len){
   var_dump(mb_detect_encoding($str, "UTF-8,GB2312,GBK"));
    for($j = $i;$j<$len;$j++){
        if(ord(substr($str,$j,1))>127){
            var_dump("ccc");
            $newstr .= substr($str,$j,3);
            $j = $j+2; //����---------
        }else{
            $newstr .= substr($str,$j,1);
        }
    }
    var_dump($newstr);
}
jiequ("�;�xdsf123a",0,8);
























