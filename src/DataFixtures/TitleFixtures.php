<?php

namespace App\DataFixtures;

use App\Entity\Title;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TitleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $titlesData = [
            ['title' => 'Song 1', 'artist' => 'Artist 1', 'tags' => 'Tag1, Tag2'],
            ['title' => 'Song 2', 'artist' => 'Artist 2', 'tags' => 'Tag3, Tag4'],
            ['title' => 'Song 3', 'artist' => 'Artist 3', 'tags' => 'Tag5, Tag6'],

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
}
