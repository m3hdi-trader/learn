<?php

abstract class AbstaractCouponValidator
{
    protected Coupon  $coupon;
    protected $nextValidation;


    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function setNextVlidator(AbstaractCouponValidator $validator)
    {
        $this->nextValidation = $validator;
    }

    protected function goNextValidator($code)
    {
        if ($this->nextValidation == null) {
            return true;
        }
        return $this->nextValidation->validate($code);
    }

    abstract public function validate($code);
}
