<?php


namespace App\ViewModels\Agent;

class FilterAgentForm
{
    /**
     * @var string | null
     */
    protected $companyName = '';
    /**
     * @var string | null
     */
    protected $address = '';
    /**
     * @var string | null
     */
    protected $email = '';
    /**
     * @var string | null
     */
    protected $bin = '';
    /**
     * @var string | null
     */
    protected $isBlocked = '';

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string|null $companyName
     */
    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getBin(): ?string
    {
        return $this->bin;
    }

    /**
     * @param string|null $bin
     */
    public function setBin(?string $bin): void
    {
        $this->bin = $bin;
    }

    /**
     * @return string|null
     */
    public function getIsBlocked(): ?string
    {
        return $this->isBlocked;
    }

    /**
     * @param string|null $isBlocked
     */
    public function setIsBlocked(?string $isBlocked): void
    {
        $this->isBlocked = $isBlocked;
    }
}
