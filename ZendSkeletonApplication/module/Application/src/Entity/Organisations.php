<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a single post in a blog.
 * @ORM\Entity
 * @ORM\Table(name="Organisations")
 */
class Organisations
{
    // Post status constants.
    const STATUS_DRAFT       = 1;
    const STATUS_PUBLISHED   = 2;
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string", name="idmeetup")
     */
    protected $idmeetup;

    /**
     * @ORM\Column(type="string", name="nom")
     */
    protected $nom;


    // Returns ID of this meetup.
    public function getIdmeetup()
    {
        return $this->idmeetup;
    }

    // Sets ID of this meetup.
    public function setIdmeetup($id)
    {
        $this->idmeetup = $id;
    }

    // Returns name.
    public function getNom()
    {
        return $this->nom;
    }

    // Sets nom.
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}
?>