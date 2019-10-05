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
	$png=md5(date('y-m-d H:m:s')).'.png';
	// $obj->png($url,'public'.DS.'qrcodepng'.DS.$png,$errorCorrectionLevel,$matrixPointSize,2);
	//return 'public'.DS.'qrcodepng'.DS.$png;
	return $obj->png($url,false,$errorCorrectionLevel,$matrixPointSize,2);
}
/**
 * 将pdf文件转化为多张png图片
 * @param string $pdf  pdf所在路径 （/www/pdf/abc.pdf pdf所在的绝对路径）
 * @param string $path 新生成图片所在路径 (/www/pngs/)
 *
 * @return array|bool
 */
function pdf2png($pdf, $path)
{
    if (!extension_loaded('imagick')) {
        return 'without imagick';
    }
    if (!file_exists($pdf)) {
        return 'without pdf file(filename)';
    }
    $im = new Imagick();
    $im->setResolution(300,300); //设置分辨率
   // 值越大分辨率越高
    $im->setCompressionQuality(100);
    $im->readImage($pdf); 
    foreach ($im as $k => $v) {
        $v->setImageFormat('png');
        $v->setImageOpacity(0.5);
        $fileName = $path . md5($k . time()) . '.png';
        if ($v->writeImage($fileName) == true) {
            $return[] = $fileName;
        }
    }
    return $return;
}

function showthumbnail($pdf)
{ 
	$image = new Imagick();
    $image->readImage($pdf);
    // $image->thumbnailImage(2048, 0);
    return $image;
}

/**
 * 将pdf转化为单一png图片
 * @param string $pdf  pdf所在路径 （/www/pdf/abc.pdf pdf所在的绝对路径）
 * @param string $path 新生成图片所在路径 (/www/pngs/)
 *
 * @throws Exception
 */
function pdf2singlepng($pdf, $path)
{
    try { 
        // if (!extension_loaded('imagick')) {
        //     return 'without imagick';
        // }
        // if (!file_exists($pdf)) {
        //     return 'without pdf file(filename)';
        // } 
        $im = new Imagick();
        $im->setCompressionQuality(100);
        $im->setResolution(600,600);//设置分辨率 值越大分辨率越高
        $im->readImage($pdf);
        $originalwidth=$im->getImageWidth();
         
 
        $canvas = new Imagick();
        $imgNum = $im->getNumberImages();
        $canvas->setResolution(600,600);
        foreach ($im as $k => $sub) {
            $sub->setImageFormat('png');
            //$sub->setResolution(120, 120);
            $sub->stripImage();
            $sub->trimImage(0);
            // dump($filewidth);
            $width  = $sub->getImageWidth()+10;
            $height = $sub->getImageHeight()+10;
            
            if ($k + 1 == $imgNum) {
                $height += 10;
            } //最后添加10的height
            $canvas->newImage($originalwidth, $height, new ImagickPixel('white'));
            $canvas->compositeImage($sub, Imagick::COMPOSITE_DEFAULT, 5+($originalwidth-$width)/2, 5);
        }
 
        $canvas->resetIterator();
        $canvas->appendImages(true)->writeImage($path . microtime(true) . '.png');
    } catch (Exception $e) {
        throw $e;
    }
}

