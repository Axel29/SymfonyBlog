<?php

namespace Esgi\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories.
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Esgi\BlogBundle\Entity\Posts", mappedBy="categories", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="posts_categories")
     **/
    private $posts;

    /**
     * @var string
     *
     * @ORM\Column(name="category_slug", type="string", unique=true, length=255)
     */
    private $categorySlug;

    /**
     * @var string
     *
     * @ORM\Column(name="category_name", type="text")
     */
    private $categoryName;

    /**
     * @var string
     *
     * @ORM\Column(name="category_include_in_menu", type="integer", options={"default":0})
     */
    private $categoryIncludeInMenu;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set categorySlug.
     *
     * @param string $categorySlug
     *
     * @return Categories
     */
    public function setCategorySlug($categorySlug)
    {
        $this->categorySlug = $categorySlug;

        return $this;
    }

    /**
     * Get categorySlug.
     *
     * @return string
     */
    public function getCategorySlug()
    {
        return $this->categorySlug;
    }

    /**
     * Set categoryName.
     *
     * @param string $categoryName
     *
     * @return Categories
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get categoryName.
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Get categoryIncludeInMenu.
     *
     * @return string
     */
    public function getCategoryIncludeInMenu()
    {
        return $this->categoryIncludeInMenu;
    }

    /**
     * Set categoryIncludeInMenu.
     *
     * @param string $categoryIncludeInMenu
     */
    public function setCategoryIncludeInMenu($categoryIncludeInMenu)
    {
        $this->categoryIncludeInMenu = $categoryIncludeInMenu;
    }

    /**
     * Add posts.
     *
     * @param \Esgi\BlogBundle\Entity\Posts $post
     *
     * @return Categories
     */
    public function addPost(\Esgi\BlogBundle\Entity\Posts $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove posts.
     *
     * @param \Esgi\BlogBundle\Entity\Posts $post
     */
    public function removePost(\Esgi\BlogBundle\Entity\Posts $post)
    {
        $this->posts->removeElement($post);
    }

    /**
     * Get posts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    public function __toString()
    {
        return ($this->getCategoryName()) ?: '';
    }
}
