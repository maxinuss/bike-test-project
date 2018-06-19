<?php
declare(strict_types=1);

namespace App\Domain\Model\Bike;

interface BikeRepository
{
    /**
     * @param Bike $bike
     */
    public function add(Bike $bike);

    /**
     * @param int $id
     */
    public function findById (int $id);
}