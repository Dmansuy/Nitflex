<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 02/03/2018
 * Time: 14:39
 */

namespace AppBundle\Command;


use AppBundle\Entity\Cast;
use AppBundle\Entity\Category;
use AppBundle\Entity\Film;
use AppBundle\Entity\Studio;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportUserCsvCommand extends Command
{
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();

        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('csv:import')
            ->setDescription('Import a mock CSV file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Attempting to import the feed...');

        $reader = Reader::createFromPath('%kernel.root_dir%/../src/AppBundle/Data/MOCK_DATA.csv');

        $result = $reader->fetchAssoc();

        foreach ($result as $row) {

            $user = (new User())
                ->setFirstName($row['firstName'])
                ->setLastName($row['lastName'])
                ->setEmail($row['email'])
                ->setPassword($row['password'])
                ->setBirthday(new \DateTime($row['birthday']))
                ->setIsAdmin($row['isAdmin']);
            $this->em->persist($user);

            $category = (new Category())
                ->setNameCategory($row['categoryName']);
            $this->em->persist($category);

            $cast = (new Cast())
                ->setFirstName($row['cast_firstName'])
                ->setLastName($row['cast_lastName'])
                ->setNickname(['cast_nickName']);
            $this->em->persist($cast);

            $studio = (new Studio())
                ->setName($row['studio']);
            $this->em->persist($studio);

            $films = (new Film())
                ->setTitle($row['film_name'])
                ->setLink($row['film_link'])
                ->setYear(new \DateTime($row['film_year']))
                ->setDescription($row['film_desc'])
                ->setAge($result['film_age'])
                ->setTime($row['film_time'])
                ->setAffiche($row['film_affiche'])
                ->setCategory($category)
                ->addCast($cast)
                ->setStudio($studio);
            $this->em->persist($films);
        }
        $this->em->flush();

        $user->addFilm($films);

        $io->success('Everyting went well !');
    }

}