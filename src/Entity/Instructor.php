<?php
/**
 * Created by PhpStorm.
 * User: santino83
 * Date: 01/06/19
 * Time: 18.40
 */

namespace Santino83\DB\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Instructor
 * @package Santino83\DB
 *
 * @ORM\Table(name="instructor")
 * @ORM\Entity()
 */
class Instructor
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
     * @return Instructor
     */
    public function setFirstName(?string $firstName): Instructor
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @param string $lastName
     * @return Instructor
     */
    public function setLastName(?string $lastName): Instructor
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @param string $phone
     * @return Instructor
     */
    public function setPhone(?string $phone): Instructor
    {
        $this->phone = $phone;
        return $this;
    }

}