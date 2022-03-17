<?php

namespace App\DataFixtures;

use App\Entity\Kine;
use App\Entity\Patient;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->passwordHasher = $userPasswordHasherInterface;
    }
   
    public function load(ObjectManager $manager): void
    {
        
       $tete = new Patient();
       $tete->setAge(10);
       $tete->setNom("Clacla");
       $tete->setPrenom("Blabla");
       $tete->setAdresse("25 rue de la fracture de la tête"); 
       $tete->setEmail("tete@tete.fr");
       $tete->setPhoto("oki.jpg");
       $tete->setLangue("Français");
       $tete->setLuminosite(true);
       $tete->setNotification(true);
       $tete->setDescription("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam voluptatibus accusamus beatae facere voluptate amet. Hic perspiciatis consequatur neque quod quam ut rerum esse? Animi."); 
       $tete->setNiveau(1); 
       $tete->setExperience(2); 
       $hash = $this->passwordHasher->hashPassword($tete,"tete");
       $tete->setPassword($hash); 
       $manager -> persist($tete); 
       
        $toto = new Kine();
        $toto->setNom("Big");
        $toto->setPrenom("Kine");
        $toto->setAdresse("12 rue de la jambe");
        $toto->setEmail("toto@toto.fr");
        $toto->setPhoto("ok.jpg");
        $hash = $this->passwordHasher->hashPassword($toto,"toto");
        $toto->setPassword($hash);
        $manager->persist($toto);


        $tata = new User();
        $tata->setNom("Tata");
        $tata->setPrenom("Clacla");
        $tata->setAdresse("12 rue de la gourde");
        $tata->setEmail("tata@tata.fr");
        $tata->setPhoto("ok.jpg");
        $hash = $this->passwordHasher->hashPassword($tata,"tata");
        $tata->setPassword($hash);
        $manager->persist($tata);



       $manager->flush();
    }
}
