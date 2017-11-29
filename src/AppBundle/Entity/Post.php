<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups as ApiGroups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="posts")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"slug"})
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ApiGroups({"list"})
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     * @ApiGroups({"list"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\NotBlank()
     * @ApiGroups({"list"})
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $text;

    /**
     * @ORM\Column(type="date")
     * @ApiGroups({"list"})
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="posts", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="posts_tags")
     * @var ArrayCollection
     */
    private $tags;

    /**
     * @ORM\Column(type="boolean")
     * @ApiGroups({"list"})
     */
    private $published;

    /**
     * @ORM\Column(type="integer")
     * @ApiGroups({"list"})
     */
    private $views = 0;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->tags = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($value)
    {
        $this->title = $value;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setSlug($value)
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

    public function setText($value)
    {
        $this->text = $value;
    }

    public function getText()
    {
        return $this->text;
    }

    public function addTag(Tag $tag): self
    {
        $this->tags[] = $tag;

        return $this;
    }

    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function __toString()
    {
        return $this->title;
    }

    public function setPublished($published): self
    {
        $this->published = $published;

        return $this;
    }

    public function isPublished()
    {
        return $this->published;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    public function incViews(): self
    {
        $this->views++;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }
}
