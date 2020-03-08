<?php
namespace Modules\Article\Services;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/12
 * Time: 12:09
 */

class TemplateService
{
    public function all(){
        $dirs = glob(public_path('templates/*'));
        $configs = [];
        foreach ($dirs as $dir) {
            if ($config = $this->parseConfig($dir)) {
                $configs[] = $config;
            }
        }
        return $configs;
    }
    
    protected function parseConfig($dir)
    {
        $file = $dir . '/' . 'package.json';
        if (is_file($file)) {
            $jsonContent = file_get_contents($file);
            $config = json_decode(trim($jsonContent));
            $fileName = basename($dir);
            if (is_object($config)) {
                $config = (array)$config;
                $config['preview'] = url('templates'.'/'.$fileName.'/'.$config['preview']);
                $config['name'] = $fileName;
                return $config;
            }
        }
        return [];
    }
}