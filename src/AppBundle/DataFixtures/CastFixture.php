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
                'firstName' => 'Dwayne', 'lastName' => 'Johnson', 'nickName' => 'The rock'
            ], [
                'firstName' => 'Patate', 'lastName' => 'Mexico', 'nickName' => 'Patato'
            ], [
                'firstName' => 'Chris', 'lastName' => 'Damarelli', 'nickName' => 'Chrisy'
            ], [
                'firstName' => 'Charles', 'lastName' => 'Roos', 'nickName' => 'Lololo'
            ], [
                'firstName' => 'Larry', 'lastName' => 'Naw', 'nickName' => 'The man'
            ], [
                'firstName' => 'Clause', 'lastName' => 'Done', 'nickName' => 'Boog Boog'
            ], [
                'firstName' => 'Jack', 'lastName' => 'Ban', 'nickName' => 'Pretty Guy'
            ]
        ];

        $i = 1;
        foreach ($castName as $value) {
            $cast = new Cast();
            $cast
                ->setFirstName($value{'firstName'})
                ->setLastName($value{'lastName'})
                ->setNickname($value{'nickName'});
            $manager->persist($cast);

            $this->addReference('cast_' . $i, $cast);
            $i++;
        }
        $manager->flush();
    }
}