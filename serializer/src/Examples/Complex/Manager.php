<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

use Symfony\Component\Serializer\Annotation;

class Manager
{
    #[Annotation\Ignore]
    protected ?int $id;

    #[Annotation\Ignore]
    private Company $company;

    public function __construct(
        private ?string $inn,
        private ?string $surname,
        private string $name,
        private ?string $patronymic,
        private ?string $gender,
        private ?string $post,
        private string $type
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function setInn(?string $inn): void
    {
        $this->inn = $inn;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    public function setPatronymic(?string $patronymic): void
    {
        $this->patronymic = $patronymic;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    public function getPost(): string
    {
        return $this->post;
    }

    public function setPost(?string $post): void
    {
        $this->post = $post;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): Manager
    {
        $this->company = $company;
        return $this;
    }
}
