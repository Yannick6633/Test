<?php

namespace App\Entity;

//use App\Repository\CreditCardRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CreditCardRepository::class)
 */
class CreditCard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $cardNumber;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cardIdentifier;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $status;

    /**
     * @ORM\Column(type="date")
     */
    private $validated;

    /**
     * @ORM\OneToOne(targetEntity=BankAccount::class, mappedBy="creditCard", cascade={"persist", "remove"})
     */
    private $bankAccount;

    public function __toString(): string
    {
        return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCardNumber(): ?int
    {
        return $this->cardNumber;
    }

    public function setCardNumber(int $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function getCardIdentifier(): ?int
    {
        return $this->cardIdentifier;
    }

    public function setCardIdentifier(int $cardIdentifier): self
    {
        $this->cardIdentifier = $cardIdentifier;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getValidated(): ?\DateTimeInterface
    {
        return $this->validated;
    }

    public function setValidated(\DateTimeInterface $validated): self
    {
        $this->validated = $validated;

        return $this;
    }

    public function getBankAccount(): ?BankAccount
    {
        return $this->bankAccount;
    }

    public function setBankAccount(BankAccount $bankAccount): self
    {
        $this->bankAccount = $bankAccount;

        // set the owning side of the relation if necessary
        if ($bankAccount->getCreditCard() !== $this) {
            $bankAccount->setCreditCard($this);
        }

        return $this;
    }
}
