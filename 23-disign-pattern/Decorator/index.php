<?php
class BasketCost
{
    public function getCost()
    {
        return 150000;
    }

    public function getDescription()
    {
        return 'Basket Cost';
    }

    public function getTotalCost()
    {
        return self::getCost();
    }

    public function getDetalis()
    {
        return [
            self::getDescription() => self::getCost()
        ];
    }
}

class BasketWithShipping extends BasketCost
{
    public function getCost()
    {
        return 12000;
    }

    public function getDescription()
    {
        return 'Shipping Cost';
    }

    public function getTotalCost()
    {
        return parent::getTotalCost() + self::getTotalCost();
    }

    public function getDetalis()
    {
        return parent::getDetalis() + [
            self::getDescription() => self::getCost()
        ];
    }
}

class BasketWithTax extends BasketCost
{
    public function getCost()
    {
        return parent::getTotalCost() * 0.09;
    }

    public function getDescription()
    {
        return 'Tax Cost';
    }

    public function getTotalCost()
    {
        return parent::getTotalCost() + self::getCost();
    }

    public function getDetalis()
    {
        return parent::getDetalis() + [
            self::getDescription() => self::getCost()
        ];
    }
}

class BasketWihtTaxAndShipping extends BasketWithTax
{
    public function getCost()
    {
        return 1500;
    }

    public function getDescription()
    {
        return 'shipping Cost';
    }

    public function getTotalCost()
    {
        return parent::getTotalCost() + self::getCost();
    }

    public function getDetalis()
    {
        return parent::getDetalis() + [
            self::getDescription() => self::getCost()
        ];
    }
}

$basket = new BasketWihtTaxAndShipping;
var_dump($basket->getDetalis());
var_dump($basket->getTotalCost());
