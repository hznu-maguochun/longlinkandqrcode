<?php
namespace app\push\controller;
use think\worker\Server;
use think\Log;
/**
 * Server
 */
class Worker extends Server
{
	protected $socket='websocket://localhost:2346';
	public function OnMessage($connection,$data)
	{
		$connection->send("I received your message");
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
		Log::write("start");
	}
}