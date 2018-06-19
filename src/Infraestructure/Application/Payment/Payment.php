<?php
declare(strict_types=1);

namespace App\Infraestructure\Application\Payment;

use App\Domain\Model\RentalType\RentalType;

class Payment
{
    /**
     * @param float $amount
     */
    public function make(RentalType $rentalType)
    {
        if($rentalType->getPercentDiscount() > 0) {
            $finalPrice = $rentalType->getPrice() - (($rentalType->getPrice() * $rentalType->getPercentDiscount()) / 100);
        } else {
            $finalPrice = $rentalType->getPrice();
        }

        //$finalPrice with discount if apply.

        /**
         * Payment logic here. Not developed in this test project.
         */

        return true;
    }


}