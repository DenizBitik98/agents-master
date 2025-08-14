<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetWaitListTerminalInfo;


use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\WaitList\GetWaitListTerminalInfo
 */
class Response implements IResponse
{
    /**
     * @var null|Collection|Terminal[] $Terminals
     */
    protected $Terminals;

    /**
     * @return Collection|Terminal[]|null
     */
    public function getTerminals()
    {
        return $this->Terminals;
    }

    /**
     * @param Collection|Terminal[]|null $Terminals
     * @return Response
     */
    public function setTerminals($Terminals)
    {
        $this->Terminals = $Terminals;

        return $this;
    }

}
