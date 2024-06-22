<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Books;
use App\Entity\Critic;
use App\Entity\Medium;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    private const NB_ARTICLES = 33;

    private const MEDIUM= ["Roman", "BD", "Essai", "Sciences", "Jeunesse"];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $mediums = [];

        foreach (self::MEDIUM as $mediumName) {
            $medium = new Medium();
            $medium->setName($mediumName);

            $manager->persist($medium);
            $mediums[] = $medium;
    }

    for ($i = 0; $i < self::NB_ARTICLES; $i++) {
        $book = new Books();
        $book
            ->setTitle($faker->words($faker->numberBetween(4, 7), true))
            ->setAuthor($faker->name)
            ->setPublisher($faker->words($faker->numberBetween(1, 4), true))
            ->setDateOfFirstPublish(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('- 700 years')))
            ->setISBN($faker->isbn13)
            ->setSerial($faker->words($faker->numberBetween(0,2), true))
            ->setCover($faker->imageUrl)
            ->setNbrOfPages($faker->numberBetween(80, 2500))
            ->setMedium($faker->randomElement($mediums));

        $manager->persist($book);
    }

    for ($i = 0; $i <10; $i++) {
        $user = new User();
        $user
->setEmail($faker->email())
->setRoles(['ROLE_USER'])
->setPassword('azerty')
->setAlias($faker->name($faker->numberBetween(1,5), true))
->setDateOfCreation(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 month')))
->setDateOfLastConnect(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 day')))
->setAvatar($faker->imageUrl)
->setBanned($faker->boolean(12));
        
$manager->persist($user);

}

for ($i = 0; $i <10; $i++) {
    $critic = new Critic();
    $critic
->setTitle($faker->words($faker->numberBetween(2, 5), true))
->setContent($faker->sentence($faker->numberBetween(2,5), true))
->setDateOfCreation(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-2 months')))
->setDateOfLastUpdate(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-1 week')));
 
$manager->persist($user);
}
$manager->flush();
}
}