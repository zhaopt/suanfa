
1.���ַ������ּ�
����˼·�� ÿ�εݹ齫��һ�ε�ֵ��������һ�εݹ�ѭ����
����ע��ѭ���ı߽�����
function ziji($before = "",$step = 0){
        $arr = [1,2,3,6,5];
        var_dump($before);
        for($i = $step;$i<count($arr);$i++){
			//$i+1;//����Ҫ,���Ա��ֵݹ��˳�
            ziji($before.','.$arr[$i],$i+1);
        }

}
ziji();


2.1������ ��n���˵Ĺ�ϵ


��Ŀ��������n���ˣ�����һ�����Ǻ�n-1��Ⱥ�ڣ�Ⱥ�ڶ���ʶ���ǣ����ǲ���ʶ�κ�Ⱥ�ڣ�Ⱥ�ں�Ⱥ��֮�����ʶ��ϵ��֪��������������ǻ�����R2T2����ÿ����һ�����Ƿ���ʶ����һ���˵Ĵ���Ϊ0(1),�����һ���㷨�ҳ����ǣ�������ʱ�临�Ӷȡ�
˼· ת��Ϊ �����Сֵ�Ĳ�ѯ

function findStar2($arr,$n){

    $star = 0;
    $flag = 0;
    for($i=0;$i<count($arr);$i++){
        if($arr[$star] > $arr[$i]){
            $star = $i;
            $flag = 0;
        }elseif($arr[$star] == $arr[$i]){
            $flag++;
        }


    }
    if($flag >0){
        return -1;
    }
    var_dump($star);
}

findStar2([5,1,3,4,7,8,9],1);


3.��ӡ����

����˼·��
��Ϊż�� �������㣬ѭ���߽�Ϳ�ʼ����ֵ
n=3
1*2*3
7*8*9
4*5*6
0 ��Ӧ 3,1 -- 123 
2 ��Ӧ 3,7 -- 789
1 ��Ӧ 3,4 -- 456
n=5
1*2*3*4*5  5*0 + 1
11*12*13*14*15 5*2 +1
21*22*23*24*25 5*4 +1
16*17*18*19*20 5*3 +1
6*7*8*9*10  5*1+1 

0 ��Ӧ 5,1 -- 1,2,3,4,5
2 ��Ӧ 5,11 -- 11 12 13 14 15
4 ��Ӧ 5,21 -- 21 22 23 24 25
3 ��Ӧ 5,16 -- 16 17 18 19 20
1 ��Ӧ 5,6 -- 6 7 8 9 10

����������£�
<?php
$i = 0;
$n = 5;
while($i<$n){
    printshuzi($n,$i*$n+1);
    $i += 2; //ż������
}
if($n%2==0){
    $i = $n -1;//�ж���ż��
}else{
    $i = $n -2;
}

while($i>0){
    printshuzi($n,$i*$n+1);
    $i -= 2;
}
function printshuzi($n,$offset)
{
   $i = 0;
   $len = $offset + $n;
   for($i=$offset;$i<$len;$i++){
        if($i <$len-1){
            echo $i."*";
        }else{
            echo $i."\n";
        }
   }

}


3���ֲ���
�ݹ�˼·��

<?php

function erfen($arr,$left,$right,$key){
    $len = count($arr);
    $min = intval(($left+$right)/2);
    for($i=0;$i<$len;$i++){
        if($key == $arr[$min]){
            return "yizhaodao weizhi". $min; //�ص�
        }elseif($key > $arr[$min]){
            $left = $min+1;
			return   erfen($arr,$left,$right,$key);
        }else{
            $right = $min-1;
			return   erfen($arr,$left,$right,$key);
        }
    }
    return   false;
}

var_dump(erfen([1,3,4,5,76,99],0,6,99));

4�����ַ�����ȫ����
˼· �̶� n-3 n-2ǰ������� ʹ�� n-1 n�任λ��
 
function quanpailie($str,$start,$end){

   if($start == $end){
     $result = [];
     if(!in_array($str,$result)){
          echo $str."\n";
          $result[] = $str;

     }else{
      return false;
     }

   }else{
     for($i=$start;$i<$end;$i++){
        if($str[$i]!=$str[$i+1]){
          $str = swap($str,$start,$i);
          quanpailie($str,$start+1,$end);
          $str = swap($str,$start,$i);
        }
     }
   }

  return $result;
}
function swap($str,$curet,$index){
  $tmp = $str[$curet];
  $str[$curet] = $str[$index];
  $str[$index] = $tmp;
  return $str;
}
var_dump(quanpailie("abc",0,3));
5�����ַ���תΪ����
$str1 = "abc1";
$str2 = "1abc1";
$abc = sprintf("%d",$str1); //0
$abc = sprintf("%d",$str2); //1
$abc = intval($str1);//0
$abc = intval($strs);//1
var_dump($abc);
var_dump($str1 * 1); // 0
var_dump($str2 * 1);//1
var_dump((int)$str2);//1

