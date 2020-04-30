<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SuperAdminRepository")
 */
class SuperAdmin extends Admin 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
     
    

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];


    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_SUPERADMIN
        $roles[] = 'ROLE_SUPERADMIN';

        return array_unique($roles);
    }

   
}
