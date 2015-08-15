<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Exclude;

/**
 * @ORM\Entity
 * @ORM\Table(name="event")
 * @ExclusionPolicy("none")
 */
class Event
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $subtitle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDateTime;

    /**
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $imageUrl;

    /**
     * @ORM\Column(type="boolean")
     */
    private $premium;

    /**
     * @ORM\ManyToOne(targetEntity="EventCategory", inversedBy="events")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="SET NULL")
     **/
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="UpcomingEventSet", inversedBy="events")
     * @ORM\JoinColumn(name="upcoming_event_set_id", referencedColumnName="id", onDelete="SET NULL")
     * @Exclude
     **/
    private $upcomingEventSet;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return mixed
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * @param mixed $startDateTime
     */
    public function setStartDateTime($startDateTime)
    {
        $this->startDateTime = $startDateTime;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPremium()
    {
        return $this->premium;
    }

    /**
     * @param mixed $premium
     */
    public function setPremium($premium)
    {
        $this->premium = $premium;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getUpcomingEventSet()
    {
        return $this->upcomingEventSet;
    }

    /**
     * @param mixed $upcomingEventSet
     */
    public function setUpcomingEventSet($upcomingEventSet)
    {
        $this->upcomingEventSet = $upcomingEventSet;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param mixed $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
    }

}