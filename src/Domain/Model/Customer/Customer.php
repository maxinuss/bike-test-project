<?php
declare(strict_types=1);

namespace App\Domain\Model\Customer;

class Customer
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $firstName
     */
    private $firstName;

    /**
     * @var string $lastName
     */
    private $lastName;

    /**
     * @var int $documentNumber
     */
    private $documentNumber;

    /**
     * @var string $email
     */
    private $email;

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
     * @param string $firstName
     * @return Customer
     */
    public function setFirstName(string $firstName) : Customer
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName() : string
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     * @return Customer
     */
    public function setLastName(string $lastName) : Customer
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }

    /**
     * @param int $documentNumber
     * @return Customer
     */
    public function setDocumentNumber(int $documentNumber) : Customer
    {
        $this->documentNumber = $documentNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getDocumentNumber() : int
    {
        return $this->documentNumber;
    }

    /**
     * @param string $email
     * @return Customer
     */
    public function setEmail(string $email) : Customer
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }
}