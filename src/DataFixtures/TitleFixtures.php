<?php

// src/DataFixtures/TitleFixtures.php

// src/DataFixtures/TitleFixtures.php

// src/DataFixtures/TitleFixtures.php

namespace App\DataFixtures;

use App\Entity\Title;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TitleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Obtenez les références d'artistes
        $artistA = $this->getReference('artist_artist_a');
        $artistB = $this->getReference('artist_artist_b');
        $artistC = $this->getReference('artist_artist_c');

        // Création de quelques instances de Title avec des données de test
        $titlesData = [
            ['title' => 'Song 1', 'artist' => $artistA, 'tags' => 'Tag1, Tag2'],
            ['title' => 'Song 2', 'artist' => $artistB, 'tags' => 'Tag3, Tag4'],
            ['title' => 'Song 3', 'artist' => $artistC, 'tags' => 'Tag5, Tag6'],
            // ... Ajoutez autant de données de test que nécessaire
        ];

        foreach ($titlesData as $data) {
            $title = new Title();
            $title->setTitle($data['title']);
            $title->setArtist($data['artist']);
            $title->setTags($data['tags']);

            $manager->persist($title);
        }

        $manager->flush();
    }
    public function getOrder()
    {
        // Spécifiez l'ordre d'exécution de cette fixture
        return 2;
    }
}
