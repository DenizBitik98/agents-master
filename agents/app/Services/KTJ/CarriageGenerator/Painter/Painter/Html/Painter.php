<?php
/**
 * Created by PhpStorm.
 * User: Urmat
 * Date: 18.05.2018
 * Time: 13:07
 */

namespace App\Services\KTJ\CarriageGenerator\Painter\Painter\Html;

use DOMDocument;
use DOMElement;
use App\Services\Helpers\ArrayHelper;
use App\Services\KTJ\CarriageGenerator\Entity\PainterElement;
use App\Services\KTJ\CarriageGenerator\Entity\Seat;
use App\Services\KTJ\CarriageGenerator\Painter\Enum\Position;
use App\Services\KTJ\CarriageGenerator\Painter\IPainter;

/**
 * Class Painter
 * @package App\Services\KTJ\CarriageGenerator\Painter\Painter\Html
 */
class Painter implements IPainter
{
    /**
     * @var null|DOMDocument $dom
     */
    protected $dom;
    /**
     * @var null|PainterElement $root
     */
    protected $root;

    /**
     * Painter constructor.
     *
     * @inheritdoc
     *
     * @param DOMDocument|null $document
     */
    public function __construct()
    {
        $this->setRoot(new PainterElement());
        $this->setDom(new DOMDocument());
    }

    /**
     * @inheritDoc
     */
    function paint(): string
    {
        $this->setDom(new DOMDocument());
        $this->dom->appendChild($this->buildDomElement($this->getRoot()));

        return $this->dom->saveHTML();
    }

    /**
     * @return null|PainterElement
     */
    public function getRoot(): ?PainterElement
    {
        return $this->root;
    }

    /**
     * @param null|PainterElement $root
     *
     * @return IPainter
     */
    public function setRoot(?PainterElement $root): IPainter
    {
        $this->root = $root;

        return $this;
    }

    /**
     * @return DOMDocument|null
     */
    public function getDom(): ?DOMDocument
    {
        return $this->dom;
    }

    /**
     * @param DOMDocument|null $dom
     *
     * @return Painter
     */
    public function setDom(?DOMDocument $dom): Painter
    {
        $this->dom = $dom;

        return $this;
    }

    /**
     * @param PainterElement $element
     * @param null|mixed $value
     *
     * @return DOMElement
     */
    protected function buildDomElement(PainterElement $element, $value = null): DOMElement
    {
        $domElement = $this->dom->createElement(ArrayHelper::getValue($element->getPainterConfig(), 'tag', 'div'), $value);
        foreach ($element->getPainterConfig() as $configKey => $configValue) {
            $domElement->setAttribute($configKey, $configValue);
        }
        foreach ($element->getChildren() as $child) {
            $domElement->appendChild($this->buildDomElement($child, $child->getValue()));
        }
        foreach ($element->getSeats() as $seat) {
            $domElement->appendChild($this->buildSeat($seat));
        }

        return $domElement;
    }

    /**
     * Build seat
     *
     * @param Seat $seat
     *
     * @return DOMElement
     */
    protected function buildSeat(Seat $seat)
    {
        $seatDomContainer = $this->dom->createElement('div');
        $containerPainterConfig = ArrayHelper::getValue($seat->getPainterConfig(), 'container', []);
        $containerPainterConfig = ArrayHelper::merge($containerPainterConfig, [
            'class' => implode(' ', [
                ArrayHelper::getValue($containerPainterConfig, 'class', ''),
                $this->getSeatClassByPosition($seat->getPosition()),
                $seat->getisActive() ? '' : 'reserved disabled'
            ])
        ]);
        foreach ($containerPainterConfig as $attributeKey => $attributeValue) {
            $seatDomContainer->setAttribute($attributeKey, $attributeValue);
        }
        $seatDomInput = $this->dom->createElement('input', $seat->getPlace());
        $seatDomInput->setAttribute('value', $seat->getPlace());
        foreach (ArrayHelper::getValue($seat->getPainterConfig(), 'input', []) as $attributeKey => $attributeValue) {
            $seatDomInput->setAttribute($attributeKey, $attributeValue);
        }
        $seatDomContainer->appendChild($seatDomInput);
        $seatDomLabel = $this->dom->createElement('label', $seat->getPlace());
        foreach (ArrayHelper::getValue($seat->getPainterConfig(), 'label', []) as $attributeKey => $attributeValue) {
            $seatDomLabel->setAttribute($attributeKey, $attributeValue);
        }
        $seatDomContainer->appendChild($seatDomLabel);

        return $seatDomContainer;
    }

    /**
     * @param Position $position
     * @param mixed $default
     *
     * @return mixed
     */
    protected function getSeatClassByPosition(Position $position, $default = '')
    {
        return ArrayHelper::getValue([
            Position::BOTTOM_LEFT()->getKey() => 'bl',
            Position::MIDDLE_LEFT()->getKey() => 'ml',
            Position::TOP_LEFT()->getKey() => 'tl',
            Position::BOTTOM_MIDDLE()->getKey() => 'bm',
            Position::MIDDLE_MIDDLE()->getKey() => 'mm',
            Position::TOP_MIDDLE()->getKey() => 'tm',
            Position::BOTTOM_RIGHT()->getKey() => 'br',
            Position::MIDDLE_RIGHT()->getKey() => 'mr',
            Position::TOP_RIGHT()->getKey() => 'tr',
            Position::VERTICALLY_SORTED()->getKey() => 'vl',
        ], $position->getKey(), $default);
    }
}
