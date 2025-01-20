<?php

namespace App\Tests;

use App\Twig\Components\EventForm;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\LiveComponent\Test\InteractsWithLiveComponents;

class EventFormCreationTest extends KernelTestCase
{
    use InteractsWithLiveComponents;

    public function testSuccessfulSubmitForm(): void
    {
        $component = $this->createLiveComponent(EventForm::class);

        $component->submitForm(['event_creation' => [
            'name' => "Event name",
            'participants' => [
                [
                    'name' => 'participant_1',
                    'email' => 'participant_1@email.com'
                ],
                [
                    'email' => 'participant_2@email.com',
                    'name' => 'participant_2',
                ],
            ]
        ]], 'save');

        // Non-reproduced assertions linked to the storage in DB
    }
}

