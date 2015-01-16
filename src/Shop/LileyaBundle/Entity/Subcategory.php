<?php
namespace Shop\LileyaBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Shop\LileyaBundle\Entity\Repository\SubcategoryRepository")
 * @ORM\Table(name="subcategory")
 * @ORM\HasLifecycleCallbacks()
 */
class Subcategory{
    /**
     * @var integer
     * 
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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="subcategory")
     */
    protected $product;
    public function __construct() {
       $this->product=new ArrayCollection();
      
      }
    public function __toString() {
        return $this->getName();
    }
    

    
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
     * Set name
     *
     * @param string $name
     * @return Subcategory
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
     * @return Subcategory
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
     * @return Subcategory
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
    static $transliteration_table = array( 'а'=>'a', 'б'=>'b', 'в'=>'v', 'г'=>'g', 'д'=>'d', 'е'=>'e', 'ж'=>'g', 'з'=>'z', 'и'=>'i', 'й'=>'y', 'к'=>'k', 'л'=>'l', 'м'=>'m', 'н'=>'n', 'о'=>'o', 'п'=>'p', 'р'=>'r', 'с'=>'s', 'т'=>'t', 'у'=>'u', 'ф'=>'f', 'ы'=>'i', 'э'=>'e', 'А'=>'A', 'Б'=>'B', 'В'=>'V', 'Г'=>'G', 'Д'=>'D', 'Е'=>'E', 'Ж'=>'G', 'З'=>'Z', 'И'=>'I', 'Й'=>'Y', 'К'=>'K', 'Л'=>'L', 'М'=>'M', 'Н'=>'N', 'О'=>'O', 'П'=>'P', 'Р'=>'R', 'С'=>'S', 'Т'=>'T', 'У'=>'U', 'Ф'=>'F', 'Ы'=>'I', 'Э'=>'E', 'ё'=>"yo", 'х'=>"h", 'ц'=>"ts", 'ч'=>"ch", 'ш'=>"sh", 'щ'=>"shch", 'ъ'=>"", 'ь'=>"", 'ю'=>"yu", 'я'=>"ya", 'Ё'=>"YO", 'Х'=>"H", 'Ц'=>"TS", 'Ч'=>"CH", 'Ш'=>"SH", 'Щ'=>"SHCH", 'Ъ'=>"", 'Ь'=>"", 'Ю'=>"YU", 'Я'=>"YA", " "=>"_", );
function translitIt($str) 
{
    $str= strtr( $str, self::$transliteration_table );
    $str=strtolower($str);
    return $str;
}
}
