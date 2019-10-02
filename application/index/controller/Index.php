<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Log;

class Index extends Controller{
    public function index(){
        $this->assign('myurl',urlencode("http://www.163.com" ));
        return $this->fetch();
    }
    public function getpng(){
        $r=Request::instance();
        $myurl=$r->param('myurl');
        Log::write($myurl);
        return qrcode($myurl); 
    }
    public function testcode(){
    	return $this->fetch();
    }
    public function testlonglink(){
    	return $this->fetch();
    }
    public function getqueue(){
        return $this->fetch();
    }
}
