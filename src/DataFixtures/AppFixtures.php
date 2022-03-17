<?php

namespace App\DataFixtures;

use App\Entity\FAQ;
use App\Entity\Kine;
use App\Entity\Patient;
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
    
            $xava = new Patient();
            $xava->setNom("Xava");
            $xava->setPrenom("Xava");
            $xava->setAdresse("Ciel");
            $xava->setEmail("xava@dieu.fr");
            $hash = $this->passwordHasher->hashPassword($xava, "toto");
            $xava->setPassword($hash);
            $xava->setPhoto("xava.png");
            $xava->setAge(34);
            $xava->setLangue("Français");
            $xava->setLuminosite(True);
            $xava->setNotification(True);
            $xava->setAccessibilite(True);
            $xava->setNiveau(22);
            $xava->setDescription("Content");
            $xava->setExperience(22);
            $manager->persist($xava);

            $kine = new Kine();
            $kine->setNom("Wiiz");
            $kine->setPrenom("Marin");
            $kine->setAdresse("Wiiz");
            $kine->setEmail("marin@wiiz.fr");
            $hash = $this->passwordHasher->hashPassword($kine, "marin");
            $kine->setPassword($hash);
            $kine->setPhoto("marin.png");
            $manager->persist($kine);

            $question = new FAQ();
            $question->setQuestion("Ca va ?");
            $question->setReponse("Neutre");
            $manager->persist($question);
        $manager->flush();
    }
}