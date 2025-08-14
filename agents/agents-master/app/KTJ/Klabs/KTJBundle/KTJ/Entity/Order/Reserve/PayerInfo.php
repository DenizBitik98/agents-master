<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 1:42
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Reserve;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PayerInfo
 * @package Klabs\KTJBundle\KTJ\Entity\Order\Reserve
 */
class PayerInfo {
	/**
	 * @JMS\SerializedName("Name")
	 * @JMS\Type("string")
	 * @var null|string $Name
	 */
	protected $Name;
	/**
	 * @JMS\SerializedName("Bin")
	 * @JMS\Type("string")
	 * @var null|string $Bin
	 */
	protected $Bin;
	/**
	 * @JMS\SerializedName("NDSCertificate")
	 * @JMS\Type("string")
	 * @var null|string $NDSCertificate
	 */
	protected $NDSCertificate;
	/**
	 * @JMS\SerializedName("IsAgent")
	 * @JMS\Type("bool")
	 * @var null|bool $IsAgent
	 */
	protected $IsAgent;
	/**
	 * @JMS\SerializedName("IsVATCharged")
	 * @JMS\Type("bool")
	 * @var null|bool $IsVATCharged
	 */
	protected $IsVATCharged;

	/**
	 * @return null|string
	 */
	public function getName(): ?string {
		return $this->Name;
	}

	/**
	 * @param null|string $Name
	 */
	public function setName( ?string $Name ): void {
		$this->Name = $Name;
	}

	/**
	 * @return null|string
	 */
	public function getBin(): ?string {
		return $this->Bin;
	}

	/**
	 * @param null|string $Bin
	 */
	public function setBin( ?string $Bin ): void {
		$this->Bin = $Bin;
	}

	/**
	 * @return null|string
	 */
	public function getNDSCertificate(): ?string {
		return $this->NDSCertificate;
	}

	/**
	 * @param null|string $NDSCertificate
	 */
	public function setNDSCertificate( ?string $NDSCertificate ): void {
		$this->NDSCertificate = $NDSCertificate;
	}

	/**
	 * @return bool|null
	 */
	public function getisAgent(): ?bool {
		return $this->IsAgent;
	}

	/**
	 * @param bool|null $IsAgent
	 */
	public function setIsAgent( ?bool $IsAgent ): void {
		$this->IsAgent = $IsAgent;
	}

	/**
	 * @return bool|null
	 */
	public function getisVATCharged(): ?bool {
		return $this->IsVATCharged;
	}

	/**
	 * @param bool|null $IsVATCharged
	 */
	public function setIsVATCharged( ?bool $IsVATCharged ): void {
		$this->IsVATCharged = $IsVATCharged;
	}
}
