<?php
declare(strict_types=1);
namespace Application\Form;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\StringLength;
class MeetupForm extends Form implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('Meetup');
        $this->add([
            'type' => Element\Text::class,
            'name' => 'titre',
            'options' => [
                'label' => 'Titre',
            ],
        ]);
        $this->add([
            'type' => Element\Textarea::class,
            'name' => 'description',
            'options' => [
                'label' => 'Description',
        ],
        ]);
        $this->add([
            'type' => Element\Date::class,
            'name' => 'datedeb',
            'options' => [
                'label' => 'Date debut',
            ],
        ]);
        $this->add([
            'type' => Element\Date::class,
            'name' => 'datefin',
            'options' => [
                'label' => 'Date de fin',
            ],
        ]);
        $this->add([
            'type' => Element\Submit::class,
            'name' => 'submit',
            'attributes' => [
                'value' => 'Submit',
            ],
        ]);
    }
    public function getInputFilterSpecification()
    {
        return [
            'titre' => [
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => 30,
                        ],
                    ],
                ],
            ],
            'description' => [
                'validators' => [
                    [
                        'name' => StringLength::class,
                        'options' => [
                            'min' => 5,
                            'max' => 50,
                        ],
                    ],
                ],
            ],
        ];
    }
}