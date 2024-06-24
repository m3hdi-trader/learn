<?php

class Kavenekar
{
    public function SendNotification()
    {
        echo 'sende sms';
    }
}

class KavenegarAdaptor
{
    private $Kavenekar;

    public function __construct(Kavenekar $Kavenekar)
    {
        $this->Kavenekar = $Kavenekar;
    }
    public function sendsms()
    {
        return $this->Kavenekar->SendNotification();
    }
}

class User
{
    private $KavenegarAdaptor;

    public function __construct(KavenegarAdaptor $KavenegarAdaptor)
    {
        $this->KavenegarAdaptor = $KavenegarAdaptor;
    }

    public function creat()
    {
        echo "creat User" . PHP_EOL;
        $this->KavenegarAdaptor->sendsms();
    }
}

$Kavenekar = new Kavenekar;
$KavenegarAdaptor = new KavenegarAdaptor($Kavenekar);
$user = new User($KavenegarAdaptor);
$user->creat();
