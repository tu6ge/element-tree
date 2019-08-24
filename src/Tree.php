<?php
/**
 * Created by PhpStorm.
 * User: ZHIYUAN
 * Date: 2019-08-24
 * Time: 13:26
 */

class Tree
{
    public function get($dir)
    {
        $array = $this->recurDir($dir);
        $array = $this->iconv_array($array);
        return $array;
    }

    /**
     * 把目录结构转换成vue可识别的格式
     * @param $array
     * @return array
     * @author tu6ge
     * @date 2019-08-23 16:12
     */
    public function iconv_array($array)
    {
        $result = [];
        foreach($array as $key=>$val){
            if(is_array($val)){
                $result[] = [
                    'label' => pathinfo($key, PATHINFO_BASENAME),
                    'children' => $this->iconv_array($val),
                ];
            }else{
                $result[] = [
                    'label' => pathinfo($val, PATHINFO_BASENAME),
                ];
            }
        }
        return $result;
    }

    /**
     * 读取目录树，保存到多维数组中
     * @param $pathName
     * @return array|null
     * @author tu6ge
     * @date 2019-08-23 16:13
     */
    function recurDir($pathName)
    {
        //将结果保存在result变量中
        $result = array();
        $temp = array();
        //判断传入的变量是否是目录
        if(!is_dir($pathName) || !is_readable($pathName)) {
            return null;
        }
        //取出目录中的文件和子目录名,使用scandir函数
        $allFiles = scandir($pathName);
        //遍历他们
        foreach($allFiles as $fileName) {
            //判断是否是.和..因为这两个东西神马也不是。。。
            if(in_array($fileName, array('.', '..'))) {
                continue;
            }
            //路径加文件名
            $fullName = $pathName.'/'.$fileName;
            //如果是目录的话就继续遍历这个目录
            if(is_dir($fullName)) {
                //将这个目录中的文件信息存入到数组中
                $result[$fullName] = $this->recurDir($fullName);
            }else {
                //如果是文件就先存入临时变量
                $temp[] = $fullName;
            }
        }
        //取出文件
        if($temp) {
            foreach($temp as $f) {
                $result[] = $f;
            }
        }
        return $result;
    }
}