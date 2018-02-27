<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 23/02/18
 * Time: 15:26
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Cast;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CastFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws
     */
    public function load(ObjectManager $manager)
    {
        $castName = [
            [
                'firstName' => 'Dwayne', 'lastName' => 'Johnson', 'NickName' => 'The rock', 'film' => '1'
            ], [
                'firstName' => 'Patate', 'lastName' => 'Mexico', 'NickName' => 'Patato', 'film' => '2'
            ]
        ];

        foreach ($castName as $value) {
            $cast = new Cast();
            $cast
                ->setFirstName($value{'firstName'})
                ->setLastName($value{'lastName'})
                ->setNickname($value{'NickName'})
                ->setFilms($this->getReference($value{'film'}));
            $manager->persist($cast);

            $this->addReference($value{'film'}, $cast);
        }
        $manager->flush();

    }
}