
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
��ѧ���� ��һ�����ж��� �ַ���
var_dump("123abc"); //123
var_dump("abc123"); // 0
�˷�����
var_dump("123abc"*1); //123
var_dump("abc123" *1); //0

3.�ַ�����ȡ