1.һ����hash��
����˼·
���������ĵ�ַ hash(����ֵ2��32�η��Ļ��� )֮��ŵ� ���ϣ�Ȼ��key��ֵ
hash֮�� ����������ֵ˳ʱ��Աȣ��õ�����ֵ������Ľ�㼴��

���� ���� 4������ һ�� hash ��� int��ֵ ���ϵ�
addServer��ӷ�����
removeServerɾ��������
lookup���� ��ֵ��Ӧ�Ľ��
interface ConsistentHash{

    public function cHash($str);//���ַ���תΪhash
    public function addServer($server);//��ӷ�����
    public function removeServer($server);//ɾ��������
    public function lookup($key);//���Һ��ʵķ������������
}

class MyConsistentHash implements ConsistentHash{
    public $serverList = [];
    public $virtualPos = [];
    public $virtualPosNum = 5; //����Ӧ������������

    //���ַ���תΪ32λ�޷��ŵ�hashֵ ---
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
        reset($this->virtualPos);//����Բ����ָ��
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

echo "����ʮ̨������192.168.1.1~192.168.1.10\n";
echo "���� key1 �� server :".$hashServer->lookup('key1') . '\n';
echo "���� key2 �� server :".$hashServer->lookup('key2') . '\n';

var_dump($hashServer->virtualPos);

var_dump($hashServer->lookup("key1"));                              
2.