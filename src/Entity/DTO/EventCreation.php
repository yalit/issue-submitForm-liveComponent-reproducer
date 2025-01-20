<?php

namespace App\Entity\DTO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints\Valid;

class EventCreation
{
    public ?string $name = null;

    #[Valid]
    public Collection $participants;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
    }

    public function addParticipant(EventParticipantInput $participant): void
    {
        if (!$this->participants->contains($participant)) {
            $this->participants->add($participant);
        }
    }

    public function removeParticipant(EventParticipantInput $participant): void
    {
        if ($this->participants->contains($participant)) {
            $this->participants->remove($participant);
        }
    }
}
