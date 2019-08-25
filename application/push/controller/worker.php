<?php
namespace app\push\controller;
use think\worker\Server;
use think\Session;
use Workerman\Lib\Timer;
use think\Log;
/**
 * Server
 */
class Worker extends Server
{
	protected $socket='websocket://0.0.0.0:2346';
	// 心跳间隔55秒
	protected $HEARTBEAT_TIME=55;
	public function OnMessage($connection,$data)
	{
		// 给connection临时设置一个lastMessageTime属性，用来记录上次收到消息的时间
    	$connection->lastMessageTime = time();
    	//$this->broadcast("test broadcast");
    	if (isset($connection->uid)) {
    		$connection->send("I received your message and From uid: ". $connection->uid);
    	}
		
	}
	public function onConnect($connection)
	{
		$connection->uid=is_null(session('username'))?0:1;
	}
	public function onClose($connection)
	{
		Log::write("onClose");
	}
	public function onError($connection,$code,$msg)
	{
		Log::write("onError");
	}
	public function onWorkerStart($worker)
	{
		// 进程启动后设置一个每30秒运行一次的定时器
        	Timer::add(30, function ()use($worker){
            $time_now = time();
            foreach ($worker->connections as $connection) {
                // 有可能该connection还没收到过消息，则lastMessageTime设置为当前时间
                if (empty($connection->lastMessageTime)) {
                    $connection->lastMessageTime = $time_now;
                    continue;
                }
                // 上次通讯时间间隔大于心跳间隔，则认为客户端已经下线，关闭连接
                if ($time_now - $connection->lastMessageTime > $this->HEARTBEAT_TIME) {
                    $connection->close();
                }else{
                	$connection->send('connection id : '.$connection->id.' worker id: unkown'.'<br/>');
                }
            }
        });		
	}

	// 向所有验证的用户推送数据
	function broadcast($message){
	   foreach($this->uidConnections as $connection){
	        $connection->send($message);
	   }
	}
	 
	// 针对uid推送数据
	function sendMessageByUid($uid, $message)
	{
	    global $ws_worker;
	    if(isset($ws_worker->uidConnections[$uid]))
	    {
	        $connection = $ws_worker->uidConnections[$uid];
	        $connection->send($message);
	    }
	}


}