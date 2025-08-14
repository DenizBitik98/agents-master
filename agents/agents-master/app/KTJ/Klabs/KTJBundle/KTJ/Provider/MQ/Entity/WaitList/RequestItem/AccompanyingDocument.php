<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;

use \DateTime;
/**
 * Class AccompanyingDocument
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem
 */
class AccompanyingDocument
{
    /**
     * @var null|string $DocumentNumber
     */
    protected $DocumentNumber;
    /**
     * @var null|DateTime $DateIssued
     */
    protected $DateIssued;

    /**
     * @return string|null
     */
    public function getDocumentNumber(): ?string
    {
        return $this->DocumentNumber;
    }

    /**
     * @param string|null $DocumentNumber
     * @return AccompanyingDocument
     */
    public function setDocumentNumber(?string $DocumentNumber): AccompanyingDocument
    {
        $this->DocumentNumber = $DocumentNumber;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDateIssued(): ?DateTime
    {
        return $this->DateIssued;
    }

    /**
     * @param DateTime|null $DateIssued
     * @return AccompanyingDocument
     */
    public function setDateIssued(?DateTime $DateIssued): AccompanyingDocument
    {
        $this->DateIssued = $DateIssued;

        return $this;
    }
}
