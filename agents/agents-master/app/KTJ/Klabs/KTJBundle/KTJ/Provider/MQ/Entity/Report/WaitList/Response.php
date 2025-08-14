<?php


namespace App\KTJ\Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Report\WaitList;

use Doctrine\Common\Collections\Collection;

/**
 * Class Response
 * @package Klabs\KTJBundle\KTJ\Provider\MQ\Entity\Report\WaitList
 */
class Response
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
