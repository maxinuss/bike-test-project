<?php
declare(strict_types=1);

namespace App\Domain\Model\RentalStatus;

interface RentalStatusRepository
{
    /**
     * @param string $name
     */
    public function add(string $name);

    /**
     * @param int $id
     */
    public function findById (int $id);
}