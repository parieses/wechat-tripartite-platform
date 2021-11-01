<?php

namespace WeChat\library;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Middleware;
use Psr\Http\Message\ResponseInterface;
use WeChatPay\Builder;
use WeChatPay\BuilderChainable;
use WeChatPay\ClientDecoratorInterface;
use WeChatPay\Crypto\AesGcm;
use WeChatPay\Crypto\Rsa;
use WeChatPay\Util\PemUtil;


class  Pay

{
    use Initialize;
    private $instance;

    public function __construct()
    {
        $this->initializeCurl();
    }

    private const DEFAULT_BASE_URI = 'https://api.mch.weixin.qq.com/';

    /**
     * 获取平台证书
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:certificates
     * status:static
     * User: Mr.liang
     * Date: 2021/11/1
     * Time: 10:19
     * Email:1695699447@qq.com
     * @param      $apiv3Key   :ApiV3Key
     * @param      $mchid      :商户号
     * @param      $serialno   :商户证书的序列号
     * @param      $privatekey :商户的私钥文件
     * @param null $baseuri    :接入点，默认为 https://api.mch.weixin.qq.com/
     * @return array
     */
    public static function certificates($apiv3Key, $mchid, $serialno, $privatekey, $baseuri = null)
    {
        static $certs = ['any' => null];
        static $data = [];
        $instance = Builder::factory(
            [
                'mchid' => $mchid,
                'serial' => $serialno,
                'privateKey' => \file_get_contents((string)$privatekey),
                'certs' => &$certs,
                'base_uri' => (string)($baseuri ?? self::DEFAULT_BASE_URI),
            ]
        );
        $stack = $instance->getDriver()->select(ClientDecoratorInterface::JSON_BASED)->getConfig('handler');
        $stack->after('verifier', Middleware::mapResponse(static::certsInjector($apiv3Key, $certs)), 'injector');
        $stack->before('verifier', Middleware::mapResponse(static::certsRecorder($certs, $data)), 'recorder');
        $instance->chain('v3/certificates')->getAsync(['debug' => false])->wait();
        return $data;
    }

    private static function certsInjector(string $apiv3Key, array &$certs): callable
    {
        return static function (ResponseInterface $response) use ($apiv3Key, &$certs, &$data): ResponseInterface {
            $body = (string)$response->getBody();
            $json = \json_decode($body);
            $data = \is_object($json) && isset($json->data) && \is_array($json->data) ? $json->data : [];
            \array_map(
                static function ($row) use ($apiv3Key, &$certs) {
                    $cert = $row->encrypt_certificate;
                    $certs[$row->serial_no] = AesGcm::decrypt($cert->ciphertext, $apiv3Key, $cert->nonce, $cert->associated_data);
                },
                $data
            );
            return $response;
        };
    }

    private static function certsRecorder(array &$certs, array &$data): callable
    {
        return static function (ResponseInterface $response) use (&$certs, &$data): ResponseInterface {
            $body = (string)$response->getBody();
            $json = \json_decode($body);
            $data = \is_object($json) && isset($json->data) && \is_array($json->data) ? $json->data : [];
            return $response;
        };
    }

    /**
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getV3Instance
     * status:static
     * User: Mr.liang
     * Date: 2021/11/1
     * Time: 10:33
     * Email:1695699447@qq.com
     * @param $merchantId:商户号，假定为`1000100`
     * @param $merchantPrivateKeyFilePath:商户私钥，文件路径假定为 `/path/to/merchant/apiclient_key.pem`
     * @param $merchantCertificateSerial:「商户证书」序列号
     * @param $platformCertificateSerial:解析「平台证书」序列号
     * @param $platformCertificateFilePath:「平台证书」，可由下载器 Pay::certificates生成然后自行保存
     * @return BuilderChainable
     */
    public static function getV3Instance($merchantId, $merchantPrivateKeyFilePath,$merchantCertificateSerial,$platformCertificateFilePath)
    {
        $merchantPrivateKeyInstance = Rsa::from($merchantPrivateKeyFilePath, Rsa::KEY_TYPE_PRIVATE);
        $platformCertificateSerial = self::parseCertificateSerialNo($platformCertificateFilePath);
        $platformPublicKeyInstance = Rsa::from($platformCertificateFilePath, Rsa::KEY_TYPE_PUBLIC);
        return  Builder::factory([
                                     'mchid'      => $merchantId,
                                     'serial'     => $merchantCertificateSerial,
                                     'privateKey' => $merchantPrivateKeyInstance,
                                     'certs'      => [
                                         $platformCertificateSerial => $platformPublicKeyInstance,
                                     ],
                                 ]);
    }

    /**
     * 解析「商户证书」序列号
     * Created by Mr.亮先生.
     * program: wechat-tripartite-platform
     * FuncName:getMerchantCertificateSerial
     * status:static
     * User: Mr.liang
     * Date: 2021/11/1
     * Time: 10:22
     * Email:1695699447@qq.com
     * @param $merchantCertificateFilePath
     * @return string
     */
    public static function parseCertificateSerialNo($merchantCertificateFilePath)
    {
        return PemUtil::parseCertificateSerialNo($merchantCertificateFilePath);
    }


}