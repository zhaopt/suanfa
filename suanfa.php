
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









