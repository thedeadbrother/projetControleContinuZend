<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Meetup;
use Doctrine\ORM\EntityRepository;
use Zend\Http\PhpEnvironment\Request;
use Application\Form\MeetupForm;

class IndexController extends AbstractActionController
{
    /**
     * Entity manager.
     * @var \Doctrine\ORM\EntityRepository
     */
    private $meetupRepository;

    /**
     * @var MeetupForm
     */
    private $meetupForm;

    public function __construct(EntityRepository $meetupRepository, MeetupForm $MeetupForm)
    {
        $this->meetupRepository = $meetupRepository;
        $this->meetupForm = $MeetupForm;
    }
    public function indexAction()
    {
        $meetup = $this->meetupRepository->findAll();
        // Render the view template
        return new ViewModel([
            'meetups' => $meetup
        ]);
    }

    public function addAction()
    {
        $form = $this->meetupForm;
        /* @var $request Request */
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $meetup = $this->meetupRepository->createMeetup(
                    $form->getData()['id'] ?? '',
                    $form->getData()['titre'],
                    $form->getData()['description'] ?? '',
                    $form->getData()['datedeb'] ?? '',
                    $form->getData()['datefin'] ?? ''
                );
                $this->meetupRepository->add($meetup);
                return $this->redirect()->toRoute('');
            }
        }
        $form->prepare();
        return new ViewModel([
            'form' => $form,
        ]);
    }
}
