<?php

interface paymentStragyInterface
{
    public function pay(int $amount);
}

class OnlinePaymentStrategy implements paymentStragyInterface
{
    public function pay(int $amount)
    {
        echo "pay $amount online" . PHP_EOL;
    }
}

class cachOnPaymentStrategy implements paymentStragyInterface
{
    public function pay(int $amount)
    {
        echo "pay $amount cachOn" . PHP_EOL;
    }
}

class cartToCartPaymentStrategy implements paymentStragyInterface
{
    public function pay(int $amount)
    {
        echo "pay $amount cartToCart" . PHP_EOL;
    }
}

class payment
{
    private $straangy;

    public function __construct(paymentStragyInterface $paymentStraangy)
    {
        $this->setStraangy($paymentStraangy);
    }

    public function setStraangy(paymentStragyInterface $paymentStraangy)
    {
        $this->straangy = $paymentStraangy;
    }

    public function pay(int $amount)
    {
        return $this->straangy->pay($amount);
    }
}

$payment = new payment(new OnlinePaymentStrategy);
$payment->pay(15000);

$payment->setStraangy(new cartToCartPaymentStrategy);
$payment->pay(14000);


// $payment = new Payment;
// $payment->pay(15000, 'cartToCart');
