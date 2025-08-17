<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking;


use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;

/**
 * Class Request
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking
 */
class Request implements IRequest
{
    /* Наличный расчет */
    const PAYMENT_TYPE_REQUEST_CACHE = 0;
    /* Безналичный расчет */
    const PAYMENT_TYPE_REQUEST_CARD = 1;
    /* Платежное поручение */
    const PAYMENT_TYPE_REQUEST_PROCURATORY = 2;

    /* По умолчанию - производится выкуп по умолчанию, т.е. по данным пассажира, которые были указаны при оформлении заявки (по дисконтной карте или по персонифицированным данным ФИО, номер документа и т.д.) */
    const BOOKING_METHOD_DEFAULT = 0;
    /* передается когда в заявке была указана дисконтная карта, однако выкупить заявку по дисконтной карте нельзя по каким либо причинам (возможные ситуации описаны в постановке задачи)
       и требуется выкупить места по полной стоимости спрашивается у клиента (описано в постановке задачи, выкупить по дисконтной карте нельзя, хотите выкупить по полной стоимости)
       тогда выкуп будет производиться по данным владельца дисконтной карты. */
    const BOOKING_METHOD_WO_DISCOUNT_CARD = 1;
    /**
     * @var nul|Item $WaitlistItem
     */
    protected $WaitlistItem;
    /**
     * @var null|SeatsRequirements $SeatsRequirements
     */
    protected $SeatsRequirements;
    /**
     * @var null|int $PaymentType
     */
    protected $PaymentType;
    /**
     * @var null|int $ConfirmBookingMethod
     */
    protected $ConfirmBookingMethod = null;

    /**
     * @return Item
     */
    public function getWaitlistItem(): Item
    {
        return $this->WaitlistItem;
    }

    /**
     * @param Item $WaitlistItem
     * @return Request
     */
    public function setWaitlistItem(Item $WaitlistItem): Request
    {
        $this->WaitlistItem = $WaitlistItem;

        return $this;
    }

    /**
     * @return SeatsRequirements|null
     */
    public function getSeatsRequirements(): ?SeatsRequirements
    {
        return $this->SeatsRequirements;
    }

    /**
     * @param SeatsRequirements|null $SeatsRequirements
     * @return Request
     */
    public function setSeatsRequirements(?SeatsRequirements $SeatsRequirements): Request
    {
        $this->SeatsRequirements = $SeatsRequirements;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPaymentType(): ?int
    {
        return $this->PaymentType;
    }

    /**
     * @param int|null $PaymentType
     * @return Request
     */
    public function setPaymentType(?int $PaymentType): Request
    {
        $this->PaymentType = $PaymentType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getConfirmBookingMethod(): ?int
    {
        return $this->ConfirmBookingMethod;
    }

    /**
     * @param int|null $ConfirmBookingMethod
     */
    public function setConfirmBookingMethod(?int $ConfirmBookingMethod): void
    {
        $this->ConfirmBookingMethod = $ConfirmBookingMethod;
    }
}
