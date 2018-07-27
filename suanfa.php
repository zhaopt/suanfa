
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
1*2*3*4*5
11*12*13*14*15
21*22*23*24*25
16*17*18*19*20
6*7*8*9*10

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
            return "yizhaodao weizhi". $min;
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













