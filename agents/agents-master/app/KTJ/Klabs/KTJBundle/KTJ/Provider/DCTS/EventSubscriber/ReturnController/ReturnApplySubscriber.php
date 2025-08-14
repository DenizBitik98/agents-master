<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 02.10.2018
 * Time: 15:32
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\EventSubscriber\ReturnController;

use App\KTJ\Klabs\KTJBundle\Aware\KTJAware\IKTJAware;
use App\KTJ\Klabs\KTJBundle\Aware\KTJAware\TKTJAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\ApplySuccessRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Apply\Success\Refund;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Signature\SignatureRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\ReturnController\Signature\SignatureResponse;
use App\KTJ\Klabs\KTJBundle\KTJ\Event\BeforeRequestEvent;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\DCTS\Controller\ReturnController\ApplyController;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class ReturnApplySubscriber
 * @package Klabs\KTJBundle\KTJ\Provider\DCTS\EventSubscriber\ReturnController
 */
class ReturnApplySubscriber implements EventSubscriberInterface, IKTJAware {
	use TKTJAware;

	/**
	 * @inheritDoc
	 */
	public static function getSubscribedEvents() {
		return [
			ApplyController::BEFORE_SUCCESS => [ 'beforeApplySuccess', 10 ]
		];
	}

	/**
	 * @param BeforeRequestEvent $beforeRequestEvent
	 */
	function beforeApplySuccess( BeforeRequestEvent $beforeRequestEvent ) {
		/** @var ApplySuccessRequest $request */
		$request = $beforeRequestEvent->getRequest();
		foreach ( $request->getRefunds() as $refund )
		{
			$refund->setSignature( $this->getSignature( $refund ) );
		}
	}

	/**
	 * Get ticket return signature
	 *
	 * @param Refund $refund
	 *
	 * @return null|string
	 */
	protected function getSignature( Refund $refund ) {
		$signatureRequest = new SignatureRequest();
		$signatureRequest->setTerminal( $refund->getTerminal() );
		$signatureRequest->setRequisite( $refund->getRequisite() );
		$signatureRequest->setAmount( $refund->getAmount() );
		$signatureRequest->setPaymentNumber( $refund->getPaymentNumber() );
		/** @var SignatureResponse $signatureResponse */
		$signatureResponse = $this->getKtj()->getProvider()->getReturnController()->getSignatureController()->signatureAuthorized(
			$signatureRequest
		);

		return $signatureResponse->getSignature( true );
	}
}
