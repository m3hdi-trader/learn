<?php
require_once 'AbstaractCouponValidator.php';
class CouponActive extends abstaractCouponValidator
{


    public function validate($code)
    {
        if (empty($this->coupon->find($code))) {
            throw new Exception('coupon Not Exists');
        }
        echo 'coupon Is Active' . PHP_EOL;
        return $this->goNextValidator($code);
    }
}
