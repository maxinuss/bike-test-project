<?php
declare(strict_types=1);

namespace App\Infraestructure\Domain\Model\RentalType;

use App\Domain\Model\RentalType\RentalTypeRepository;
use App\Infraestructure\Domain\Model\DoctrineMysqlRepository;

/*
 * I will not use database on this example.
 * */
class FakeDoctrineRentalTypeRepository extends DoctrineMysqlRepository implements RentalTypeRepository
{
    /**
     * @param string $name
     * @param float $price
     */
    public function add(string $name, float $price)
    {
        return true;
    }

    /**
     * @param int $id
     */
    public function findById (int $id)
    {
        return true;
    }
}