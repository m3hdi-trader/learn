<?php
require_once 'AbstaractCouponValidator.php';
class CouponExists  extends abstaractCouponValidator
{

    public function validate($code)
    {
        if (empty($this->coupon->find($code))) {
            throw new Exception('coupon Not Exists');
        }

        echo 'coupon exists' . PHP_EOL;

        return $this->goNextValidator($code);
    }
}
