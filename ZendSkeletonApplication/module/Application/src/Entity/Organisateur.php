<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a single post in a blog.
 * @ORM\Entity
 * @ORM\Table(name="Organisateur")
 */
class Organisateur
{
    // Post status constants.
    const STATUS_DRAFT       = 1; // Draft.
    const STATUS_PUBLISHED   = 2; // Published.

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

    /**
     * @ORM\Column(type="string", name="prenom")
     */
    protected $prenom;

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

    // Returns prenom.
    public function getPrenom()
    {
        return $this->prenom;
    }

    // Sets nom.
    public function setPrenom($nom)
    {
        $this->nom = $nom;
    }
}
?>