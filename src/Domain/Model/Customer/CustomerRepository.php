<?php
declare(strict_types=1);

namespace App\Domain\Model\Customer;

interface CustomerRepository
{
    /**
     * @param Customer $customer
     */
    public function add(Customer $customer);

    /**
     * @param int $id
     */
    public function findById (int $id);
}