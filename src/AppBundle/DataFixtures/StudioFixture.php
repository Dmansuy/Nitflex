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
        $studio = new Studio();
        $studio
            ->setName('Warner Bros')
            ;
    }
}