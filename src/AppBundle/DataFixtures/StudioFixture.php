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
    public function load(ObjectManager $manager)
    {
        $studioName = ['Exotic Beetle Productions', 'Ice Crown Films', 'Romance', 'Fantasy System Productions',
            'Primal Enigma Entertainment', 'Firetopia Film Studios', 'Lunarsoft Film Productions'];

        foreach ($studioName as $value) {
            $studio = new Studio();
            $studio
                ->setName($value);
            $manager->persist($studio);
            $manager->flush();
        }
    }
}