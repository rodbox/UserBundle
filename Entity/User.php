<?php

namespace RB\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RB\UserBundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $lastname;
    
    /** @ORM\Column(type="string", nullable=true) **/
    protected $firstname;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $adress;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $cp;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $city;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $country;

    /** @ORM\Column(type="boolean", nullable=true) **/
    protected $active;

    // * @ORM\Column(type="string", nullable=true) *
    protected $type;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $businessName;

    /** @ORM\Column(type="datetime", nullable=true) **/
    protected $birthday;

    /** @ORM\Column(type="datetime", nullable=true) **/
    protected $dateCrea;

    /** @ORM\Column(type="datetime", nullable=true) **/
    protected $dateLastConnect;

    /** @ORM\Column(type="datetime", nullable=true) **/
    protected $dateUpd;

    /** @ORM\Column(type="array") **/
    protected $lang;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $tel;

    /** @ORM\Column(type="string", nullable=true) **/
    protected $img;

    /** @ORM\Column(type="object", nullable=true) **/
    protected $meta;



    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return User
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return User
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set businessName
     *
     * @param string $businessName
     *
     * @return User
     */
    public function setBusinessName($businessName)
    {
        $this->businessName = $businessName;

        return $this;
    }

    /**
     * Get businessName
     *
     * @return string
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set dateCrea
     *
     * @param \DateTime $dateCrea
     *
     * @return User
     */
    public function setDateCrea($dateCrea)
    {
        $this->dateCrea = $dateCrea;

        return $this;
    }

    /**
     * Get dateCrea
     *
     * @return \DateTime
     */
    public function getDateCrea()
    {
        return $this->dateCrea;
    }

    /**
     * Set dateLastConnect
     *
     * @param \DateTime $dateLastConnect
     *
     * @return User
     */
    public function setDateLastConnect($dateLastConnect)
    {
        $this->dateLastConnect = $dateLastConnect;

        return $this;
    }

    /**
     * Get dateLastConnect
     *
     * @return \DateTime
     */
    public function getDateLastConnect()
    {
        return $this->dateLastConnect;
    }

    /**
     * Set dateUpd
     *
     * @param \DateTime $dateUpd
     *
     * @return User
     */
    public function setDateUpd($dateUpd)
    {
        $this->dateUpd = $dateUpd;

        return $this;
    }

    /**
     * Get dateUpd
     *
     * @return \DateTime
     */
    public function getDateUpd()
    {
        return $this->dateUpd;
    }

    /**
     * Set lang
     *
     * @param array $lang
     *
     * @return User
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return array
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return User
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set meta
     *
     * @param \stdClass $meta
     *
     * @return User
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Get meta
     *
     * @return \stdClass
     */
    public function getMeta()
    {
        return $this->meta;
    }
}
