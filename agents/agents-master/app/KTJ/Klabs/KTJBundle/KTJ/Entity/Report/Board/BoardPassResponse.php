<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 04.03.19
 * Time: 15:43
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Board;


use Doctrine\Common\Collections\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;

/**
 * Class BoardPassResponse
 * @package Klabs\KTJBundle\KTJ\Entity\Report\Board
 */
class BoardPassResponse implements IResponse
{
    /**
     * @var null|Collection|BoardPass[] $boardPasses
     */
    protected $boardPasses;

    /**
     * BoardPassResponse constructor.
     * @param Collection|null $boardPasses
     */
    public function __construct(?Collection $boardPasses = null)
    {
        $this->setBoardPasses($boardPasses);
    }

    /**
     * @return Collection|BoardPass[]|null
     */
    public function getBoardPasses()
    {
        return $this->boardPasses;
    }

    /**
     * @param Collection|BoardPass[]|null $boardPasses
     * @return BoardPassResponse
     */
    public function setBoardPasses($boardPasses)
    {
        $this->boardPasses = $boardPasses;
        return $this;
    }
}
