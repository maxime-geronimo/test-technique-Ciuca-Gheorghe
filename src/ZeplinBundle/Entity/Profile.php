<?php

namespace ZeplinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity(repositoryClass="ZeplinBundle\Repository\ProfileRepository")
 */
class Profile
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="image_id", type="integer")
     */
    private $imageId;


    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", unique=true)
     */
    private $userId;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime",options={"default": 0})
     */
    private $time;




    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set imageId
     *
     * @param integer $imageId
     * @return Profile
     */
    public function setImageId($imageId)
    {
        $this->imageId = $imageId;

        return $this;
    }

    /**
     * Get imageId
     *
     * @return integer 
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Profile
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }


    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }


    /**
     * Set userId
     *
     * @param integer $userId
     * @return Profile
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

}
