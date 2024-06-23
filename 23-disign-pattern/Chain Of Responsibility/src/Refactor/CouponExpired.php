<?php
require_once 'AbstaractCouponValidator.php';

class CouponExpired extends abstaractCouponValidator
{



    public function validate($code)
    {
        if ($this->coupon->isExpired($code)) {
            throw new Exception('coupon Is Expired');
        }

        echo 'coupon Is Not  Expired' . PHP_EOL;

        return $this->goNextValidator($code);
    }
}
