<?php
declare(strict_types=1);

namespace App\Infraestructure\Domain\Model\Bike;

use App\Domain\Model\Bike\Bike;
use App\Domain\Model\Bike\BikeRepository;
use App\Infraestructure\Domain\Model\DoctrineMysqlRepository;

/*
 * I will not use database on this example.
 * */
class FakeDoctrineBikeRepository extends DoctrineMysqlRepository implements BikeRepository
{
    /**
     * @param Bike $bike
     */
    public function add(Bike $bike)
    {
    }

    /**
     * @param int $id
     */
    public function findById (int $id)
    {
    }
}