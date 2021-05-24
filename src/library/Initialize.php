<?php


namespace WeChat\library;


use Curl\Curl;

trait Initialize
{

    private $curl;

    public function initializeCurl()
    {
        $this->curl = new Curl();
    }

    public function getCurl()
    {
        return $this->curl;
    }

}