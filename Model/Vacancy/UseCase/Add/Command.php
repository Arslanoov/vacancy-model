<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy\UseCase\Add;

use Symfony\Component\Validator\Constraints as Assert;

final class Command
{
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="16")
     */
    public string $name;
    /**
     * @var string|null
     * @Assert\Length(max="255")
     */
    public ?string $description;
    /**
     * @var string|null
     * @Assert\Length(max="255")
     */
    public ?string $image;

    public function __construct(string $name, ?string $description, ?string $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }
}
