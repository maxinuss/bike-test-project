<?php
declare(strict_types=1);

namespace App\Infraestructure\Domain\Model\RentalStatus;

use App\Domain\Model\RentalStatus\RentalStatusRepository;
use App\Infraestructure\Domain\Model\DoctrineMysqlRepository;

/*
 * I will not use database on this example.
 * */
class FakeDoctrineRentalStatusRepository extends DoctrineMysqlRepository implements RentalStatusRepository
{
    /**
     * @param string $name
     */
    public function add(string $name)
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