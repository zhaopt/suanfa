func_get_args()��ȡ������������
$_POST
1.������Ԫ����ָ��ֵ�ĺ͵�������
˼·һ 2�α���

$arr = [1,3,4,7,2,9];
$len = count($arr);
$sum = 5;
for($i=0;$i<$len;$i++){

    for($j=$i;$j<$len;$j++){ //$j=$i ��ֹ�ٴ�ѭ������֮ǰ��
        if(($i!=$j)&&$arr[$i] == $sum-$arr[$j] ){
                echo $i.":".$j;
                return false;
        }
    }

}
˼·2 ���ÿ�������
������֮��ֻ��Ҫѭ��һ��ȴ�С�Ϳ�����

function quicksort($arr)
{      
       if(count($arr)<=1){
			return $arr;
       }
       $leftArr = $rightArr = [];
       $baseNum = $arr[0];
       for($i=1;$i<count($arr);$i++){//***�ص� �����1 ��ʼ Ϊ0 ����
           if($baseNum > $arr[$i]){
             $leftArr[] = $arr[$i];
           }else{
             $rightArr[] = $arr[$i];
           }
       }
       
       $leftArr = quicksort($leftArr);
       $rightArr = quicksort($rightArr);
       
       return array_merge($leftArr,[$baseNum],$rightArr);
}

$arr = quicksort($arr);
$i = 0;
$j = count($arr)-1;

while($i<$j){
   $tmp = $arr[$i] +$arr[$j];
   if($tmp == $sum){
        echo $i.":".$j;break;
   }elseif($tmp>$sum){
      $j--;
   }else{
      $i++;
   }
}

var_dump(123);


2.������������ĺ�����һ��
˼·ѭ������ 3��
�����ѭ���� ѭ������
�в�ѭ����Ϊ���߼��ж�ȷ���������ֵ��Сֵ�Լ��俪ʼ����λ��
���һ��ѭ���� ����ÿ�ֵĺ� ���� 0,1  0,1,2
$arra = [3,-6,1,2,3,-1,2,-5,1,2];
�˷�������һ�� �������� �ִ���ȫ����
function findzichuan($arra){
  $max = $arra[0];
  $currenSum = 0;
  $start = 0;
  $end=0;
  for($i=0;$i<count($arra);$i++){
        for($j=$i;$j<count($arra);$j++){
             for($k = $i;$k<=$j;$k++){
                $currenSum += $arra[$k];
             }
             if($currenSum > $max){
                $max = $currenSum;
                $start = $i;
                $end=$j;
             }
             $currenSum = 0;
        }
  }
var_dump($max);
  for($i=$start;$i<=$end;$i++){
        $str .= $arra[$i];
        if($i!=$end){
           $str .= ",";
        }
  }
var_dump($str);
}

findzichuan($arra);

˼·2 ��2��ѭ�������ǱȽ����ֵ
<?php
function zshuzuqiuhe($arr)
    $currentSum = 0;
    $maxSum = $arr[0];
    $end = 0;
    for($i=0;$i<$len;$i++){
        for($j=$i;$j<$len;$j++){
            $currentSum += $arr[$j];
        }

        if($currentSum > $maxSum){
                $maxSum = $currentSum;
                $start = $i;
                $end = $j;
        }
        $currentSum = 0;
    }

    for($i=$start;$i<=$end;$i++){
        echo $arr[$i].'--';
    }
}

zshuzuqiuhe([8,-8,3,4,-6,5,-7,12]);

    for($i=$start;$i<=$end;$i++){
        echo $arr[$i].'--';
    }
}
$arr = [8,-8,3,4,-6,5,-7,12];
zshuzuqiuhe([8,-8,3,4,-6,5,-7,12]);

˼·�� һ��ѭ�����ж�֮ǰ��ֵ�������Ƿ����0��
���С��0 ��ô������¯���
function newfind($arr){

  $lastSum = 0;
  $maxSum = $arr[0];
  for($i=0;$i<$len;$i++){
        if($lastNum > 0){
           $lastNum = $lastNum + $arr[$i];
        }else{
           $lastNum = $arr[$i];
           $start = $i;
        }
        if ($maxSum < $lastNum){
            $maxSum = $lastNum;
            $end = $i;
        }
  }

  for($i=$start;$i<=$end;$i++){
      echo $arr[$i]."--";
  }

}
newfind($arr);


3����Ԫ������ֵ�仯λ��

˼·1 ����2�β�һ����ѭ����ÿ��ѭ��д��һ������

function zhengfu($arr){
  $len = count($arr);
 $newarr = [];
  for($i=0;$i<$len;$i++){
     if($arr[$i]>0){
       $newarr[] = $arr[$i];
     }
  }
  for($i=0;$i<$len;$i++){
      if($arr[$i]<0){
        $newarr[] = $arr[$i];
      }
  }
 var_dump($newarr);
}

zhengfu($arr);



˼·2 ���ò�����������С��0 �������滻
λ�õ� �߽紦��
�߽���Ϊ��ȷ�� С��0��λ�ã��ͱ�������
function fenli($arr){
   $len = count($arr);
   $index = 0;
   for($i=0;$i<$len;$i++){
        if($arr[$i]<0){
            for($j=$i;$j>$index;$j--){
                $tmp = $arr[$j-1];
                $arr[$j-1] = $arr[$j];
                $arr[$j] = $tmp;
            }
            $index++;
        }
   }
   var_dump($arr);
}
fenli($arr);























