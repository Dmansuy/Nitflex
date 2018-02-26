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
            ->setTitle('Blanche neige et le chasseur')
            ->setYear(new \DateTime('2000-02-02'))
            ->setDescription('Dans des temps immémoriaux où la magie, les fées et les nains étaient monnaie courante, naquit un jour l’unique enfant d’un bon roi et de son épouse chérie')
            ->setCategory($this->getReference(1))
            ->setAffiche('http://fr.web.img6.acsta.net/medias/nmedia/18/85/34/52/20089538.jpg')
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