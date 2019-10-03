<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Owner;
use     Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $author1 = new Author();
        $author1->setFirstname('Bernard');
        $author1->setLastname('Werber');

        $owner1 = new Owner();
        $owner1->setFirstname('Julie');
        $owner1->setLastname('Alary');

        $book1 = new Book();
        $book1->setTitle('Demain les chats');
        $book1->setAuthor($author1);
        $book1->setOwner($owner1);
        $book1->setPurchasedDate(new \DateTime());
        $manager->persist($book1);
        $manager->flush();
    }
}