int > intval > sprintf
6���ж��ַ����Ƿ�������

$str="12312";
var_dump(is_numeric($str));//�ж��Ƿ�����ֵ���ͣ���ȱ�� �հ��ַ�Ҳ����ȷ��
var_dump(is_int($str));//�ж��Ƿ�������
var_dump(preg_match('/^\d*$/',$str));

7���ַ�����ת
˼·1��
��Ҫ�滻�����ֵ�߽��������εݼ�

function fanzhuanzifchuan($str, $start, $end){

 //$arr = explode(",",$str);
 $arr = str_split($str);//���ַ�����Ϊ����
 //$arr = str_split($str,3);//��3���ַ� �ָ�Ϊ����
 $final = $end+1;//���---
 while($final > $start){//ѭ���ݼ�
    $tmp = $arr[$start];//������Сֵ ���������ֵ�滻
    for($j=$start+1;$j<$final;$j++){
        $arr[$j-1] = $arr[$j];
    }
    $arr[$final-1] = $tmp;
    $final--;
 }
 return $arr;
}
�Գ��滻��
˼·�ҵ����ĵ�Ȼ���滻
function duibanfanzhuan($str,$start,$end){
        $arr = str_split($str);
        $mid = ($end-$start)/2 + $start; //���ĵ� ���� ��ʼ λ�� �͵�����ʵ�����ĵ�

        for($i=0;$i<=$mid-$start;$i++){
            swaps($arr,$start+$i,$end-$i);
        }
        var_dump($arr);
}

function swaps(&$arr,$ct,$index){
  $tmp = $arr[$index];
  $arr[$index] = $arr[$ct];
  $arr[$ct] = $tmp;
}

duibanfanzhuan("abcdef",2,4);
var_dump(fanzhuanzifchuan("abcdef",2,4)); ab edc f

var_dump(implode(",",[1,2,3,4,5]));


8���ַ�����ת
˼·�� ÿ�ν� startԪ�� ����tmpȻ�������滻���һλ
function zifcxz($str,$start,$end){
   $arr = str_split($str);
   $len = count($arr);
   while($end--){
       $tmp = $arr[$start];
       for($i=$start;$i<$len;$i++){
var_dump($arr[$i]);
          $arr[$i] =$arr[$i+1];
       }
       $arr[$len-1] = $tmp;
   }
   var_dump($arr);
}
zifcxz("abcde",0,3); deabc

abcde aebcd

9.�ж��Ƿ�Ϊ�����ִ�
˼· Ѱ�����ĵ� Ȼ�� ���αȽ� ��С ���ֵ
function huiwen($str){

  $len = strlen($str);
  $min = $len/2 + 1;

$arr = str_split($str);
  for($i=0;$i<$min;$i++){
      if($arr[$i] != $arr[$len-$i-1]){
        return "bs";
      }
  }

}
var_dump(huiwen("abcba"));

function huiwen($str){

  $len = strlen($str)-1;
  $mid = $len/2;
  $ishui = true;
  for($i=0;$i<$mid;$i++){
     if($str[$i] != $str[$len-$i]){
        var_dump("���ǻ���");
$ishui=false;
     }
  }
  if($ishui){
    var_dump("�ǻ��İ�����");
  }
}
huiwen("abba");
huiwen("abcba");
huiwen("abbbcbbba");

10.���������ִ�




11.���ַ�����������

˼·1�� ����ѭ�������Ϊ С�ַ������ڴ�Ϊ���ַ������жϲ���ȵ�ֵ �Ƿ���� ���ַ����ĳ��ȣ�
�������򲻰���

$str1 = "abbba";
$str2 = "ba";

for($i=0;$i<strlen($str2);$i++){
   $bd=0;
    for($j=0;$j<strlen($str1);$j++){
        if($str1[$i]!= $str2[$j]){
                $bd++;
        }
    }
   if($bd == strlen($str)){
     var_dump("�����ӵ�");
   }
}

var_dump($bd);

12.

















































