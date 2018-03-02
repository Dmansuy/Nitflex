<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 02/03/2018
 * Time: 11:22
 */

namespace AppBundle\Command;


use AppBundle\Manager\FilmManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateFilmCommand extends Command
{
    private $filmManager;

    /**
     * CreateFilmCommand constructor.
     * @param $filmManager
     */
    public function __construct($filmManager)
    {
        $this->filmManager = $filmManager;
        parent::__construct();
    }

    protected function configure()
    {
        $this->addArgument('category_id', InputArgument::REQUIRED, 'Id of the category which applies to the movie.');
        $this->addArgument('studio_id', InputArgument::REQUIRED, 'Id of the studio which in product the movie.');
        $this->addArgument('title', InputArgument::REQUIRED, 'The name of the movie.');
        $this->addArgument('year', InputArgument::REQUIRED, 'The year of the movie.');
        $this->addArgument('description', InputArgument::REQUIRED, 'The synopsi of the movie.');
        $this->addArgument('age', InputArgument::REQUIRED, 'The age limit to see this movie.');
        $this->addArgument('time', InputArgument::REQUIRED, 'The duration of the movie.');
        $this->addArgument('affiche', InputArgument::REQUIRED, 'The poster of the movie.');
    }

    protected  function execute(InputInterface $input, OutputInterface $output)
    {
        $this->filmManager->createFormName($input->getArgument('title','year','description','age','time','affiche'));
        $output->writeln('Movie successfully created !');
    }
}