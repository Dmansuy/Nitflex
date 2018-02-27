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
                    'studio' => 'Exotic Beetle Productions', 'film' => ''
                ], [
                'studio' => 'Ice Crown Films', 'film' => ''
            ], [
                'studio' => 'Romance', 'film' => ''
            ], [
                'studio' => 'Fantasy System Productions', 'film' => ''
            ], [
                'studio' => 'Primal Enigma Entertainment', 'film' => ''
            ], [
                'studio' => 'Firetopia Film Studios', 'film' => ''
            ], [
                'studio' => 'Lunarsoft Film Productions', 'film' => ''
            ]
            ];

        foreach ($studioName as $value) {
            $studio = new Studio();
            $studio
                ->setName($value{'studio'})
                ->setFilms($this->getReference($value{'film'}));
            $manager->persist($studio);

            $this->addReference($value{'film'}, $studio);
        }
        $manager->flush();

    }
}