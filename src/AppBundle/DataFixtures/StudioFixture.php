<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 23/02/18
 * Time: 16:00
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Studio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StudioFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws
     */
    public function load(ObjectManager $manager)
    {
        $studioName =
            [
                [
                    'studio' => 'Exotic Beetle Productions', 'film' => 'film_3'
                ], [
                'studio' => 'Ice Crown Films', 'film' => 'film_9'
            ], [
                'studio' => 'Romance', 'film' => 'film_1'
            ], [
                'studio' => 'Fantasy System Productions', 'film' => 'film_7'
            ], [
                'studio' => 'Primal Enigma Entertainment', 'film' => 'film_6'
            ], [
                'studio' => 'Firetopia Film Studios', 'film' => 'film_5'
            ], [
                'studio' => 'Lunarsoft Film Productions', 'film' => 'film_4'
            ]
            ];

        foreach ($studioName as $value) {
            for ($i = 1; $i < 7; $i++) {
                $studio = new Studio();
                $studio
                    ->setName($value{'studio'})
                    ->setFilms($this->getReference($value{'film'}));
                $manager->persist($studio);

                $this->addReference($value{'studio_' . $i}, $studio);
            }
        }
        $manager->flush();
    }
}