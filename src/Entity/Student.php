<?php
/**
 * Created by PhpStorm.
 * User: santino83
 * Date: 01/06/19
 * Time: 18.11
 */

namespace Santino83\DB\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Student
 * @package Santino83\DB
 *
 * @ORM\Table(name="student")
 * @ORM\Entity()
 */
class Student
{

    /**
     * @var integer
     *
     * @ORM\Id()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=255, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=255, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="Phone", type="string", length=255, nullable=false)
     */
    private $phone;

    /**
     * @var Course[]
     */
    private $courses = [];

    /**
     * Student constructor.
     * @param int $id
     */
    public function __construct(int $id = 0)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $firstName
     * @return Student
     */
    public function setFirstName(?string $firstName): Student
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @param string $lastName
     * @return Student
     */
    public function setLastName(?string $lastName): Student
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @param string $phone
     * @return Student
     */
    public function setPhone(?string $phone): Student
    {
        $this->phone = $phone;
        return $this;
    }

}