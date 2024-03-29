<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: 'App\Repository\TaskRepository')]
#[ORM\Table(name: 'task')]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id;
    #[ORM\Column(type: 'string')]
    private ?string $title;

    #[ORM\ManyToOne(targetEntity: Employee::class, inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employee $employee;

    #[ORM\OneToOne(targetEntity: Priority::class)]
    private ?Priority $priority;
    #[ORM\Column(type: 'string', unique: true)]
    private ?string $code;
    #[ORM\Column(type: 'time', nullable: true)]
    private ?\DateTimeInterface $estimatedTime;
    #[ORM\Column(type: 'text')]
    private ?string $details;
    #[ORM\ManyToMany(targetEntity: Label::class, mappedBy: 'tasks')]
    private ?Collection $labels;

    public function __construct()
    {
        $this->labels = new ArrayCollection();
    }


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

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): Task
    {
        $this->employee = $employee;
        return $this;
    }

    public function getPriority(): ?Priority
    {
        return $this->priority;
    }

    public function setPriority(?Priority $priority): Task
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

    /**
     * @return Collection<int, Label>
     */
    public function getLabels(): Collection
    {
        return $this->labels;
    }

    public function addLabel(Label $label): Task
    {
        if (!$this->getLabels()->contains($label)) {
            $this->getLabels()->add($label);
            $label->addTask($this);
        }
        return $this;
    }

    public function removeLabel(Label $label): Task
    {
        if ($this->getLabels()->contains($label)) {
            $this->getLabels()->remove($label);
            $label->removeTask($this);
        }
        return $this;
    }

}