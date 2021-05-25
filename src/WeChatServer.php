<?php

namespace WeChat;


use ReflectionClass;
use ReflectionMethod;

class WeChatServer
{
    private $class;
    private $reflect;
    private $instance;

    /**
     * WeChatServer constructor.
     * @param $class
     * @param $params
     * @throws \ReflectionException
     */
    public function __construct($class, $params = [])
    {
        $this->class = $class;
        //初始化 ReflectionClass 类
        $this->reflect = new ReflectionClass($this->class);
        //从给出的参数创建一个新的类实例。
        $this->instance = $this->reflect->newInstanceArgs($params);
    }


    /**
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:exec
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 11:20
     * Email:1695699447@qq.com
     * @param $methodName
     * @param $params
     * @return mixed
     * @throws \ReflectionException
     */
    public function exec($methodName, $params)
    {
        $reflect = new ReflectionMethod($this->class, $methodName);
        return $reflect->invokeArgs($this->instance, $params);
    }

    /**
     * 获取实例
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:getInstance
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 11:20
     * Email:1695699447@qq.com
     * @return object
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * 获取curl对象
     * Created by Mr.亮先生.
     * program: Wechat_Tripartite_Platform
     * FuncName:getCurl
     * status:
     * User: Mr.liang
     * Date: 2021/5/24
     * Time: 11:29
     * Email:1695699447@qq.com
     * @return mixed
     */
    public function getCurl()
    {
        return $this->instance->curl;
    }

}