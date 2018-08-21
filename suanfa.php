
1.求字符串的字集
基本思路： 每次递归将上一次的值保留到下一次递归循环中
并且注意循环的边界问题
function ziji($before = "",$step = 0){
        $arr = [1,2,3,6,5];
        var_dump($before);
        for($i = $step;$i<count($arr);$i++){
			//$i+1;//很重要,可以保持递归退出
            ziji($before.','.$arr[$i],$i+1);
        }

}
ziji();


2.1个明星 和n个人的关系


题目描述：有n个人，其中一个明星和n-1个群众，群众都认识明星，明星不认识任何群众，群众和群众之间的认识关系不知道，现在如果你是机器人R2T2，你每次问一个人是否认识另外一个人的代价为0(1),试设计一种算法找出明星，并给出时间复杂度。
思路 转换为 最大最小值的查询

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


3.打印数字

基本思路：
分为偶数 奇数运算，循环边界和开始结束值
n=3
1*2*3
7*8*9
4*5*6
0 对应 3,1 -- 123 
2 对应 3,7 -- 789
1 对应 3,4 -- 456
n=5
1*2*3*4*5  5*0 + 1
11*12*13*14*15 5*2 +1
21*22*23*24*25 5*4 +1
16*17*18*19*20 5*3 +1
6*7*8*9*10  5*1+1 

0 对应 5,1 -- 1,2,3,4,5
2 对应 5,11 -- 11 12 13 14 15
4 对应 5,21 -- 21 22 23 24 25
3 对应 5,16 -- 16 17 18 19 20
1 对应 5,6 -- 6 7 8 9 10

具体代码如下：
<?php
$i = 0;
$n = 5;
while($i<$n){
    printshuzi($n,$i*$n+1);
    $i += 2; //偶数计算
}
if($n%2==0){
    $i = $n -1;//判断奇偶数
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


3二分查找
递归思路：

<?php

function erfen($arr,$left,$right,$key){
    $len = count($arr);
    $min = intval(($left+$right)/2);
    for($i=0;$i<$len;$i++){
        if($key == $arr[$min]){
            return "yizhaodao weizhi". $min; //重点
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

4，求字符串的全排列
思路 固定 n-3 n-2前面的数字 使得 n-1 n变换位置
 
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
5，将字符串转为整数
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
6，判断字符串是否是整数

$str="12312";
var_dump(is_numeric($str));//判断是否是数值类型，有缺陷 空白字符也是正确的
var_dump(is_int($str));//判断是否是整形
var_dump(preg_match('/^\d*$/',$str));

7，字符串反转
思路1：
从要替换的最大值边界向内依次递减

function fanzhuanzifchuan($str, $start, $end){

 //$arr = explode(",",$str);
 $arr = str_split($str);//将字符串变为数组
 //$arr = str_split($str,3);//以3个字符 分割为数组
 $final = $end+1;//最后---
 while($final > $start){//循环递减
    $tmp = $arr[$start];//保存最小值 用于与最大值替换
    for($j=$start+1;$j<$final;$j++){
        $arr[$j-1] = $arr[$j];
    }
    $arr[$final-1] = $tmp;
    $final--;
 }
 return $arr;
}
对称替换法
思路找到中心点然后替换
function duibanfanzhuan($str,$start,$end){
        $arr = str_split($str);
        $mid = ($end-$start)/2 + $start; //中心点 加上 开始 位置 就等于真实的中心点

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


8，字符串旋转
思路： 每次将 start元素 保留tmp然后，依次替换最后一位
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

9.判断是否为回文字串
思路 寻找中心点 然后 依次比较 最小 最大值
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
        var_dump("不是回文");
$ishui=false;
     }
  }
  if($ishui){
    var_dump("是回文啊老铁");
  }
}
huiwen("abba");
huiwen("abcba");
huiwen("abbbcbbba");

10.求最大回文字串




11.求字符串包含问题

思路1： 暴力循环，外层为 小字符串，内存为大字符串，判断不相等的值 是否等于 大字符串的长度，
如果相等则不包含

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
     var_dump("都不嫌等");
   }
}

var_dump($bd);

12.

















































