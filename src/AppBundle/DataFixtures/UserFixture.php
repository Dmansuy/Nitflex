<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 23/02/18
 * Time: 15:47
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user
            ->setFirstName('Jean-michel')
            ->setLastName('Paumé')
            ->setEmail('paume.jm@gmail.com')
            ->setBirthday(new \DateTime('1992-01-02'))
            ->setPassword('$2y$10$wScYUif9xmBn8.ZdeuLkoOxKjaIpKjUvQAIZPPNHqpncuvcClclMu')
            ;
        $manager->persist($user);
        $manager->flush();
    }
}