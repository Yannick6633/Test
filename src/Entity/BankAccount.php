<?php

namespace App\Entity;

use App\Repository\BankAccountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BankAccountRepository::class)
 */
class BankAccount
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=27)
     */
    private $iban;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $bic;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $accountIdentifier;

    /**
     * @ORM\Column(type="float")
     */
    private $balance;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bankAccount")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=CreditCard::class, inversedBy="bankAccount", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $creditCard;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getBic(): ?string
    {
        return $this->bic;
    }

    public function setBic(string $bic): self
    {
        $this->bic = $bic;

        return $this;
    }

    public function getAccountIdentifier(): ?string
    {
        return $this->accountIdentifier;
    }

    public function setAccountIdentifier(string $accountIdentifier): self
    {
        $this->accountIdentifier = $accountIdentifier;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): self
    {
        $this->balance = $balance;

        return $this;
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

    public function getCreditCard(): ?CreditCard
    {
        return $this->creditCard;
    }

    public function setCreditCard(CreditCard $creditCard): self
    {
        $this->creditCard = $creditCard;

        return $this;
    }

   
}
