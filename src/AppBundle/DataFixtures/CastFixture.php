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
    public function load(ObjectManager $manager)
    {
        $cast = new Cast();
        $cast
            ->setFirstName('Dwayne')
            ->setLastName('Johnson')
            ->setNickname('The rock')
            ;
    }
}