<?php
namespace Shop\LileyaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass="Shop\LileyaBundle\Entity\Repository\ProductRepository")
 * @ORM\Table(name="product")
 * @ORM\HasLifecycleCallbacks()
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="string",length=20)
     */
    protected $image;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    protected $path;
    /*
    * @var string
    */
    protected $file;
    /**
     *@ORM\Column(type="text")
     */
    protected $describes;
    /**
     *@ORM\ManyToOne(targetEntity="Category", inversedBy="product")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;
     /**
     *@ORM\ManyToOne(targetEntity="Subcategory", inversedBy="product")
     * @ORM\JoinColumn(name="subcategory_id", referencedColumnName="id")
     */
    protected $subcategory;
     /**
     *@ORM\ManyToOne(targetEntity="Style", inversedBy="product")
     * @ORM\JoinColumn(name="style_id", referencedColumnName="id")
     */
    protected $style;
    /**
     *@ORM\Column(type="decimal")
     */

    protected $price;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }


    /**
     *@ORM\OneToMany(targetEntity="Comment", mappedBy="product")
     */
    protected $comments;
    
   
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
     * Set title
     *
     * @param string $title
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Product
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set describe
     *
     * @param string $describe
     * @return Product
     */
    public function setDescribes($describes)
    {
        $this->describes = $describes;

        return $this;
    }

    /**
     * Get describe
     *
     * @return string 
     */
    public function getDescribes($length = null)
    {
        if (false === is_null($length) && $length > 0)
            return substr($this->describes, 0, $length);
        else
            return $this->describes;
    }

    /**
     * Set catigories
     *
     * @param string $catigories
     * @return Product
     */
    public function setCatigories($catigories)
    {
        $this->catigories = $catigories;

        return $this;
    }

    /**
     * Get catigories
     *
     * @return string 
     */
    public function getCatigories()
    {
        return $this->catigories;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add comments
     *
     * @param \Shop\LileyaBundle\Entity\Comment $comments
     * @return Product
     */
    public function addComment(\Shop\LileyaBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Shop\LileyaBundle\Entity\Comment $comments
     */
    public function removeComment(\Shop\LileyaBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * Get file.
     * 
     * @return UploadedFile 
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * Sets file.
     * 
     * @param UploadedFile $file 
     */
    public function setFile($file)
    {
        $this->file = $file;
    }
    protected function getUploadDir()
    {
        return 'images';
    }
    protected function getUploadRootDir()
    {
        return __dir__ . '/../../../../web/' . $this->getUploadDir();
    }
    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir() . '/' . $this->
            image;
    }
    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDirDir() . '/' . $this->
            image;
    }
    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            //уникальное имя файла
            $this->image = uniqid() . '.' . $this->file->guessExtension();
        }
    }
    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }
        $this->file->move($this->getUploadRootDir(), $this->image);

        unset($this->file);
    }
    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Product
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set category
     *
     * @param \Shop\LileyaBundle\Entity\Category $catigory
     * @return Product
     */
    public function setCatigory(\Shop\LileyaBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get catigory
     *
     * @return \Shop\LileyaBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set category
     *
     * @param \Shop\LileyaBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\Shop\LileyaBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Shop\LileyaBundle\Entity\Category 
     */


    /**
     * Set subcategory
     *
     * @param \Shop\LileyaBundle\Entity\Subcategory $subcategory
     * @return Product
     */
    public function setSubcategory(\Shop\LileyaBundle\Entity\Subcategory $subcategory = null)
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    /**
     * Get subcategory
     *
     * @return \Shop\LileyaBundle\Entity\Subcategory 
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * Set style
     *
     * @param \Shop\LileyaBundle\Entity\Style $style
     * @return Product
     */
    public function setStyle(\Shop\LileyaBundle\Entity\Style $style = null)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return \Shop\LileyaBundle\Entity\Style 
     */
    public function getStyle()
    {
        return $this->style;
    }
}
