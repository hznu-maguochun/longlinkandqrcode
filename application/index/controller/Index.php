<?php
namespace app\index\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
    	qrcode();
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
