<?php

namespace App\Entity;

use App\Repository\ProviderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProviderRepository::class)
 */
class Provider
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $contact_phone;

    /**
     * @ORM\Column(type="bigint", length=255)
     */
    private $provider_type_id;

    /**
     * @ORM\Column(type="boolean", length=255)
     */
    private $active;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $created_at;

    /**
     * @ORM\Column(type="date", length=255)
     */
    private $updated_at;

    // /**
    //  * @ORM\ManyToOne(targetEntity="App\Entity\ProviderType", inversedBy="providers")
    //  * @ORM\JoinColumn(nullable=false)
    //  */
    // private $providerType;


    // public function getProviderType(): ?ProviderType
    // {
    //     return $this->providerType;
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getContactPhone(): ?string
    {
        return $this->contact_phone;
    }

    public function getProviderTypeId(): ?string
    {
        return $this->provider_type_id;
    }

    public function getActive(): ?string
    {
        return $this->active;
    }

    public function getprovider_type_id(): ?string
    {
        return $this->provider_type_id;
    }

    public function getcreatedAt()
    {
        return $this->created_at;
    }

    public function getupdatedAt()
    {
        return $this->updated_at;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    public function setContactPhone(string $contact_phone): self
    {
        $this->contact_phone = $contact_phone;

        return $this;
    }

    public function setActive($active): self
    {
        $this->active = $active;

        return $this;
    }

    public function setProviderTypeId($providerTypeId): self
    {
        
        $this->provider_type_id = $providerTypeId;

        return $this;
    }

    
    public function setCreatedAt(): self
    {
        $this->created_at = new \DateTime('@'.strtotime('now'));

        return $this;
    }

    public function setUpdatedAt(): self
    {
        $this->updated_at = new \DateTime('@'.strtotime('now'));

        return $this;
    }

     

}
