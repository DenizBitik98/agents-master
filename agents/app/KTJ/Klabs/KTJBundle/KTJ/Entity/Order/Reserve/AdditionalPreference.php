<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AdditionalPreference
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class AdditionalPreference
{
    public const CHILD_PREFERENCE_DET5_27 = 4;

    /**
     * @JMS\SerializedName("ChildPreference")
     * @JMS\Type("int")
     * @var null|int $childPreference
     */
    protected $childPreference;
    /**
     * @JMS\SerializedName("InvalidStatusApproveDto")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Order\Reserve\InvalidStatusApprove")
     * @var null|InvalidStatusApprove $invalidStatusApprove
     */
    protected $invalidStatusApprove;
    /**
     * @JMS\SerializedName("PreferenceKey")
     * @JMS\Type("int")
     * @var null|int $preferenceKey
     */
    protected $preferenceKey;
    /**
     * @JMS\SerializedName("AccompanyingDocument")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Order\Reserve\AccompanyingDocument")
     * @var null|AccompanyingDocument $accompanyingDocument
     */
    protected $accompanyingDocument;
    /**
     * @JMS\SerializedName("ParentDocument")
     * @JMS\Type("Klabs\KTJBundle\KTJ\Entity\Order\Reserve\ParentDocument")
     * @var null|ParentDocument $parentDocument
     */
    protected $parentDocument;

    /**
     * @return int|null
     */
    public function getChildPreference(): ?int
    {
        return $this->childPreference;
    }

    /**
     * @param int|null $childPreference
     * @return AdditionalPreference
     */
    public function setChildPreference(?int $childPreference): AdditionalPreference
    {
        $this->childPreference = $childPreference;

        return $this;
    }

    /**
     * @return InvalidStatusApprove|null
     */
    public function getInvalidStatusApprove(): ?InvalidStatusApprove
    {
        return $this->invalidStatusApprove;
    }

    /**
     * @param InvalidStatusApprove|null $invalidStatusApprove
     * @return AdditionalPreference
     */
    public function setInvalidStatusApprove(?InvalidStatusApprove $invalidStatusApprove): AdditionalPreference
    {
        $this->invalidStatusApprove = $invalidStatusApprove;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPreferenceKey(): ?int
    {
        return $this->preferenceKey;
    }

    /**
     * @param int|null $preferenceKey
     * @return AdditionalPreference
     */
    public function setPreferenceKey(?int $preferenceKey): AdditionalPreference
    {
        $this->preferenceKey = $preferenceKey;

        return $this;
    }

    /**
     * @return AccompanyingDocument|null
     */
    public function getAccompanyingDocument(): ?AccompanyingDocument
    {
        return $this->accompanyingDocument;
    }

    /**
     * @param AccompanyingDocument|null $accompanyingDocument
     * @return AdditionalPreference
     */
    public function setAccompanyingDocument(?AccompanyingDocument $accompanyingDocument): AdditionalPreference
    {
        $this->accompanyingDocument = $accompanyingDocument;

        return $this;
    }

    /**
     * @return ParentDocument|null
     */
    public function getParentDocument(): ?ParentDocument
    {
        return $this->parentDocument;
    }

    /**
     * @param ParentDocument|null $parentDocument
     * @return AdditionalPreference
     */
    public function setParentDocument(?ParentDocument $parentDocument): AdditionalPreference
    {
        $this->parentDocument = $parentDocument;

        return $this;
    }
}
