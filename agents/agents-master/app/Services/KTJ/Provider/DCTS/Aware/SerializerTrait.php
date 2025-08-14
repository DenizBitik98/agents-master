<?php


namespace App\Services\KTJ\Provider\DCTS\Aware;


use JMS\Serializer\SerializerInterface;

trait SerializerTrait
{
    /** @var SerializerInterface */
    protected $serializer;

    /**
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * @param SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }
}
