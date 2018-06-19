<?php
declare(strict_types=1);

namespace App\Infraestructure\Domain\Model\Customer;

use App\Domain\Model\Customer\Customer;
use App\Domain\Model\Customer\CustomerRepository;
use App\Infraestructure\Domain\Model\DoctrineMysqlRepository;

/*
 * I will not use database on this example.
 * */
class FakeDoctrineCustomerRepository extends DoctrineMysqlRepository implements CustomerRepository
{
    /**
     * @param Customer $customer
     */
    public function add(Customer $customer)
    {
    }

    /**
     * @param int $id
     */
    public function findById (int $id)
    {
    }
}