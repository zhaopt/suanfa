1.Ͱ����

Ԥ��һ��Ͱ���������������һ�ηŽ�Ͱ�
Ȼ��ѭ��ȡ��

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
Ͱ�Ĵ�С������ڴ��������ֵ
tongpaixu(8,[1,2,4,7,3,2]);

2.ð������
˼·��
2��ѭ������㸺��ѭ�������ڲ㸺�������Ƚ�
�����ȽϾ�Ҫע�� ����Խ������
function maopaopaixu($arr)
{

   for($i=0;$i<count($arr);$i++){
        for($j=0;$j<count($arr)-$i-1;$j++){ //����Խ�磬Խ��ֵ��Ϊnull�ͻ�����ѭ��
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

3.��������

˼·��
����һ��������������бȽϣ����ڻ����ķ��ұ�
С�ڻ����ķ���ߣ��ݹ����Σ�֮��ϲ�
ע����� ���������±�Ϊ0 ���ʱ�� �ٴν��бȽϵ�
ʱ��Ͱ�0ȥ����1��ʼ
ʱ�临�Ӷ�Ϊ O(nlogn)
function kuaisupaixu($arr)
{  
   if(count($arr)<=1){
        return $arr;
   }
   
   $baseNum = $arr[0];
   $leftArr = $rightArr = [];
   for($i=1;$i<count($arr);$i++){ //��1��ʼ
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

4.ѡ������
˼· ���趨һ����Сֵ��
����ȥ��������ñ�����С��ֵ�����滻

ע��ĵط������Ϊѭ���������ڲ�Ϊ�Ƚ��߼�
�ڲ���ʼ��Ϊ $i��Ϊ֮ǰ���Ѿ��滻��

ע�� ÿ�� $min���ᱻ�滻��������ʵ��������
function xuanzepaixu($arr)
{
  $len = count($arr);
   
  for($i=0;$i<$len;$i++){
        $min = $i;
        for($j=$i;$j<$len;$j++){
           if($arr[$j] < $arr[$min]){
                $min = $j; //ÿ��min���ᱻ�滻
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

5.��������

˼·���ó��������ֵ�����뵽���ź�����б����档
Ȼ����бȽ��滻��

function charupaixu($arr)
{
    $len = count($arr);
    for($i=1;$i<$len;$i++){//��1��ʼ Ĭ��0���ź����
        $tmp = $arr[$i]; //�������ֵ
        for($j=$i;$j>=0;$j--){ //����Ϊ $j֮ǰ�����ź����
            if($tmp<$arr[$j]){
                $arr[$j+1] = $arr[$j]; //$j������--����
                $arr[$j] = $tmp;
            }
        }
    }
    var_dump($arr);
}

charupaixu([1,2,7,5,8]);


6��ϣ������
���׵Ĳ������򣨶Բ���������� ����֮�󣬸�������������Ƚϣ�
��3��Ƚ�

����� ������С
��������� ��������


function xierpaixu($arr){
   $len = count($arr);
   $mid = floor($len/2); //2������

   for($k=$mid;$k>0;$k = floor($k/ 2)){
        for($i=$k;$i<$len;$i++) { //ע��
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


7.�鲢����
˼·����ȡ���ε��ֶΣ����������ȷֳ�2����
Ȼ���ڶ��������ֽ��еݹ�֣��ֵ����ֻʣһ���֣�Ȼ�������ֵ����
����
function guibing($arr,$brr){ //��������
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

8.������

�� ��һ������Ķ�����

���ڶѣ�
  ����ĳ���ڵ��ֵ���ǲ����ڻ�С���丸�ڵ��ֵ��
  ������һ����ȫ�����������棩��
  �����ڵ����Ķѽ������ѻ����ѣ����ڵ���С�Ķѽ�����С�ѻ�С���ѡ�

����������Ǵ󶥶�
���ڵ���С����С����
������ײ�֮��,ÿһ�㶼������,��ʹ�öѿ���������������ʾ,ÿһ������Ӧ�����е�һ��Ԫ��.
˼· 

���ѣ�Ȼ��ȡ���ֵ

function swap(&$arr,$a,$b){
    $tmp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $tmp;
}
//�Ƚ��滻
function headAdjust(&$arr,$start,$end){
    $tmp = $arr[$start];

    for($j=2*$start+1;$j<=$end;$j=2*$j+1){
        if($j!=$end && $arr[$j]<$arr[$j+1]){//�������Һ��ӱȽ�
           $j++;//תΪ�ҽ��
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


































