<?php

namespace App\Twig\Components;

use App\Entity\DTO\EventCreation;
use App\Form\EventCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;

#[AsLiveComponent]
final class EventForm extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    #[LiveProp]
    public ?EventCreation $formData = null;

    /**
     * @return FormInterface<EventCreation>
     */
    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(EventCreationType::class, $this->formData ?? new EventCreation());
    }

    #[LiveAction]
    public function save(MessageBusInterface $bus): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        // debug to see the content that is being fed to the submitForm below
        dd($this->formValues);

        // it no dd above, this fails during the testing in the EventFormCreationTest.php due to the missing data at the participants level
        $this->submitForm();
    }
}

