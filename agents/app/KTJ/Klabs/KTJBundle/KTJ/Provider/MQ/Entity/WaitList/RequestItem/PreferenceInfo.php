<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\RequestItem;


class PreferenceInfo
{
    /**
     * @var null|string $PreferenceKey
     */
    protected $PreferenceKey;
    /**
     * @var null|string $PreferenceStateCode
     */
    protected $PreferenceStateCode;
    /**
     * @var null|string $NitCode
     */
    protected $NitCode;
    /**
     * @var null|string $ParentDocument
     */
    protected $ParentDocument;
    /**
     * @var null|AccompanyingDocument $AccompanyingDocument
     */
    protected $AccompanyingDocument;

    /**
     * @return string|null
     */
    public function getPreferenceKey(): ?string
    {
        return $this->PreferenceKey;
    }

    /**
     * @param string|null $PreferenceKey
     * @return PreferenceInfo
     */
    public function setPreferenceKey(?string $PreferenceKey): PreferenceInfo
    {
        $this->PreferenceKey = $PreferenceKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPreferenceStateCode(): ?string
    {
        return $this->PreferenceStateCode;
    }

    /**
     * @param string|null $PreferenceStateCode
     * @return PreferenceInfo
     */
    public function setPreferenceStateCode(?string $PreferenceStateCode): PreferenceInfo
    {
        $this->PreferenceStateCode = $PreferenceStateCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNitCode(): ?string
    {
        return $this->NitCode;
    }

    /**
     * @param string|null $NitCode
     * @return PreferenceInfo
     */
    public function setNitCode(?string $NitCode): PreferenceInfo
    {
        $this->NitCode = $NitCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getParentDocument(): ?string
    {
        return $this->ParentDocument;
    }

    /**
     * @param string|null $ParentDocument
     * @return PreferenceInfo
     */
    public function setParentDocument(?string $ParentDocument): PreferenceInfo
    {
        $this->ParentDocument = $ParentDocument;

        return $this;
    }

    /**
     * @return AccompanyingDocument|null
     */
    public function getAccompanyingDocument(): ?AccompanyingDocument
    {
        return $this->AccompanyingDocument;
    }

    /**
     * @param AccompanyingDocument|null $AccompanyingDocument
     * @return PreferenceInfo
     */
    public function setAccompanyingDocument(?AccompanyingDocument $AccompanyingDocument): PreferenceInfo
    {
        $this->AccompanyingDocument = $AccompanyingDocument;

        return $this;
    }
}
