<?php
namespace Application\Controller;
use Application\Form\MeetupForm;
use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Application\Entity\Meetup;
/**
 * This is the factory for IndexController. Its purpose is to instantiate the
 * controller.
 */
class IndexControllerFactory
{
    public function __invoke(ContainerInterface $container) : IndexController
    {
        $meetups = $container->get(EntityManager::class)->getRepository(Meetup::class);
        $filmForm = $container->get(MeetupForm::class);
        // Instantiate the controller and inject dependencies
        return new IndexController($meetups, $filmForm);
    }
}