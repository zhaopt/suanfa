
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
1*2*3*4*5
11*12*13*14*15
21*22*23*24*25
16*17*18*19*20
6*7*8*9*10

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













