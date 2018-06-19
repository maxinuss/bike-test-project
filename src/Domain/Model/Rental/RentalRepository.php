<?php
declare(strict_types=1);

namespace App\Domain\Model\Rental;

interface RentalRepository
{
    /**
     * @param Bike $bike
     * @param Customer $customer
     * @param RentalType $rentalType
     */
    public function add(Bike $bike, Customer $customer, RentalType $rentalType);

    /**
     * @param int $id
     */
    public function findById (int $id);
}