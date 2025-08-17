<?php
/**
 * Created by PhpStorm.
 * User: urmat
 * Date: 10/26/18
 * Time: 5:00 PM
 */

namespace App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data;


use Illuminate\Support\Collection;
use App\KTJ\Klabs\KTJBundle\KTJ\Common\Entity\IResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class StationDataResponse
 * @package App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data
 */
class StationDataResponse implements IResponse {
    /**
     * @JMS\SerializedName("Items")
     * @JMS\Type("ArrayCollection<App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data\Item>")
     * @var null|Collection|Item[] $Items
     */
    protected $Items;
    /**
     * @JMS\SerializedName("Next")
     * @JMS\Type("App\KTJ\Klabs\KTJBundle\KTJ\Entity\Report\Station\Data\Next")
     * @var null|Next $Next
     */
    protected $Next;

    /**
     * @return Collection|Item[]|null
     */
    public function getItems() {
        return $this->Items;
    }

    /**
     * @param Collection|Item[]|null $Items
     * @return StationDataResponse
     */
    public function setItems($Items) {
        $this->Items = $Items;
        return $this;
    }

    /**
     * @return Next|null
     */
    public function getNext(): ?Next {
        return $this->Next;
    }

    /**
     * @param Next|null $Next
     * @return StationDataResponse
     */
    public function setNext(?Next $Next): StationDataResponse {
        $this->Next = $Next;
        return $this;
    }

}
