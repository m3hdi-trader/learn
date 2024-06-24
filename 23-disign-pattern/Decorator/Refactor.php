<?php

interface Cost
{
    public function getCost();
    public function getDescription();
    public function getTotalCost();
    public function getDetalis();
}

class BasketCost implements Cost
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

abstract class AbstractDecorator implements cost
{
    protected $cost;

    public function __construct(cost $cost)
    {
        $this->cost = $cost;
    }

    public function getTotalCost()
    {
        return $this->cost->getTotalCost() + static::getCost();
    }

    public function getDetalis()
    {
        return $this->cost->getDetalis() + [
            static::getDescription() => static::getCost()
        ];
    }
}

class ShippingDecorator extends AbstractDecorator
{
    public function getCost()
    {
        return 12000;
    }

    public function getDescription()
    {
        return 'Shipping Cost';
    }
}

class basketWithTax extends AbstractDecorator
{
    public function getCost()
    {
        return $this->cost->getTotalCost() * 0.09;
    }

    public function getDescription()
    {
        return 'Tax Cost';
    }
}

class PackageDecorator extends AbstractDecorator
{
    public function getCost()
    {
        return 5000;
    }

    public function getDescription()
    {
        return 'Package Cost';
    }
}


$basket = new BasketCost;
$ShippingAndBasketCost = new ShippingDecorator(new BasketCost);
$basketWithTax = new basketWithTax(new BasketCost);
$basketwithShippingAndPackage = new ShippingDecorator(new PackageDecorator(new BasketCost));
$basketWithShippingAndTax = new ShippingDecorator($basketWithTax);
var_dump($basketwithShippingAndPackage->getDetalis());
var_dump($basketwithShippingAndPackage->getTotalCost());
