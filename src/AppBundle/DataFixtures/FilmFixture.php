<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 23/02/18
 * Time: 14:06
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;



class FilmFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $film = new Film();
        $film
            ->setTitle('Le seigneur des anneaux')
            ->setYear(new \DateTime('2000-02-02'))
            ->setDescription('Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.')
            ->setCategory($this->getReference(1))
            ->setAffiche('8370ecf72ae726258ec40634d778e091.jpeg')
        ;
        $manager->persist($film);
        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    function getDependencies()
    {
        return array(
            CategoryFixture::class,
        );
    }
}