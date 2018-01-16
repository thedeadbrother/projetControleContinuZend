<?php
declare(strict_types=1);
namespace Application\Repository;

use Application\Entity\Meetup;
use Doctrine\ORM\EntityRepository;

final class MeetupRepository extends \Doctrine\ORM\EntityRepository{

    public function add($meetup) : void
    {
        $this->getEntityManager()->persist($meetup);
        $this->getEntityManager()->flush($meetup);
    }
    public function createMeetup(string $idmeetup, string $title, string $description = '', string $datedeb = '', string $datefin='')
    {
        return new Meetup($idmeetup, $title, $description, $datedeb, $datefin);
    }
}