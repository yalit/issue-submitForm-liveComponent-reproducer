<?php

namespace App\Entity\DTO;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class EventParticipantInput
{
    #[NotNull]
    #[NotBlank]
    public ?string $name = null;

    #[NotNull]
    #[NotBlank]
    #[Email]
    public ?string $email = null;
}

