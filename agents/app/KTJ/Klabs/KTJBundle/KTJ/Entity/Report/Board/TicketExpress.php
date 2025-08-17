<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 27.02.19
 * Time: 15:12
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Board;

use JMS\Serializer\Annotation as JMS;

/**
 * Class TicketExpress
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Board
 */
class TicketExpress
{
    /**
     * @JMS\SerializedName("Value")
     * @JMS\Type("string")
     *
     * @var null|string $Value
     */
    protected $Value;

    /**
     * TicketExpress constructor.
     * @param string|null $Value
     */
    public function __construct(?string $Value = null)
    {
        $this->setValue($Value);
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->Value;
    }

    /**
     * @param string|null $Value
     * @return TicketExpress
     */
    public function setValue(?string $Value): TicketExpress
    {
        $this->Value = $Value;
        return $this;
    }
}
