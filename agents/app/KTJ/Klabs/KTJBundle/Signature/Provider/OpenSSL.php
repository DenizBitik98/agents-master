<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 11.01.19
 * Time: 10:44
 */

namespace App\KTJ\Klabs\KTJBundle\Signature\Provider;


use App\KTJ\Klabs\KTJBundle\Signature\SignatureClientInterface;

/**
 * Class OpenSSL
 * @package Klabs\KTJBundle\Signature\Provider
 */
class OpenSSL implements SignatureClientInterface
{
    /**
     * @var null|string $keyPassword
     */
    protected $privateKeyPassword;
    /**
     * @var null|string $privateKeyFile
     */
    protected $privateKeyFile;

    /**
     * @return string|null
     */
    public function getPrivateKeyPassword(): ?string
    {
        return $this->privateKeyPassword;
    }

    /**
     * @param string|null $privateKeyPassword
     * @return OpenSSL
     */
    public function setPrivateKeyPassword(?string $privateKeyPassword): OpenSSL
    {
        $this->privateKeyPassword = $privateKeyPassword;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrivateKeyFile(): ?string
    {
        return $this->privateKeyFile;
    }

    /**
     * @param string|null $privateKeyFile
     * @return OpenSSL
     */
    public function setPrivateKeyFile(?string $privateKeyFile): OpenSSL
    {
        $this->privateKeyFile = $privateKeyFile;
        return $this;
    }

    function sign(string $data): ?string
    {
        $unicode = $this->getUnicode($data);
        $hash = $this->getCrypt($unicode);
        $openSSL = $this->readKeyFile();
        openssl_sign($hash, $signature, $openSSL['pkey'], OPENSSL_ALGO_SHA1);
        $result = base64_encode($signature);

        return $result;
    }

    /**
     *
     * @param string $arg
     * @return false|string
     */
    protected function getUnicode(string $arg)
    {
        return iconv("UTF-8", "UTF-16LE", $arg);
    }

    /**
     * @param string $arg
     * @return string
     */
    protected function getCrypt(string $arg)
    {
        return sha1($arg, true);
    }

    /**
     * @return array
     */
    protected function readKeyFile()
    {
        $result = [];
        openssl_pkcs12_read(
            file_get_contents($this->getPrivateKeyFile()),
            $result,
            $this->getPrivateKeyPassword()
        );

        return $result;
    }
}
