<?php
/**
 * Created by PhpStorm.
 * User: santino83
 * Date: 01/06/19
 * Time: 18.36
 */

namespace Santino83\DB\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Department
 * @package Santino83\DB
 *
 * @ORM\Table(name="department")
 * @ORM\Entity()
 */
class Department
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
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Location", type="string", length=255, nullable=false)
     */
    private $location;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string $name
     * @return Department
     */
    public function setName(?string $name): Department
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $location
     * @return Department
     */
    public function setLocation(?string $location): Department
    {
        $this->location = $location;
        return $this;
    }

}