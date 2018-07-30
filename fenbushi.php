1.一致性hash环
基本思路
将服务器的地址 hash(整数值2的32次方的环上 )之后放到 环上，然后将key的值
hash之后 与服务器结点值顺时针对比，得到与结点值最相近的结点即可

核心 定义 4个方法 一个 hash 算出 int数值 环上的
addServer添加服武器
removeServer删除服武器
lookup查找 键值对应的结点
interface ConsistentHash{

    public function cHash($str);//将字符串转为hash
    public function addServer($server);//添加服务器
    public function removeServer($server);//删除服务器
    public function lookup($key);//查找合适的服务器存放数据
}

class MyConsistentHash implements ConsistentHash{
    public $serverList = [];
    public $virtualPos = [];
    public $virtualPosNum = 5; //结点对应的虚拟结点数量

    //将字符串转为32位无符号的hash值 ---
    public function cHash($str){
        $str = md5($str);
        return sprintf('%u',crc32($str));
    }

    public function lookup($key){

        $point = $this->cHash($key);

        $finalServer = current($this->virtualPos);
        foreach($this->virtualPos as $pos=>$server){
            if($point <= $pos){
                $finalServer = $pos;
            }
        }
        reset($this->virtualPos);//重置圆环的指针
        return $finalServer;
    }

    public function addServer($server){

        if(!isset($this->virtualPos[$server])){
            for($i=0;$i<$this->virtualPosNum;$i++){
                $pos = $this->cHash($server.'-'.$i);
                $this->virtualPos[$pos] = $server;
                $this->serverList[$server][] = $pos;
            }

            ksort($this->virtualPos,SORT_NUMERIC);
        }

        return true;
    }

    public function removeServer($key){

        if(isset($this->serverList[$key])){
            foreach($this->serverList[$key] as $pos){
                unset($this->serverList[$pos]);
            }
            unset($this->serverList[$key]);
        }
        return true;
    }
}

$hashServer = new MyConsistentHash();
$hashServer->addServer('192.168.1.1');

echo "增加十台服务器192.168.1.1~192.168.1.10\n";
echo "保存 key1 到 server :".$hashServer->lookup('key1') . '\n';
echo "保存 key2 到 server :".$hashServer->lookup('key2') . '\n';

var_dump($hashServer->virtualPos);

var_dump($hashServer->lookup("key1"));                              
2.