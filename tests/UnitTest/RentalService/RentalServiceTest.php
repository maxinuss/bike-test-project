<?php
namespace Tests\UnitTest\RentalService;

use App\Domain\Model\Bike\Bike;
use App\Domain\Model\BikeBrand\BikeBrand;
use App\Domain\Model\BikeModel\BikeModel;
use App\Domain\Model\BikeStatus\BikeStatus;
use App\Domain\Model\Customer\Customer;
use App\Domain\Model\RentalType\RentalType;
use PHPUnit\Framework\TestCase;
use App\Application\Service\Rental\RentalService;

class RentalServiceTest extends TestCase
{
    public function testRentalServiceByHour()
    {
        $rentalType = new RentalType();
        $rentalType->setName('Hour');
        $rentalType->setPrice(5.00);

        $rentalService = new RentalService();
        $response = $rentalService->rent([$this->getBike()], $this->getCustomer(), [$rentalType], [1]);

        $this->assertTrue($response);
    }

    public function testRentalServiceByDay()
    {
        $rentalType = new RentalType();
        $rentalType->setName('Day');
        $rentalType->setPrice(20.00);

        $rentalService = new RentalService();
        $response = $rentalService->rent([$this->getBike()], $this->getCustomer(), [$rentalType], [1]);

        $this->assertTrue($response);
    }

    public function testRentalServiceByWeek()
    {
        $rentalType = new RentalType();
        $rentalType->setName('Week');
        $rentalType->setPrice(60.00);

        $rentalService = new RentalService();
        $response = $rentalService->rent([$this->getBike()], $this->getCustomer(), [$rentalType], [1]);

        $this->assertTrue($response);
    }

    public function testRentalServiceByFamilyPromotion()
    {
        $rentalType1 = new RentalType();
        $rentalType1->setName('Week');
        $rentalType1->setPrice(60.00);

        $rentalType2 = new RentalType();
        $rentalType2->setName('Day');
        $rentalType2->setPrice(20.00);

        $rentalType3 = new RentalType();
        $rentalType3->setName('Week');
        $rentalType3->setPrice(60.00);

        $rentalService = new RentalService();
        $response = $rentalService->rent([$this->getBike(), $this->getBike(), $this->getBike()], $this->getCustomer(), [$rentalType1, $rentalType2, $rentalType3], [1, 1, 1]);

        $this->assertTrue($response);
    }

    public function testRentalServiceByWeekNeedToFail()
    {
        $rentalType = new RentalType();
        $rentalType->setName('Week');
        $rentalType->setPrice(60.00);

        $rentalService = new RentalService();
        $response = $rentalService->rent([$this->getBike(), $this->getBike()], $this->getCustomer(), [$rentalType], [1]);

        $this->assertFalse($response);
    }

    private function getCustomer() {
        $customer = new Customer();
        $customer->setDocumentNumber(11222333);
        $customer->setFirstName('John');
        $customer->setLastName('Doe');
        $customer->setEmail('email@email.com');

        return $customer;
    }

    private function getBike() {
        $bikeStatus = new BikeStatus();
        $bikeStatus->setName('Good, with some details');

        $bikeBrand = new BikeBrand();
        $bikeBrand->setName('Honda');

        $bikeModel = new BikeModel();
        $bikeModel->setName('Runner 2005');
        $bikeModel->setBikeBrand($bikeBrand);

        $bike = new Bike();
        $bike->setBikeStatus($bikeStatus);
        $bike->setModel($bikeModel);
        $bike->setYear(2017);

        return $bike;
    }
}