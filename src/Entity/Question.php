<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=ResultsGame::class, mappedBy="question")
     */
    private $resultsGames;

    public function __construct()
    {
        $this->resultsGames = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|ResultsGame[]
     */
    public function getResultsGames(): Collection
    {
        return $this->resultsGames;
    }

    public function addResultsGame(ResultsGame $resultsGame): self
    {
        if (!$this->resultsGames->contains($resultsGame)) {
            $this->resultsGames[] = $resultsGame;
            $resultsGame->setQuestion($this);
        }

        return $this;
    }

    public function removeResultsGame(ResultsGame $resultsGame): self
    {
        if ($this->resultsGames->removeElement($resultsGame)) {
            // set the owning side to null (unless already changed)
            if ($resultsGame->getQuestion() === $this) {
                $resultsGame->setQuestion(null);
            }
        }

        return $this;
    }
}
