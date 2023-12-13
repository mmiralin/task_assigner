<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'task')]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id;
    #[ORM\Column(type: 'string')]
    private ?string $title;
    #[ORM\Column(type: 'string')]
    private ?string $employee;
    #[ORM\Column(type: 'integer')]
    private ?int $priority;
    #[ORM\Column(type: 'string', unique: true)]
    private ?string $code;
    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $estimatedTime;
    #[ORM\Column(type: 'text')]
    private ?string $details;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): Task
    {
        $this->title = $title;
        return $this;
    }

    public function getEmployee(): ?string
    {
        return $this->employee;
    }

    public function setEmployee(?string $employee): Task
    {
        $this->employee = $employee;
        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(?int $priority): Task
    {
        $this->priority = $priority;
        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): Task
    {
        $this->code = $code;
        return $this;
    }

    public function getEstimatedTime(): ?\DateTimeInterface
    {
        return $this->estimatedTime;
    }

    public function setEstimatedTime(?\DateTimeInterface $estimatedTime): Task
    {
        $this->estimatedTime = $estimatedTime;
        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): Task
    {
        $this->details = $details;
        return $this;
    }

}