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
            ->setPassword('$2y$10$wScYUif9xmBn8.ZdeuLkoOxKjaIpKjUvQAIZPPNHqpncuvcClclMu');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Chloe')
            ->setLastName('Porter')
            ->setEmail('chloe.porter37@example.com')
            ->setBirthday(new \DateTime('1978-03-07'))
            ->setPassword('$2y$10$iiif87n2qwR5UWTztpi/YOfsUChyR5ym5fmxVOhVYmRnL0dxOuH6u');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Leonard')
            ->setLastName('Lane')
            ->setEmail('leonard.lane84@example.com')
            ->setBirthday(new \DateTime('1992-01-02'))
            //password 'lana"
            ->setPassword('$2y$10$tpUWNmjzG86w7dv4jhJVKuIXLe5HFuTTJyAgb3jXwTSXXd5uarirq');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Allison ')
            ->setLastName('Stevens')
            ->setEmail('allison.stevens55@example.com')
            ->setBirthday(new \DateTime('1983-04-03'))
            // pass : friends
            ->setPassword('$2y$10$U6rLQ6zsSMR6dgOZZGZcqugT0QaLw071xNPD0so5zsC68UGvONT9C');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Peggy')
            ->setLastName('Clark')
            ->setEmail('peggy.clark55@example.com')
            ->setBirthday(new \DateTime('1977-03-09'))
            //pass : donna1
            ->setPassword('$2y$10$Qonqp6Ea5F4dJIHZs6HBsuT2ZEg2wG1lRaNlEIDeLpltX66twUe2y');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Dan')
            ->setLastName('May')
            ->setEmail('dan.may46@example.com')
            ->setBirthday(new \DateTime('1985-01-07'))
            //pass : chubby
            ->setPassword('$2y$10$yRba28wSJhnd8XkbeZmyreZnND7GErXo9Vi6Dr0Wm0ytc76nYFQSW');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Glen')
            ->setLastName('Banks')
            ->setEmail('glen.banks41@example.com')
            ->setBirthday(new \DateTime('1984-04-05'))
            //thedoors
            ->setPassword('$2y$10$7c/wpWwBR7EAE1v3gGn2OOAaGMX9MKPRQIhS8J3zhghIFNa2usRrG');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Isaiah')
            ->setLastName('Arnold')
            ->setEmail('isaiah.arnold34@example.com')
            ->setBirthday(new \DateTime('1975-02-03'))
            // randy1
            ->setPassword('$2y$10$x/e6Lc2gs/H17Tp.2rE03OqOC/LKCI/0sGp9hAsBVQf1i25TbQbam');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Eva')
            ->setLastName('Lane')
            ->setEmail('eva.lane37@example.com')
            ->setBirthday(new \DateTime('1992-03-04'))
            //dynamite
            ->setPassword('$2y$10$P6wiPyGaSJ2Ra.vv8dnCpOLDAZUFRdFjPWGMX6F8/XqK69zwPb4f.');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Sophia ')
            ->setLastName('Vargas')
            ->setEmail('sophia.vargas76@example.com')
            ->setBirthday(new \DateTime('1979-06-05'))
            //scuba
            ->setPassword('$2y$10$1FwShX8cEdGnoiiohg6/jOtUU.J68c80SP7ybw.d7f57V1kUsYH3S');
        $manager->persist($user);

        $user = new User();
        $user
            ->setFirstName('Priscilla')
            ->setLastName('Bradley')
            ->setEmail('priscilla.bradley53@example.com')
            ->setBirthday(new \DateTime('1973-03-07'))
            //user
            ->setPassword('$2y$10$rca9a5zbBc1qPO.8B3d9Hu1jH7vDiTi17ee7XMvbn5iSmaQ/mGyPm');
        $manager->persist($user);
        $manager->flush();
    }
}