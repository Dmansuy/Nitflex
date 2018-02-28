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
     * @throws
     */
    public function load(ObjectManager $manager)
    {
        $users = [
            [
                'firstName' => 'Jean-michel', 'lastName' => 'Paumé', 'email' => 'paume.jm@gmail.com', 'birthday' => '1992-01-02', 'password' =>
                '$2y$10$wScYUif9xmBn8.ZdeuLkoOxKjaIpKjUvQAIZPPNHqpncuvcClclMu'
            ], [
                'firstName' => 'Chloe', 'lastName' => 'Porter', 'email' => 'chloe.porter37@example.com', 'birthday' => '1978-03-07', 'password' =>
                    '$2y$10$iiif87n2qwR5UWTztpi/YOfsUChyR5ym5fmxVOhVYmRnL0dxOuH6u'
            ], [
                'firstName' => 'Leonard', 'lastName' => 'Lane', 'email' => 'leonard.lane84@example.com', 'birthday' => '1992-01-02', 'password' =>
                    '$2y$10$tpUWNmjzG86w7dv4jhJVKuIXLe5HFuTTJyAgb3jXwTSXXd5uarirq'
            ], [
                'firstName' => 'Allison', 'lastName' => 'Stevens', 'email' => 'allison.stevens55@example.com', 'birthday' => '1983-04-03', 'password' =>
                    '$2y$10$U6rLQ6zsSMR6dgOZZGZcqugT0QaLw071xNPD0so5zsC68UGvONT9C'
            ], [
                'firstName' => 'Peggy', 'lastName' => 'Clark', 'email' => 'peggy.clark55@example.com', 'birthday' => '1977-03-09', 'password' =>
                    '$2y$10$Qonqp6Ea5F4dJIHZs6HBsuT2ZEg2wG1lRaNlEIDeLpltX66twUe2y'
            ], [
                'firstName' => 'Dan', 'lastName' => 'May', 'email' => 'dan.may46@example.com', 'birthday' => '1985-01-07', 'password' =>
                    '$2y$10$yRba28wSJhnd8XkbeZmyreZnND7GErXo9Vi6Dr0Wm0ytc76nYFQSW'
            ], [
                'firstName' => 'Glen', 'lastName' => 'Banks', 'email' => 'glen.banks41@example.com', 'birthday' => '1984-04-05', 'password' =>
                    '$2y$10$7c/wpWwBR7EAE1v3gGn2OOAaGMX9MKPRQIhS8J3zhghIFNa2usRrG'
            ], [
                'firstName' => 'Isaiah', 'lastName' => 'Arnold', 'email' => 'isaiah.arnold34@example.com', 'birthday' => '1975-02-03', 'password' =>
                    '$2y$10$x/e6Lc2gs/H17Tp.2rE03OqOC/LKCI/0sGp9hAsBVQf1i25TbQbam'
            ], [
                'firstName' => 'Eva', 'lastName' => 'Lane', 'email' => 'eva.lane37@example.com', 'birthday' => '1992-03-04', 'password' =>
                    '$2y$10$P6wiPyGaSJ2Ra.vv8dnCpOLDAZUFRdFjPWGMX6F8/XqK69zwPb4f.'
            ], [
                'firstName' => 'Sophia', 'lastName' => 'Vargas', 'email' => 'sophia.vargas76@example.com', 'birthday' => '1979-06-05', 'password' =>
                    '$2y$10$1FwShX8cEdGnoiiohg6/jOtUU.J68c80SP7ybw.d7f57V1kUsYH3S'
            ], [
                'firstName' => 'Priscilla', 'lastName' => 'Bradley', 'email' => 'priscilla.bradley53@example.com', 'birthday' => '1973-03-07', 'password' =>
                    '$2y$10$rca9a5zbBc1qPO.8B3d9Hu1jH7vDiTi17ee7XMvbn5iSmaQ/mGyPm'
            ]
        ];
        $i = 1;
        foreach ($users as $value) {
            $user = new User();
            $user
                ->setFirstName($value{'firstName'})
                ->setLastName($value{'lastName'})
                ->setEmail($value{'email'})
                ->setBirthday(new \DateTime($value{'birthday'}))
                ->setPassword($value{'password'});
            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
            $i++;
        }
        $manager->flush();
    }
}