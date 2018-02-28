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
        $studioName = [
            [
                'studio' => 'Exotic Beetle Productions'
            ], [
                'studio' => 'Ice Crown Films'
            ], [
                'studio' => 'Romance'
            ], [
                'studio' => 'Fantasy System Productions'
            ], [
                'studio' => 'Primal Enigma Entertainment'
            ], [
                'studio' => 'Firetopia Film Studios'
            ], [
                'studio' => 'Lunarsoft Film Productions'
            ]
        ];
        $i = 1;
        foreach ($studioName as $value) {
            $studio = new Studio();
            $studio
                ->setName($value{'studio'});
            $manager->persist($studio);

            $this->addReference('studio_' . $i, $studio);
            $i++;
        }
        $manager->flush();
    }
}