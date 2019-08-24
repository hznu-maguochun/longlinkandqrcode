<?php
namespace app\push\controller;
use think\worker\Server;
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
		$connection->send("I received your message and From : ". $connection->getRemoteIP());
	}
	public function onConnect($connection)
	{
		Log::write("onConnect");
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
		// 进程启动后设置一个每5秒运行一次的定时器
        	Timer::add(5, function ()use($worker){
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
                	$connection->send('heart beat!......id : '.$connection->id.' ');
                }
            }
        });		
	}

	// 向所有验证的用户推送数据
	function broadcast($message){
	   global $ws_worker;
	   foreach($ws_worker->uidConnections as $connection){
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