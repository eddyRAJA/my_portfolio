<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Techno;
use App\Entity\AboutMe;
use App\Entity\Contact;
use App\Entity\Project;
use App\Entity\Timeline;
use App\Entity\Illustration;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // $product = new Product();

        // AboutMe
/*        $aboutme = new AboutMe();
        $aboutme->setTitle($faker->sentence(3))
            ->setEmail($faker->email())
            ->setGithubLink($faker->email())
            ->setFunction($faker->jobTitle())
            ->setAvatar($faker->imageUrl($width = 64, $height = 48) )
            ->setDescription($faker->paragraph(4));

        $manager->persist($aboutme);

*/        // Timeline
        for ($i=0; $i < 5; $i++) { 
            $timeline = new Timeline();
            $timeline->setYear($faker->numberBetween(1990, 2022))
                ->setDescription($faker->paragraph(4));

            $manager->persist($timeline);
        }   

        // Contact
        for ($i=0; $i < 11; $i++) { 
            $contact = new contact();
            $contact->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setEmail($faker->freeEmail())
                ->setMessage($faker->paragraph(5));

            $manager->persist($contact);
        }

        // Illustration
        for ($i=0; $i < 16; $i++) { 
            $illustration = new Illustration;
            $illustration->setImage($faker->imageUrl(640, 480, 'animals', true));

        $manager->persist($illustration);
        }

        // Techno
        for ($i=0; $i < 8; $i++) { 
            $techno = new Techno();
            $techno->setName($faker->sentence(1));

        $manager->persist($techno);
        }

        // Project
        for ($i=0; $i < 8; $i++) { 
            $project = new Project();
            $project->setTitle($faker->sentence(5))
                ->setPitch($faker->paragraph(1))
                ->setDescription($faker->paragraph(6))
                ->setGithubLink($faker->companyEmail())
                ->setWebsite($faker->companyEmail());

            $manager->persist($project);
        }


        // $manager->persist($product);

        $manager->flush();
    }
}
