<?php
namespace Shop\LileyaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Shop\LileyaBundle\Entity\Repository\StyleRepository")
 * @ORM\Table(name="style")
 * @ORM\HasLifecycleCallbacks()
 */
class Style
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
    protected $name;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $nav;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="Style")
     */
    protected $product;
    public function __construct()
    {
        $this->product = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->getName();
    }


    /**
     * Get Id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Style
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nav
     *
     * @param string $nav
     * @return Style
     */
    public function setNav($nav)
    {
       $url=$this->getName();
        $url=$this->translitIt($url);
        $this->nav = $url;

        return $this;
    }

    /**
     * Get nav
     *
     * @return string 
     */
    public function getNav()
    {
        return $this->nav;
    }

    /**
     * Add product
     *
     * @param \Shop\LileyaBundle\Entity\Product $product
     * @return Style
     */
    public function addProduct(\Shop\LileyaBundle\Entity\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \Shop\LileyaBundle\Entity\Product $product
     */
    public function removeProduct(\Shop\LileyaBundle\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }
    
    static $transliteration_table = array( 'à'=>'a', 'á'=>'b','³'=>'i', 'â'=>'v', 'ã'=>'g', 'ä'=>'d', 'å'=>'e', 'æ'=>'g', 'ç'=>'z', 'è'=>'i', 'é'=>'y', 'ê'=>'k', 'ë'=>'l', 'ì'=>'m', 'í'=>'n', 'î'=>'o', 'ï'=>'p', 'ğ'=>'r', 'ñ'=>'s', 'ò'=>'t', 'ó'=>'u', 'ô'=>'f', 'û'=>'i', 'ı'=>'e', 'À'=>'A', 'Á'=>'B', 'Â'=>'V', 'Ã'=>'G', 'Ä'=>'D', 'Å'=>'E', 'Æ'=>'G', 'Ç'=>'Z', 'È'=>'I', 'É'=>'Y', 'Ê'=>'K', 'Ë'=>'L', 'Ì'=>'M', 'Í'=>'N', 'Î'=>'O', 'Ï'=>'P', 'Ğ'=>'R', 'Ñ'=>'S', 'Ò'=>'T', 'Ó'=>'U', 'Ô'=>'F', 'Û'=>'I', 'İ'=>'E', '¸'=>"yo", 'õ'=>"h", 'ö'=>"ts", '÷'=>"ch", 'ø'=>"sh", 'ù'=>"shch", 'ú'=>"", 'ü'=>"", 'ş'=>"yu", 'ÿ'=>"ya", '¨'=>"YO", 'Õ'=>"H", 'Ö'=>"TS", '×'=>"CH", 'Ø'=>"SH", 'Ù'=>"SHCH", 'Ú'=>"", 'Ü'=>"", 'Ş'=>"YU", 'ß'=>"YA", " "=>"_", );
function translitIt($str) 
{
    $str= strtr( $str, self::$transliteration_table );
    $str=strtolower($str);
    return $str;
}
}
