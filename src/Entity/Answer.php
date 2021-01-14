<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity=ResultsGame::class, mappedBy="answer")
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
            $resultsGame->setAnswer($this);
        }

        return $this;
    }

    public function removeResultsGame(ResultsGame $resultsGame): self
    {
        if ($this->resultsGames->removeElement($resultsGame)) {
            // set the owning side to null (unless already changed)
            if ($resultsGame->getAnswer() === $this) {
                $resultsGame->setAnswer(null);
            }
        }

        return $this;
    }
}
