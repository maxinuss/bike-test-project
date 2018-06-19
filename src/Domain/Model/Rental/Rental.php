<?php
declare(strict_types=1);

namespace App\Domain\Model\Rental;

use App\Domain\Model\Customer\Customer;
use App\Domain\Model\Bike\Bike;
use App\Domain\Model\RentalStatus\RentalStatus;
use App\Domain\Model\RentalType\RentalType;

class Rental
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var Bike $bike
     */
    private $bike;

    /**
     * @var Customer $customer
     */
    private $customer;

    /**
     * @var RentalStatus $rentalStatus
     */
    private $rentalStatus;

    /**
     * @var RentalType $rentalType
     */
    private $rentalType;

    /**
     * @var \Datetime $creationDate
     */
    private $creationDate;

    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param Bike $bike
     * @return Rental
     */
    public function setBike(Bike $bike) : Rental
    {
        $this->bike = $bike;
        return $this;
    }

    /**
     * @return Bike
     */
    public function getBike() : Bike
    {
        return $this->bike;
    }

    /**
     * @param Customer $customer
     * @return Rental
     */
    public function setCustomer(Customer $customer) : Rental
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer() : Customer
    {
        return $this->customer;
    }

    /**
     * @param RentalStatus $rentalStatus
     * @return Rental
     */
    public function setRentalStatus(RentalStatus $rentalStatus) : Rental
    {
        $this->rentalStatus = $rentalStatus;
        return $this;
    }

    /**
     * @return RentalStatus
     */
    public function getRentalStatus() : RentalStatus
    {
        return $this->rentalStatus;
    }


    /**
     * @param RentalType $rentalType
     * @return Rental
     */
    public function setRentalType(RentalType $rentalType) : Rental
    {
        $this->rentalType = $rentalType;
        return $this;
    }

    /**
     * @return RentalType
     */
    public function getRentalType() : RentalType
    {
        return $this->rentalType;
    }

    /**
     * @param \DateTime $creationDate
     * @return Rental
     */
    public function setCreationDate(\DateTime $creationDate) : Rental
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate() : \DateTime
    {
        return $this->creationDate;
    }

}