1.桶排序

预备一个桶，将待排序的数组一次放进桶里，
然后循环取出

function tongpaixu($tongLength,$arr)
{
   
   $tongArr[] = 0;
   for($i=0;$i<count($arr);$i++){
        $tongArr[$arr[$i]]++;
   }
 
   for($i=0;$i<$tongLength;$i++){
        for($j=0;$j<$tongArr[$i];$j++){
                var_dump($i);
        }
   }

}
桶的大小必须高于待排序最大值
tongpaixu(8,[1,2,4,7,3,2]);

2.冒泡排序
思路：
2层循环，外层负责循环次数内层负责两两比较
两两比较就要注意 数组越界问题
function maopaopaixu($arr)
{

   for($i=0;$i<count($arr);$i++){
        for($j=0;$j<count($arr)-$i-1;$j++){ //数组越界，越界值变为null就会无限循环
                if($arr[$j]>$arr[$j+1]){
                        $tmp = $arr[$j];
                        $arr[$j] = $arr[$j+1];
                        $arr[$j+1] = $tmp;
                }
        }
   }
   var_dump($arr);
}
maopaopaixu($arr);

3.快速排序

思路：
设立一个基数与数组进行比较，大于基数的放右边
小于基数的放左边，递归数次，之后合并
注意的是 ，基数是下标为0 这个时候 再次进行比较的
时候就把0去掉从1开始
时间复杂度为 O(nlogn)
function kuaisupaixu($arr)
{  
   if(count($arr)<=1){
        return $arr;
   }
   
   $baseNum = $arr[0];
   $leftArr = $rightArr = [];
   for($i=1;$i<count($arr);$i++){ //从1开始
        if($baseNum > $arr[$i]){
             $leftArr[] = $arr[$i];
        }else{
             $rightArr[] = $arr[$i];
        }
   }
   $leftArr = kuaisupaixu($leftArr);
   $rightArr = kuaisupaixu($rightArr);          
   return array_merge($leftArr,[$baseNum],$rightArr);
}

var_dump(kuaisupaixu([6,5,2,1,4,8]));

4.选择排序
思路 ：设定一个最小值，
让他去遍历，获得比他还小的值进行替换

注意的地方，外层为循环次数，内层为比较逻辑
内层起始点为 $i因为之前的已经替换了

注意 每次 $min都会被替换，这样才实现了排序
function xuanzepaixu($arr)
{
  $len = count($arr);
   
  for($i=0;$i<$len;$i++){
        $min = $i;
        for($j=$i;$j<$len;$j++){
           if($arr[$j] < $arr[$min]){
                $min = $j; //每次min都会被替换
           }    
        }

        if($min!=$i){
           $tmp = $arr[$i];
           $arr[$i] = $arr[$min];
           $arr[$min] = $tmp;
        }

  }
  var_dump($arr);
}
xuanzepaixu($arr);

5.插入排序

思路：拿出待排序的值，插入到已排好序的列表里面。
然后进行比较替换。

function charupaixu($arr)
{
    $len = count($arr);
    for($i=1;$i<$len;$i++){//从1开始 默认0是排好序的
        $tmp = $arr[$i]; //待排序的值
        for($j=$i;$j>=0;$j--){ //是因为 $j之前是已排好序的
            if($tmp<$arr[$j]){
                $arr[$j+1] = $arr[$j]; //$j进行了--操作
                $arr[$j] = $tmp;
            }
        }
    }
    var_dump($arr);
}

charupaixu([1,2,7,5,8]);


6。希尔排序
进阶的插入排序（对插入排序进行 增量之后，各增量进行排序比较）
分3层比较

最外层 增量大小
内两层进行 增量排序


function xierpaixu($arr){
   $len = count($arr);
   $mid = floor($len/2); //2分增量

   for($k=$mid;$k>0;$k = floor($k/ 2)){
        for($i=$k;$i<$len;$i++) { //注意
            for($j=$i;$j>=$k;$j -= $k){
                if($arr[$j-$k] > $arr[$j]){
                    $tmp = $arr[$j-$k];
                    $arr[$j-$k] = $arr[$j];
                    $arr[$j] = $tmp;
                }
           }
        }
   }
   var_dump($arr);
}


7.归并排序
思路：采取分治的手段，将数组首先分成2部分
然后在对这两部分进行递归分，分到最后只剩一部分，然后对最后的值进行
排序
function guibing($arr,$brr){ //最终排序
   $crr = [];
   while(count($arr)&&count($brr)){
       $crr[] = $arr[0] <$brr[0] ?array_shift($arr):array_shift($brr);
   }
   
   return array_merge($crr,$arr,$brr);
}
function guibingmain($arr){
   if(count($arr)<=1){
        return $arr;
   }
   $mid = floor(count($arr)/2);
   $leftArr = array_slice($arr,0,$mid);
   $rightArr = array_slice($arr,$mid);

   $leftArr = guibingmain($leftArr);
   $rightArr = guibingmain($rightArr);

   $all = guibing($leftArr,$rightArr);

   return $all;

}
var_dump(guibingmain([1,11,13,2,10,5,9]));

8.堆排序

堆 是一个特殊的二叉树

关于堆：
  堆中某个节点的值总是不大于或不小于其父节点的值；
  堆总是一棵完全二叉树（下面）。
  将根节点最大的堆叫做最大堆或大根堆，根节点最小的堆叫做最小堆或小根堆。

根结点最大就是大顶堆
根节点最小就是小顶堆
除了最底层之外,每一层都是满的,这使得堆可以利用数组来表示,每一个结点对应数组中的一个元素.
思路 

建堆，然后取最大值

function swap(&$arr,$a,$b){
    $tmp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $tmp;
}
//比较替换
function headAdjust(&$arr,$start,$end){
    $tmp = $arr[$start];

    for($j=2*$start+1;$j<=$end;$j=2*$j+1){
        if($j!=$end && $arr[$j]<$arr[$j+1]){//根结点跟右孩子比较
           $j++;//转为右结点
        }
        if($tmp >=$arr[$j]){
                break;
        }

        $arr[$start] = $arr[$j];
        $start = $j;
    }
    $arr[$start] = $tmp;
}

function headSort(&$arr)
{

    $count = count($arr);
    for($i=floor($count/2)-1;$i>=0;$i--){
        headAdjust($arr,$i,$count);
    }

    for($i=$count-1;$i>=0;$i--){
        swap($arr,0,$i);
        headAdjust($arr,0,$i-1);
    }

}
$arr = [2,3,9,7];
headSort($arr);
var_dump($arr);


































