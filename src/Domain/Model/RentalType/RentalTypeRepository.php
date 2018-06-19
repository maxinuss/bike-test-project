<?php
declare(strict_types=1);

namespace App\Domain\Model\RentalType;

interface RentalTypeRepository
{
    /**
     * @param string $name
     * @param float $price
     * @param float $discount
     */
    public function add(string $name, float $price, float $discount);

    /**
     * @param int $id
     */
    public function findById (int $id);
}