<?php
declare(strict_types=1);

namespace App\Application\Service\Rental;

use App\Domain\Model\Bike\Bike;
use App\Domain\Model\Rental\Rental;
use App\Domain\Model\RentalStatus\RentalStatus;
use App\Infraestructure\Domain\Model\Rental\FakeDoctrineRentalRepository;

class RentalService
{
    public function rent(int $bikeId, int $customerId, int $rentalTypeId)
    {
        $bike = $this->fakeDoctrineBikeRepository->findById($bikeId);
        $customer = $this->fakeDoctrineBikeRepository->findById($customerId);

        $rental = new Rental();
        $rental->setBike($bike);
        $rental->setCustomer($customer);
        $rental->setRentalStatus(RentalStatus::CONFIRMED);
        $rental->setRentalType();

        $this->fakeDoctrineRentalRepository->add($rental);
    }
}