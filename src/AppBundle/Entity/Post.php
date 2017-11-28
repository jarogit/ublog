<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Post
{
    const NUM_ITEMS = 10;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(max=150)
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function setTitle(string $value)
    {
        $this->title = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setSlug(string $value)
    {
        $this->slug = $value;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setDate(\DateTime $value)
    {
        $this->date = $value;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setText(string $value)
    {
        $this->text = $value;
    }

    public function getText()
    {
        return $this->text;
    }

    /**
     * @ORM\PrePersist
     */
    public function preSave()
    {
        if (empty($this->slug)) {
            $this->slug = preg_replace('~\W~', '-', strtolower(trim(strip_tags($this->title))));
        }
    }
}
