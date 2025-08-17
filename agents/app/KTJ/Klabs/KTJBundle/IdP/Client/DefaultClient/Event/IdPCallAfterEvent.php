<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 23.05.2018
 * Time: 17:01
 */

namespace App\KTJ\Klabs\KTJBundle\IdP\Client\DefaultClient\Event;

use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdPAware\IIdPAware;
use App\KTJ\Klabs\KTJBundle\IdP\Aware\IdPAware\TIdPAware;
use App\KTJ\Klabs\KTJBundle\IdP\IdPClientInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class IdPCallAfterEvent
 * @package Klabs\KTJBundle\IdP\Client\DefaultClient\Event
 */
class IdPCallAfterEvent extends Event implements IIdPAware {
	use TIdPAware;
	/**
	 * @var null|ResponseInterface $response
	 */
	protected $response;

	/**
	 * IdPCallAfterEvent constructor.
	 *
	 * @param ResponseInterface|null  $response
	 * @param IdPClientInterface|null $idpClient
	 */
	public function __construct( ResponseInterface $response = null, IdPClientInterface $idpClient = null ) {
		$this->setResponse( $response );
		$this->setIdpClient( $idpClient );
	}

	/**
	 * @return null|ResponseInterface
	 */
	public function getResponse(): ?ResponseInterface {
		return $this->response;
	}

	/**
	 * @param null|ResponseInterface $response
	 *
	 * @return IdPCallAfterEvent
	 */
	public function setResponse( ?ResponseInterface $response ): IdPCallAfterEvent {
		$this->response = $response;

		return $this;
	}
}
