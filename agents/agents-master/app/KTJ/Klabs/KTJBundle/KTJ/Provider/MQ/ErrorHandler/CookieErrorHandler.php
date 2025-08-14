<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\ErrorHandler;

use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\IProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Aware\IProviderAware\TProviderAware;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\IErrorHandler;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Cancel\Request as CancelOrderRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Confirm\Request as ConfirmOrderRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Finalize\Request as FinalizeRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Order\Fiscalize\Request as FiscalizeRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\ConfirmBooking\Request as ConfirmBookingRequest;
use App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Provider;
use Psr\Http\Message\ResponseInterface;

/**
 * Class CookieErrorHandler
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\ErrorHandler
 * @method Provider getProvider();
 */
class CookieErrorHandler implements IErrorHandler, IProviderAware
{
    use TProviderAware;

    /**
     * @var null|string $defaultLogin
     */
    protected $defaultLogin;
    /**
     * @var null|string $defaultPassword
     */
    protected $defaultPassword;
    /**
     * @var null|string $defaultMachineKey
     */
    protected $defaultMachineKey;
    /**
     * @var null|string $defaultLogin
     */
    protected $confirmLogin;
    /**
     * @var null|string $defaultPassword
     */
    protected $confirmPassword;
    /**
     * @var null|string $confirmMachineKey
     */
    protected $confirmMachineKey;

    /**
     * @return string|null
     */
    public function getDefaultLogin(): ?string
    {
        return $this->defaultLogin;
    }

    /**
     * @param string|null $defaultLogin
     * @return CookieErrorHandler
     */
    public function setDefaultLogin(?string $defaultLogin): CookieErrorHandler
    {
        $this->defaultLogin = $defaultLogin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefaultPassword(): ?string
    {
        return $this->defaultPassword;
    }

    /**
     * @param string|null $defaultPassword
     * @return CookieErrorHandler
     */
    public function setDefaultPassword(?string $defaultPassword): CookieErrorHandler
    {
        $this->defaultPassword = $defaultPassword;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefaultMachineKey(): ?string
    {
        return $this->defaultMachineKey;
    }

    /**
     * @param string|null $defaultMachineKey
     * @return CookieErrorHandler
     */
    public function setDefaultMachineKey(?string $defaultMachineKey): CookieErrorHandler
    {
        $this->defaultMachineKey = $defaultMachineKey;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmLogin(): ?string
    {
        return $this->confirmLogin;
    }

    /**
     * @param string|null $confirmLogin
     * @return CookieErrorHandler
     */
    public function setConfirmLogin(?string $confirmLogin): CookieErrorHandler
    {
        $this->confirmLogin = $confirmLogin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmPassword(): ?string
    {
        return $this->confirmPassword;
    }

    /**
     * @param string|null $confirmPassword
     * @return CookieErrorHandler
     */
    public function setConfirmPassword(?string $confirmPassword): CookieErrorHandler
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConfirmMachineKey(): ?string
    {
        return $this->confirmMachineKey;
    }

    /**
     * @param string|null $confirmMachineKey
     * @return CookieErrorHandler
     */
    public function setConfirmMachineKey(?string $confirmMachineKey): CookieErrorHandler
    {
        $this->confirmMachineKey = $confirmMachineKey;

        return $this;
    }

    /**
     * @inheritDoc
     * @param ResponseInterface $response
     * @return bool|null
     */
    function handle(ResponseInterface $response, IRequest $request = null): ?bool
    {
        if ($response->getStatusCode() == 401) {
            $login = $this->getDefaultLogin();
            $password = $this->getDefaultPassword();
            $machineKey = $this->getDefaultMachineKey();
            foreach ($this->getConfirmRequestClasses() as $confirmRequestClass) {
                if ($request instanceof $confirmRequestClass) {
                    $login = $this->getConfirmLogin();
                    $password = $this->getConfirmPassword();
                    $machineKey = $this->getConfirmMachineKey();
                }
            }
            $this->getProvider()->getAuthController()->refreshProviderCookies(
                $login,
                $password,
                $machineKey
            );

            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    protected function getConfirmRequestClasses()
    {
        return [
            ConfirmOrderRequest::class,
            FiscalizeRequest::class,
            FinalizeRequest::class,
            ConfirmBookingRequest::class,
            CancelOrderRequest::class,
        ];
    }
}
