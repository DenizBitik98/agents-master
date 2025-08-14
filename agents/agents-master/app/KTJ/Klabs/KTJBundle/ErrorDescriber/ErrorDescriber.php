<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 31.05.2018
 * Time: 15:36
 */

namespace App\KTJ\Klabs\KTJBundle\ErrorDescriber;


use App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator\ITranslatorAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\TTranslator\TTranslatorAware;
use TicketBundle\Helpers\ArrayHelper;

/**
 * Class ErrorDescriber
 * @package Klabs\KTJBundle\ExceptionDescriber
 */
class ErrorDescriber implements ITranslatorAware
{
    use TTranslatorAware;
    /**
     * List of exception
     * @var array $exceptionDescribeList
     */
    protected $exceptionDescribeList = [
        1050010 => 'ktj.dcts.error.1050010',
        1000002 => 'ktj.dcts.error.1000002',
        1380001 => 'ktj.dcts.error.1380001',
        1320004 => 'ktj.dcts.error.1320004',
        1120000 => 'ktj.dcts.error.1120000',
        1120004 => 'ktj.dcts.error.1120004',
        1500201 => 'ktj.dcts.error.1500201',
        1500202 => 'ktj.dcts.error.1500202',
        1500203 => 'ktj.dcts.error.1500203',
        1500204 => 'ktj.dcts.error.1500204',
        1500205 => 'ktj.dcts.error.1500205',
        1500100 => 'ktj.dcts.error.1500004',
        404 => 'ktj.dcts.error.404',
        30001 => 'ktj.dcts.error.30001',
        1020000 => 'ktj.mq.error.1020000',
        1500101 => 'ktj.mq.error.1500101',
        30005 => 'ktj.dcts.error.30005',
        1330011 => 'ktj.mq.error.1330011',
        1330012 => 'ktj.mq.error.1330012',
        1330013 => 'ktj.mq.error.1330013',
        1330014 => 'ktj.mq.error.1330014',
        1500006 => 'ktj.mq.error.1500006',
        1500007 => 'ktj.mq.error.1500007',
        1092040 => 'ktj.dcts.error.1092040',
        1410000 => 'ktj.dcts.error.1410000'
    ];
    /**
     * List of express negative response messages
     * @var array $expressNegativeResponseDescribeList
     */
    protected $expressNegativeResponseDescribeList = [
        '1300000' => 'ktj.dcts.error.1300000.default',
        'BD' => 'ktj.dcts.error.1300000.bd'
    ];

    /**
     * Get description of the error by code
     *
     * @param             $code
     * @param null|string $message
     *
     * @return string
     */
    function describeErrorCode($code, ?string $message = "")
    {
        if ($code == 1300000) {
            return $this->getTranslator()->trans(
                ArrayHelper::getValue($this->expressNegativeResponseDescribeList, $message, '1300000')
            );
        }

        $ret = $this->getTranslator()->trans(
            ArrayHelper::getValue($this->exceptionDescribeList, $code, $message)
        );

        if($code == 1500100 && $message != ""){
            $ret .= sprintf(' (%s)', $message);
        }
        return $ret;
    }

    /**
     * Get description of the error by code
     *
     * @param             $code
     * @param null|string $message
     *
     * @return string
     */
    function describeErrorCodeWithLocale($code, ?string $message = "", $locale = "ru")
    {
        if ($code == 1300000) {
            return $this->getTranslator()->trans(
                ArrayHelper::getValue($this->expressNegativeResponseDescribeList, $message, '1300000')
            );
        }

        $ret = $this->getTranslator()->trans(
            ArrayHelper::getValue($this->exceptionDescribeList, $code, $message),
            [],
            null,
            $locale
        );

        if($code == 1500100 && $message != ""){
            $ret .= sprintf(' (%s)', $message);
        }
        return $ret;
    }
}
