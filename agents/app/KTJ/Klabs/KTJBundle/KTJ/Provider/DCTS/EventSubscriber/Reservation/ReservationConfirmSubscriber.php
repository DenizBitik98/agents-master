<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 28.08.2018
 * Time: 17:34
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\EventSubscriber\Reservation;

use App\KTJ\Klabs\KTJBundle\Aware\KTJAware\IKTJAware;
use App\KTJ\Klabs\KTJBundle\Aware\KTJAware\TKTJAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\ConfirmRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Order\Confirm\Ticket;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature\PaymentSignatureRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Payment\Signature\PaymentSignatureResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\Order\ConfirmController;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class ReservationConfirmSubscriber
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\EventSubscriber\Reservation
 */
class ReservationConfirmSubscriber implements EventSubscriberInterface, IKTJAware {
	use TKTJAware;

	/**
	 * @inheritDoc
	 */
	public static function getSubscribedEvents() {
		return [
			ConfirmController::BEFORE_CONFIRM => [ 'beforeConfirm', 10 ]
		];
	}

	/**
	 * @param BeforeRequestEvent $beforeRequestEvent
	 */
	function beforeConfirm( BeforeRequestEvent $beforeRequestEvent ) {
		/** @var ConfirmRequest $request */
		$request = $beforeRequestEvent->getRequest();
		foreach ( $request->getTickets() as $ticket )
		{
			$ticket->getPayment()->setSignature(
				$this->getSignature( $ticket )
			);
		}
	}

	/**
	 * Get ticket payment signature
	 *
	 * @param Ticket $ticket
	 *
	 * @return null|string
	 */
	protected function getSignature( Ticket $ticket ) {
		$signatureRequest = new PaymentSignatureRequest();
		$signatureRequest->setTerminal( $ticket->getPayment()->getTerminal() );
		$signatureRequest->setPaymentTimestamp( $ticket->getPayment()->getPaymentTimestamp() );
		$signatureRequest->setService( $ticket->getPayment()->getService() );
		$signatureRequest->setRequisite( $ticket->getPayment()->getRequisite() );
		$signatureRequest->setAmount( $ticket->getPayment()->getAmount() );
		$signatureRequest->setComission( $ticket->getPayment()->getComission() );
		/** @var PaymentSignatureResponse $signatureResponse */
		$signatureResponse = $this->getKtj()->getProvider()->getReportController()->getReportPaymentController()->getSignatureAuthorized(
			$signatureRequest
		);

		return $signatureResponse->getSignature( true );
	}
}
