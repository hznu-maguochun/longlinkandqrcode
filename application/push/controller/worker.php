<?php
namespace app\push\controller;
use think\worker\Server;
use think\Log;
/**
 * Server
 */
class worker extends Server
{
	protected $socket='websocket://localhost:2346';
	public function OnMessage($connection,$data)
	{
		$connection->send("I received your message");
	}
	public function onWorkerStart($worker)
	{
		Log::write($worker);
	}
}