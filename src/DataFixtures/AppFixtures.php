<?php

namespace App\DataFixtures;

use App\Entity\Bibliotheque;
use App\Entity\Exercice;
use App\Entity\FAQ;
use App\Entity\Kine;
use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Boolean;
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
        $hash = $this->passwordHasher->hashPassword($xava, "xava");
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
        
        $biblio1= new Bibliotheque();
        $biblio1->setNom("ramper");
        $biblio1->setLien("ramper");
        $biblio1->setType("ramper");
        $manager->persist($biblio1);

        
        $biblio2= new Bibliotheque();
        $biblio2->setNom("Quatre pattes");
        $biblio2->setLien("abdos");
        $biblio2->setType("abdos");
        $manager->persist($biblio2);

      

        $exercice1= new Exercice();
        $exercice1->setDescription("Exercice clé dans l'acquisition de la dissociation, nous aide à maintenir le bassin libre de mouvement, basique pour un bonne formation des pieds de l'enfant, et très important pour favoriser la connexion entre les deux hémisphères cérébraux et le développement des relations interpersonnelles. Il a été observé que de nombreux enfants diagnostiqués avec des troubles du comportement ne savent pas comment faire pour ramper ou le faire en dissociation.

        Positionnement : On se met sur le ventre, sans chaussettes, tête regardant à gauche, main gauche plate au sol à hauteur du nez, main droite plate au sol au-dessus de notre tête. Jambe gauche avec flexion de la hanche, genou et pied. Le genou gauche touche presque le coude gauche. Très important : pied gauche (sans chaussettes !) en essayant que tous les orteils touchent au sol. La jambe droite reste détendue à côté. Maintenant on est prêt pour donner l'impulsion. On pousse fort avec les orteils du pied gauche et aussi avec le bras droit pour avancer ! Le modèle est inversé afin de refaire le processus de l’autre côté. Si l’enfant n'est pas capable de le faire tout seul, nous pouvons l'aider à  bien placer ses orteils et l'aider à faire l'impulsion à partir du pied.
        ");
        $exercice1->setDuree(5);
        $exercice1->setRepetition(1);
        $exercice1->setType("genoux");
        $exercice1->setExperience(10);
        $exercice1->setBibliotheque($biblio1);
        $manager->persist($exercice1);

        
        $manager->flush();


       
        
    }
}
