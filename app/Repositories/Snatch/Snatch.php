<?php

/**
 * This file is part of Novel
 * (c) Maple <copyrenzhe@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repositories\Snatch;

use Log;
use ReflectionClass;

class Snatch
{
    protected $page_size = 200;
    protected $source;

    /**
     * 单线程模拟请求
     * @param $url
     * @param string $type
     * @param bool $params
     * @param string $encoding
     * @return mixed|string
     */
    protected function send($url, $type = 'GET', $params = false, $encoding = 'utf-8')
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        if ($type == 'POST') {
            curl_setopt($ch, CURLOPT_POST, 1);
            $params && curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        $html = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($html === false) {
            dump("链接: {$url}, curl失败，error: " . curl_errno($ch) . "请注意查看");
            return false;
        }
        if ($httpCode !== 200) {
            dump("链接: {$url}, curl code不等于200，code: " . curl_errno($ch) . "请注意查看");
            return false;
        }
        curl_close($ch);
        return ($encoding != 'utf-8') ? mb_convert_encoding($html, 'UTF-8', $encoding) : $html;
    }


    /**
     * 多线程模拟请求
     * @param $url_array
     * @param $append_url
     * @param int $page_count
     * @param string $source_encode
     * @return array
     */
    protected function multi_send_test($url_array, $append_url, $page_count = 200, $source_encode = 'gbk')
    {
        return async_get_url($url_array, $append_url, $page_count, $source_encode);
    }

    public function getSource()
    {
        return $this->source;
    }
}
