<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use DateTime;
use JMS\Serializer\Annotation as JMS;


class ParentDocumentExpressId
{
    /**
     * @JMS\SerializedName("Value")
     * @JMS\Type("string")
     * @var null|string $value
     */
    protected $value;

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return ParentDocumentExpressId
     */
    public function setValue(?string $value): ParentDocumentExpressId
    {
        $this->value = $value;

        return $this;
    }
}
