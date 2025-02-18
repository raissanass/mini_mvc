<?php
namespace App\Entity;

class Article
{
    private ?int $id;
    private string $title;
    private string $description;

    public function __construct(?int $id, string $title, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    public static function createAndHydrate(array $data): self
    {
        return new self(
            $data['id'] ?? null,
            $data['title'],
            $data['description']
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
