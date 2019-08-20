<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function qrcode($url="http://192.168.1.5/longlinkandqrcode/index.php/index/index/testcode")
{
	$level=3;
	$size=4;
	Vendor('phpqrcode.phpqrcode');
	$errorCorrectionLevel=intval($level);
	$matrixPointSize=intval($size);
	$obj=new \QRcode();
	$obj->png($url,'public'.DS.'qrcodepng'.DS.'test.png',$errorCorrectionLevel,$matrixPointSize,2);
}
