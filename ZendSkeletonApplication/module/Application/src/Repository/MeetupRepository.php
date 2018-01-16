<?php
declare(strict_types=1);
namespace Application\Repository;

use Application\Entity\Meetup;

final class MeetupRepository extends \Doctrine\ORM\EntityRepository{

    public function add($meetup)
    {
        $this->getEntityManager()->persist($meetup);
        $this->getEntityManager()->flush($meetup);
    }
    public function createMeetup(string $title, string $description = '', string $datedeb, string $datefin)
    {
        return new Meetup($title, $description, $datedeb, $datefin);
    }
}