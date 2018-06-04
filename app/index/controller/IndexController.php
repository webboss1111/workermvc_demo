<?php
/**
 * Created by lobtao.
 * Date: 2018/5/25
 * Time: 下午10:44
 */

namespace app\Index\controller;


use think\Db;
use think\Template;
use workermvc\Controller;
use workermvc\Url;

class IndexController extends Controller {
    function index() {
        return 'hello world';
    }

    function test() {
        return 'test1';
    }

    function set() {
        return session('name', 'test');
    }

    function get() {
        return session('name');
    }

    function db() {
        $data = Db::query('select * from tb_test');
        return $data;
    }

    function files() {
        return count(get_included_files());
    }

    function tpl() {
        $data = Db::query('select * from tb_test');
        return $this->fetch('index@index/tpl', [
            'data' => $data,
        ]);
    }

    function config() {
        return config();
    }

    function bigData() {

        return 'bigData' . date('Y-m-d H:i:s', time());
    }

    function calc(){
        return 1&2&4*6;
    }

    function dest(){
        return '目标页面';
    }

    /**
     * 网址跳转
     */
    function redirect(){
        $this->resp->redirect('http://127.0.0.1:8080/index/index/dest');
    }

    function url(){
        //return Url::build('index/url',['name'=>'xiao']);
//        $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
//        return $http_type . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//        global $TW_ENV_REQUEST;
//        return $TW_ENV_REQUEST;

        return url('index/index',['name'=>'xiao']);
    }
}