<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeacherRepository")
 */
class Teacher extends User
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
  
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_Teacher
        $roles[] = 'ROLE_TEACHER';

        return array_unique($roles);
    }
}
