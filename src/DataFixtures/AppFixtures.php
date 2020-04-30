<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\SuperAdmin;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Extension\Core\Type\DateTimeType;

class AppFixtures extends Fixture
{
  private  $encoder ;
  public function  __construct(UserPasswordEncoderInterface $encoder )
  {
      $this->encoder =  $encoder;
  }


      public function load(ObjectManager $manager)
      {

        $admin_repo=$manager->getRepository( SuperAdmin::class);
        $admin=$admin_repo->findOneBy(['roles'=>'ROLE_SUPER_ADMIN']);
       if(!$admin){

          $Admin = new  SuperAdmin();
          $Admin->setUsername("admin1")
                 ->setEmail("admin1@admin.com");
         $passe=  $this->encoder->encodePassword($Admin, "123_pass");
         $Admin ->setPassword($passe)
                ->setRoles(['ROLE_SUPER_ADMIN']);
           $Admin ->setDateOfB(\DateTime::createFromFormat('Y-m-d', "1999-09-09"));
           $Admin ->setName("admin");
           $Admin ->setFirstName("admin");
           $Admin ->setIdentityCard("12828058");
           $Admin ->setCreatedAt(new \DateTime('now'));
           $Admin->setPhoneNumber("22842632");
           $Admin->setAddress("route4040 sousse");
           $manager->persist($Admin);
                   }
           $manager->flush();
       }
     
      
 
 }
 