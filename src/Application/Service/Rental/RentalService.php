<?php
declare(strict_types=1);

namespace App\Application\Service\Rental;

use App\Infraestructure\Application\Payment\Payment;
use App\Domain\Model\Rental\Rental;
use App\Domain\Model\RentalStatus\RentalStatus;
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
     * @param int $bikeId
     * @param int $customerId
     * @param int $rentalTypeId
     * @return bool
     */
    public function rent(int $bikeId, int $customerId, int $rentalTypeId)
    {
        try {
            $bike = $this->fakeDoctrineBikeRepository->findById($bikeId);
            $customer = $this->fakeDoctrineCustomerRepository->findById($customerId);
            $rentalType = $this->fakeDoctrineRentalTypeRepository->findById($customerId);
            $rentalStatus = $this->fakeDoctrineRentalStatusRepository->findById(RentalStatus::CONFIRMED);

            $rental = new Rental();
            $rental->setBike($bike);
            $rental->setCustomer($customer);
            $rental->setRentalStatus($rentalStatus);
            $rental->setRentalType($rentalType);

            $payment = new Payment();
            $paymentResponse = $payment->make($rentalType);

            if($paymentResponse) {
                return $this->fakeDoctrineRentalRepository->add($rental);
            } else {
                return false;
            }

        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }
}