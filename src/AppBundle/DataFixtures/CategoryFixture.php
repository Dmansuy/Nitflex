<?php
/**
 * Created by PhpStorm.
 * User: florian
 * Date: 23/02/18
 * Time: 15:29
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws
     */
    public function load(ObjectManager $manager)
    {
        $genre = ['Action', 'Drama', 'Romance', 'Horreur', 'Comédie'];
        $i = 1;
        foreach ($genre as $value) {
            $category = new Category();
            $category
                ->setNameCategory($value);
            $manager->persist($category);

            $this->addReference('category-' . $i, $category);
            $i++;
        }
        $manager->flush();
    }

}