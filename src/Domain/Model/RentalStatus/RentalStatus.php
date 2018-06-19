<?php
declare(strict_types=1);

namespace App\Domain\Model\RentalStatus;

class RentalStatus
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

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
     * @return RentalStatus
     */
    public function setName(string $name) : RentalStatus
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
}