<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Element\Date;
use Zend\Form\Element\DateTime;
use Ramsey\Uuid\Uuid;

/**
 * This class represents a single post in a blog.
 * @ORM\Entity(repositoryClass="\Application\Repository\MeetupRepository")
 * @ORM\Table(name="Meetup")
 */
class Meetup
{
    // Post status constants.
    const STATUS_DRAFT       = 1; // Draft.
    const STATUS_PUBLISHED   = 2; // Published.

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=36)
     */
    protected $idmeetup = '0000';

    /**
     * @ORM\Column(type="string", name="titre")
     */
    protected $titre;

    /**
     * @ORM\Column(type="string", name="description")
     */
    protected $description;

    /**
     * @ORM\Column(type="string", name="datedeb")
     */
    protected $datedeb;

    /**
     * @ORM\Column(type="string", name="datefin")
     */
    protected $datefin;

    // Returns ID of this meetup.
    public function getId()
    {
        return $this->idmeetup;
    }

    // Sets ID of this meetup.
    public function setId($id)
    {
        $this->idmeetup = $id;
    }

    // Returns title.
    public function getTitre()
    {
        return $this->titre;
    }

    // Sets title.
    public function setTitre($title)
    {
        $this->title = $title;
    }

    // Returns description.
    public function getDescription()
    {
        return $this->description;
    }

    // Sets description.
    public function setDescription($description)
        {
        $this->description = $description;
    }

    // Returns meetup start date.
    public function getDatedeb()
    {
        return $this->datedeb;
    }

    // Sets meetup start debut
    public function setDateDeb($datedeb)
    {
        $this->datedeb = $datedeb;
    }

    // Returns meetup end date
    public function getDatefin()
    {
        return $this->datefin;
    }

    // Sets the date when this post was created.
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    public function __construct(string $title, string $description = '', string $datedeb, string $datefin)
    {
        $this->idmeetup = Uuid::uuid4()->toString();
        $this->titre = $title;
        $this->description = $description;
        $this->datedeb = $datedeb;
        $this->datefin = $datefin;
    }
}
?>