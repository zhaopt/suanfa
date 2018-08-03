func_get_args()获取方法传递数据
$_POST
1.求数组元素是指定值的和的两个数
思路一 2次遍历

$arr = [1,3,4,7,2,9];
$len = count($arr);
$sum = 5;
for($i=0;$i<$len;$i++){

    for($j=$i;$j<$len;$j++){ //$j=$i 防止再次循环遍历之前的
        if(($i!=$j)&&$arr[$i] == $sum-$arr[$j] ){
                echo $i.":".$j;
                return false;
        }
    }

}
思路2 利用快速排序，
排完序之后，只需要循环一遍比大小就可以了

function quicksort($arr)
{      
       if(count($arr)<=1){
			return $arr;
       }
       $leftArr = $rightArr = [];
       $baseNum = $arr[0];
       for($i=1;$i<count($arr);$i++){//***重点 必须从1 开始 为0 报错
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


2.求连续子数组的和最大的一个
思路循环遍历 3次
最外层循环是 循环次数
中层循环是为了逻辑判断确定出来最大值最小值以及其开始结束位置
最后一层循环是 计算每轮的和 比如 0,1  0,1,2
$arra = [3,-6,1,2,3,-1,2,-5,1,2];
此方法变种一下 适用于求 字串的全集合
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

思路2 ：2次循环，还是比较最大值
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

思路三 一次循环，判断之前的值加起来是否大于0，
如果小于0 那么就另起炉灶搞
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


3数组元素正负值变化位置

思路1 进行2次不一样的循环，每个循环写入一遍数据

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



思路2 利用插入排序，遇到小于0 的数，替换
位置到 边界处，
边界是为了确定 小于0的位置，和遍历次数
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























