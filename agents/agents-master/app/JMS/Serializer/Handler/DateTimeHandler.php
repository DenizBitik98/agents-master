<?php


namespace App\JMS\Serializer\Handler;

use DateInterval;
use DateTime;
use DateTimeImmutable;
use DateTimeZone;
use Dropelikeit\LaravelJmsSerializer\Contracts\CustomHandlerConfiguration;
use Exception;
use JMS\Serializer\Context;
use JMS\Serializer\Exception\RuntimeException;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\DateHandler as BaseHandler;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;
use JMS\Serializer\Visitor\SerializationVisitorInterface;
use JMS\Serializer\VisitorInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

class DateTimeHandler implements CustomHandlerConfiguration
{
    public static function getDeserializationFormat(array $type)
    {
        if (isset($type['params'][2])) {
            return $type['params'][2];
        }
        if (isset($type['params'][0])) {
            return $type['params'][0];
        }

        return DateTime::ISO8601;
    }

    /**
     * @param mixed $data
     * @param array $type
     */
    public static function parseDateTime($data, array $type, $immutable = false)
    {

        $timezone = !empty($type['params'][1]) ? new DateTimeZone($type['params'][1]) : new DateTimeZone('Asia/Almaty');
        $format = DateTimeHandler::getDeserializationFormat($type);

        if ($immutable) {
            $datetime = DateTimeImmutable::createFromFormat($format, (string)$data, $timezone);
        } else {
            try {
                $datetime = new DateTime((string)$data, $timezone);
            } catch (Exception $exception) {
                $datetime = DateTime::createFromFormat($format, (string)$data, $timezone);
            }
            if (!($datetime instanceof DateTime)) {
                $datetime = DateTime::createFromFormat("Y-m-d\TH:i:s.uO", (string)$data, $timezone);
            }
            if (!($datetime instanceof DateTime)) {
                $datetime = DateTime::createFromFormat("Y-m-d\TH:i:s.u", (string)$data, $timezone);
            }
            if (!($datetime instanceof DateTime)) {
                $datetime = DateTime::createFromFormat("Y-m-d\TH:i:s", (string)$data, $timezone);
            }
        }

        if (false === $datetime) {
            throw new RuntimeException(sprintf('Invalid datetime "%s", expected format %s.', $data, $format));
        }

        if ($format === 'U') {
            $datetime = $datetime->setTimezone($timezone);
        }

        return $datetime;
    }

    public function getDirection(): int
    {
        return GraphNavigatorInterface::DIRECTION_DESERIALIZATION;
    }

    public function getTypeName(): string
    {
        return 'DateTime';
    }

    public function getFormat(): string
    {
        return 'json';
    }

    public function getCallable(): callable
    {
        return static function (JsonDeserializationVisitor $visitor, $date, array $type, Context $context) {
            return DateTimeHandler::parseDateTime($date, $type);
        };
    }
}
