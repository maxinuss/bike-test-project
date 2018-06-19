<?php
declare(strict_types=1);

namespace App\Application\Service\Rental;

use App\Infraestructure\Application\Payment\Payment;

use App\Domain\Model\Rental\Rental;
use App\Domain\Model\RentalStatus\RentalStatus;
use App\Domain\Model\Customer\Customer;

use App\Infraestructure\Domain\Model\Rental\FakeDoctrineRentalRepository;;
use App\Infraestructure\Domain\Model\RentalStatus\FakeDoctrineRentalStatusRepository;

class RentalService
{
    /**
     * @var FakeDoctrineRentalStatusRepository
     */
    private $fakeDoctrineRentalStatusRepository;

    /**
     * @var FakeDoctrineRentalRepository
     */
    private $fakeDoctrineRentalRepository;

    /**
     * RentalService constructor.
     */
    public function __construct()
    {
        $this->fakeDoctrineRentalStatusRepository = new FakeDoctrineRentalStatusRepository();
        $this->fakeDoctrineRentalRepository = new FakeDoctrineRentalRepository();
    }

    /**
     * @param Array $bikes
     * @param Customer $customer
     * @param Array $rentalTypes
     * @return bool
     */
    public function rent(Array $bikes, Customer $customer, Array $rentalTypes)
    {
        try {
            $amount = 0;

            for($i = 0; $i < count($bikes); $i++) {
                $rentalStatus = $this->fakeDoctrineRentalStatusRepository->findById(RentalStatus::CONFIRMED);

                $rental = new Rental();
                $rental->setBike($bikes[$i]);
                $rental->setCustomer($customer);
                $rental->setRentalStatus($rentalStatus);
                $rental->setRentalType($rentalTypes[$i]);

                $amount += $rentalTypes[$i]->getPrice();
            }

            if(count($bikes) >= 3) {
                $amount = $this->applyDiscount($amount);
            }

            $payment = new Payment();
            $paymentResponse = $payment->make($amount);

            if($paymentResponse) {
                for($i = 0; $i < count($bikes); $i++) {
                    $response = $this->fakeDoctrineRentalRepository->add($bikes[$i], $customer, $rentalTypes[$i]);
                }

                if($response) {
                    return true;
                }
            } else {
                return false;
            }

        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    private function applyDiscount($amount) {
        return $amount * 0.7;
    }
}