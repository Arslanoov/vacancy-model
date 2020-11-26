<?php

declare(strict_types=1);

namespace Domain\Model\Vacancy;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="vacancy_vacancies")
 */
final class Vacancy
{
    /**
     * @var Id
     * @ORM\Id()
     * @ORM\Column(type="vacancy_vacancy_id")
     */
    private Id $id;
    /**
     * @var Name
     * @ORM\Column(type="vacancy_vacancy_name", length=16)
     */
    private Name $name;
    /**
     * @var Description|null
     * @ORM\Column(type="vacancy_vacancy_description", length=255, nullable=true)
     */
    private ?Description $description;
    /**
     * @var Image|null
     * @ORM\Column(type="vacancy_vacancy_image", length=255, nullable=true)
     */
    private ?Image $image;

    public function __construct(Id $id, Name $name, ?Description $description = null, Image $image = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }

    public static function new(Name $name, ?Description $description = null, Image $image = null): self
    {
        return new self(Id::asUuid4(), $name, $description, $image);
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getDescription(): ?Description
    {
        return $this->description;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }
}
