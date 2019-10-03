<?php
namespace app\model;
use think\Model;
use think\Db;
/**
 * 	model jobs
 */
class jobs extends Model
{
	public function getversion()
	{
		return 1.0;
	}
	public function getLength()
	{
		$r=Db::query("select count(*) as cnt from jobs");
		return $r[0]['cnt'];
	}
}