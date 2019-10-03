<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Log;
use think\Queue;
use app\model\jobs;

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
    public function testJobQueue()
    { 
        $jobHandleClassName = 'app\queuejob\myjob@fire';
        $jobQueueName = 'helloJobQueue';
        $jobData = ['a'=>1234,'b'=>4567];
        $timeToWait = strtotime('2019-10-2 22:06:00')-strtotime('now');
        // $isPush = Queue::later($timeToWait,$jobHandleClassName,$jobData,$jobQueueName);
        $isPush = Queue::push($jobHandleClassName,$jobData,$jobQueueName);
        $jobs=new jobs;
        $v=$jobs->getLength();
        dump($v);
        if ($isPush != false) {
            echo date('Y-m-d H:i:s').'  : a new Job is push to the MQ<br>';
            echo "前方还有$v 人";
        }
        else{
            dump($isPush);
            echo('Oooo, sth. is wrong');
        } 
    } 
}
