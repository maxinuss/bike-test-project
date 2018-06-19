<?php
declare(strict_types=1);

namespace App\Domain\Model\BikeModel;

use App\Domain\Model\BikeBrand\BikeBrand;

class BikeModel
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
     * @var BikeBrand $bikeBrand
     */
    private $bikeBrand;

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
     * @return BikeModel
     */
    public function setName(string $name) : BikeModel
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
     * @param BikeBrand $bikeBrand
     * @return BikeModel
     */
    public function setBikeBrand(BikeBrand $bikeBrand) : BikeModel
    {
        $this->bikeBrand = $bikeBrand;
        return $this;
    }

    /**
     * @return BikeBrand
     */
    public function getBikeBrand() : BikeBrand
    {
        return $this->bikeBrand;
    }
}