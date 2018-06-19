<?php
declare(strict_types=1);

namespace App\Domain\Model\Bike;

use App\Domain\Model\BikeModel\BikeModel;
use App\Domain\Model\BikeStatus\BikeStatus;

class Bike
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var BikeModel $bikeModel
     */
    private $bikeModel;

    /**
     * @var int $year
     */
    private $year;

    /**
     * @var BikeStatus $bikeStatus
     */
    private $bikeStatus;

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
     * @param BikeModel $bikeModel
     * @return Bike
     */
    public function setModel(BikeModel $bikeModel) : Bike
    {
        $this->bikeModel = $bikeModel;
        return $this;
    }

    /**
     * @return BikeModel
     */
    public function getModel() : BikeModel
    {
        return $this->bikeModel;
    }

    /**
     * @param int $year
     * @return Bike
     */
    public function setYear(int $year) : Bike
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear() : int
    {
        return $this->year;
    }

    /**
     * @param BikeStatus $bikeStatus
     * @return Bike
     */
    public function setBikeStatus(BikeStatus $bikeStatus) : Bike
    {
        $this->bikeStatus = $bikeStatus;
        return $this;
    }

    /**
     * @return BikeStatus
     */
    public function getBikeStatus() : BikeStatus
    {
        return $this->bikeStatus;
    }

}