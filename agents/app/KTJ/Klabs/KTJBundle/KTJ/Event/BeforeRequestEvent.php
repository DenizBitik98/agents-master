<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 21.09.2018
 * Time: 17:17
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Event;

use App\KTJ\Klabs\KTJBundle\KTJ\Common\Controller\IController;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class BeforeRequestEvent
 * @package Klabs\KTJBundle\KTJ\Event
 */
class BeforeRequestEvent extends Event {
	/**
	 * @var null|IRequest $request
	 */
	protected $request;
	/**
	 * @var null|IController $controller
	 */
	protected $controller;

	/**
	 * BeforeRequestEvent constructor.
	 *
	 * @param IController   $controller
	 * @param IRequest|null $request
	 */
	public function __construct( IController $controller, IRequest $request = null ) {
		$this->setController( $controller );
		$this->setRequest( $request );
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
	 * @return BeforeRequestEvent
	 */
	public function setRequest( ?IRequest $request ): BeforeRequestEvent {
		$this->request = $request;

		return $this;
	}

	/**
	 * @return IController|null
	 */
	public function getController(): ?IController {
		return $this->controller;
	}

	/**
	 * @param IController|null $controller
	 *
	 * @return BeforeRequestEvent
	 */
	public function setController( ?IController $controller ): BeforeRequestEvent {
		$this->controller = $controller;

		return $this;
	}
}
