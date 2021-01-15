<?php

namespace App\Entity;

use App\Repository\ResultsGameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultsGameRepository::class)
 */
class ResultsGame
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="resultsGames")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="resultsGames")
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity=Answer::class, inversedBy="resultsGames")
     */
    private $answer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getAnswer(): ?Answer
    {
        return $this->answer;
    }

    public function setAnswer(?Answer $answer): self
    {
        $this->answer = $answer;

        return $this;
    }
}
