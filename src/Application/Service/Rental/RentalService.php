<?php
declare(strict_types=1);

namespace App\Application\Service\Rental;

use App\Infraestructure\Application\Payment\Payment;

use App\Domain\Model\Rental\Rental;
use App\Domain\Model\RentalStatus\RentalStatus;
use App\Domain\Model\RentalType\RentalType;
use App\Domain\Model\Bike\Bike;
use App\Domain\Model\Customer\Customer;

use App\Infraestructure\Domain\Model\Rental\FakeDoctrineRentalRepository;
use App\Infraestructure\Domain\Model\Bike\FakeDoctrineBikeRepository;
use App\Infraestructure\Domain\Model\RentalType\FakeDoctrineRentalTypeRepository;
use App\Infraestructure\Domain\Model\RentalStatus\FakeDoctrineRentalStatusRepository;
use App\Infraestructure\Domain\Model\Customer\FakeDoctrineCustomerRepository;

class RentalService
{
    /**
     * @var FakeDoctrineBikeRepository
     */
    private $fakeDoctrineBikeRepository;

    /**
     * @var FakeDoctrineCustomerRepository
     */
    private $fakeDoctrineCustomerRepository;

    /**
     * @var FakeDoctrineRentalTypeRepository
     */
    private $fakeDoctrineRentalTypeRepository;

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
        $this->fakeDoctrineBikeRepository = new FakeDoctrineBikeRepository();
        $this->fakeDoctrineCustomerRepository = new FakeDoctrineCustomerRepository();
        $this->fakeDoctrineRentalTypeRepository = new FakeDoctrineRentalTypeRepository();
        $this->fakeDoctrineRentalStatusRepository = new FakeDoctrineRentalStatusRepository();
        $this->fakeDoctrineRentalRepository = new FakeDoctrineRentalRepository();
    }

    /**
     * @param Bike $bike
     * @param Customer $customer
     * @param RentalType $rentalType
     * @return bool
     */
    public function rent(Bike $bike, Customer $customer, RentalType $rentalType)
    {
        try {
            $rentalStatus = $this->fakeDoctrineRentalStatusRepository->findById(RentalStatus::CONFIRMED);

            $rental = new Rental();
            $rental->setBike($bike);
            $rental->setCustomer($customer);
            $rental->setRentalStatus($rentalStatus);
            $rental->setRentalType($rentalType);

            $payment = new Payment();
            $paymentResponse = $payment->make($rentalType->getPrice());

            if($paymentResponse) {
                return $this->fakeDoctrineRentalRepository->add($bike, $customer, $rentalType);
            } else {
                return false;
            }

        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    /**
     * @param Array $bikes
     * @param Customer $customer
     * @param Array $rentalTypes
     * @return bool
     */
    public function rentByGroup(Array $bikes, Customer $customer, Array $rentalTypes)
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