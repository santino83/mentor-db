<?php
/**
 * Created by PhpStorm.
 * User: santino83
 * Date: 01/06/19
 * Time: 18.38
 */

namespace Santino83\DB\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class Course
 * @package Santino83\DB
 *
 * @ORM\Table(table="course")
 * @ORM\Entity()
 */
class Course
{

    /**
     * @var integer
     *
     * @ORM\Id()
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="Duration", type="integer", nullable=false)
     */
    private $duration = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param int $duration
     * @return Course
     */
    public function setDuration(?int $duration): Course
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @param string $name
     * @return Course
     */
    public function setName(?string $name): Course
    {
        $this->name = $name;
        return $this;
    }

}