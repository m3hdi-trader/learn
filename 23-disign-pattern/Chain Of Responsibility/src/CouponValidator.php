<?php

require 'Refactor/CouponExists.php';
require 'Refactor/CouponActive.php';
require 'Refactor/CouponExpired.php';


class CouponValidator
{
    private $coupon;
    public function __construct(Coupon  $coupon)
    {
        $this->coupon = $coupon;
    }

    public function validate(string $code)
    {
        $couponExists = new CouponExists($this->coupon);
        $couponActive = new CouponActive($this->coupon);
        $couponExpired = new CouponExpired($this->coupon);

        $couponExists->setNextVlidator($couponActive);
        $couponActive->setNextVlidator($couponExpired);

        $couponExists->validate($code);
    }
}
