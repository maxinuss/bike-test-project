<?php
declare(strict_types=1);

namespace App\Infraestructure\Domain\Model\Rental;

use App\Domain\Model\Bike\Bike;
use App\Domain\Model\Rental\Rental;
use App\Domain\Model\Customer\Customer;
use App\Domain\Model\RentalType\RentalType;
use App\Domain\Model\Rental\RentalRepository;
use App\Infraestructure\Domain\Model\DoctrineMysqlRepository;

/*
 * I will not use database on this example.
 * */
class FakeDoctrineRentalRepository extends DoctrineMysqlRepository implements RentalRepository
{
    /**
     * @param Bike $bike
     * @param Customer $customer
     * @param RentalType $rentalType
     */
    public function add(Bike $bike, Customer $customer, RentalType $rentalType)
    {
    }

    /**
     * @param int $id
     */
    public function findById (int $id)
    {
    }
}