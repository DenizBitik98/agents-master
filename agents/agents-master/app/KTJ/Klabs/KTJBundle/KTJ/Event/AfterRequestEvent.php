<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 17:23
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Event;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class AfterRequestEvent
 * @package Klabs\KTJBundle\KTJ\Event
 */
class AfterRequestEvent extends Event {
	/**
	 * @var null|IRequest $request
	 */
	protected $request;
	/**
	 * @var null|IResponse $response
	 */
	protected $response;
	/**
	 * @var null|ResponseInterface
	 */
	protected $psrResponse;

	/**
	 * AfterRequestEvent constructor.
	 *
	 * @param IRequest|null          $request
	 * @param IResponse|null         $response
	 * @param ResponseInterface|null $psrResponse
	 */
	public function __construct( IRequest $request = null, ?IResponse $response = null, ResponseInterface $psrResponse = null ) {
		$this->setRequest( $request );
		$this->setResponse( $response );
		$this->setPsrResponse( $psrResponse );
	}

	/**
	 * @return IRequest|null
	 */
	public function getRequest(): ?IRequest {
		return $this->request;
	}

	/**
	 * @param IRequest|null $request
	 *
	 * @return AfterRequestEvent
	 */
	public function setRequest( ?IRequest $request ): AfterRequestEvent {
		$this->request = $request;

		return $this;
	}

	/**
	 * @return IResponse|null
	 */
	public function getResponse(): ?IResponse {
		return $this->response;
	}

	/**
	 * @param IResponse|null $response
	 *
	 * @return AfterRequestEvent
	 */
	public function setResponse( ?IResponse $response ): AfterRequestEvent {
		$this->response = $response;

		return $this;
	}

	/**
	 * @return null|ResponseInterface
	 */
	public function getPsrResponse(): ?ResponseInterface {
		return $this->psrResponse;
	}

	/**
	 * @param null|ResponseInterface $psrResponse
	 *
	 * @return AfterRequestEvent
	 */
	public function setPsrResponse( ?ResponseInterface $psrResponse ): AfterRequestEvent {
		$this->psrResponse = $psrResponse;

		return $this;
	}
}
