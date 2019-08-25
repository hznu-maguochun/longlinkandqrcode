<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
    	$png=qrcode();
        //dump($png);
        $this->assign('png',$png);
        return $this->fetch();
    }
    public function testcode()
    {
    	return $this->fetch();
    }
    public function testlonglink(){
    	
    	return $this->fetch();
    }
}
