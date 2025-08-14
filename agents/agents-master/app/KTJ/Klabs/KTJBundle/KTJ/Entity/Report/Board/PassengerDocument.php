<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 27.02.19
 * Time: 16:05
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Board;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PassengerDocument
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Board
 */
class PassengerDocument
{
    /**
     * @JMS\SerializedName("Type")
     * @JMS\Type("int")
     *
     * @var null|int $Type
     */
    protected $Type;
    /**
     * @JMS\SerializedName("Number")
     * @JMS\Type("string")
     *
     * @var null|string $Number
     */
    protected $Number;

    /**
     * PassengerDocument constructor.
     * @param int|null $Type
     * @param string|null $Number
     */
    public function __construct(?int $Type = null, ?string $Number = null)
    {
        $this->setType($Type);
        $this->setNumber($Number);
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->Type;
    }

    /**
     * @param int|null $Type
     * @return PassengerDocument
     */
    public function setType(?int $Type): PassengerDocument
    {
        $this->Type = $Type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->Number;
    }

    /**
     * @param string|null $Number
     * @return PassengerDocument
     */
    public function setNumber(?string $Number): PassengerDocument
    {
        $this->Number = $Number;
        return $this;
    }
}
