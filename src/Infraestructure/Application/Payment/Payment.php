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
        $finalPrice = $rentalType->getPrice() - $rentalType->getDiscount();

        /**
         * Payment logic here. Not developed in this test project.
         */
    }


}