<?php

namespace App\DataFixtures;

use App\Entity\Projets;
use App\Entity\Competences;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $projet = new Projets();
        $projet ->setNom("Cadex");
        $projet->setLien("");
        $projet->setDescription("");
        $manager->persist($projet);

        $skill = new Competences();
        $skill->setNom('HTML');
        $skill->setType("Langage");
        $manager->persist($skill);


        $manager->flush();
    }
}
