<?php


namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArtistsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création de quelques instances d'Artist avec des données de test
        $artistsData = [
            ['name' => 'Artist A'],
            ['name' => 'Artist B'],
            ['name' => 'Artist C'],
            // ... Ajoutez autant de données de test que nécessaire
        ];

        foreach ($artistsData as $data) {
            $artist = new Artist();
            $artist->setName($data['name']);

            $manager->persist($artist);
            $this->addReference('artist_' . str_replace(' ', '_', strtolower($data['name'])), $artist);
        }

        $manager->flush();
    }
    public function getOrder()
    {
        // Spécifiez l'ordre d'exécution de cette fixture
        return 1;
    }
}
