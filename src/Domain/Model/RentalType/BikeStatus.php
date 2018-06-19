<?php
declare(strict_types=1);

namespace App\Domain\Model\RentalType;

class RentalType
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var float $price
     */
    private $price;

    /**
     * @var float $discount
     */
    private $discount;

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
     * @param string $name
     * @return RentalType
     */
    public function setName(string $name) : RentalType
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param float $price
     * @return RentalType
     */
    public function sePrice(float $price) : RentalType
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice() : float
    {
        return $this->price;
    }

    /**
     * @param float $discount
     * @return RentalType
     */
    public function seDiscount(float $discount) : RentalType
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount() : float
    {
        return $this->discount;
    }
}