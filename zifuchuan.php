
1.�ַ������ڽ��бȽϺ��жϵ�ʱ�������Զ�ת������

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