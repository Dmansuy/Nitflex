<?php
/**
 * Created by IntelliJ IDEA.
 * User: dmansuy
 * Date: 02/03/2018
 * Time: 12:16
 */

namespace AppBundle\Command;


use AppBundle\Manager\UserManager;
use Proxies\__CG__\AppBundle\Entity\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    private $userManager;

    /**
     * CreateUserCommand constructor.
     * @param $userManager
     */
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            // le nom de la commande (la partie après "bin/console")
            ->setName('app:create:user')
            // Une description courte, affichée lors de l'éxécution de la
            // commande "php bin/console list"
            ->setDescription('Create User.')
            // La description complète affichée lorsque l'on ajoute

            // l'option "--help"
            ->setHelp('This command allow you to create a user')
            ->addArgument('firstName', InputArgument::REQUIRED, 'The first name of the user.')
            ->addArgument('lastName', InputArgument::REQUIRED, 'The last name of the user')
            ->addArgument('email', InputArgument::REQUIRED, 'The email of the user')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of the user.')
            ->addArgument('birthday', InputArgument::REQUIRED, 'The birthday of the user.')
            ->addArgument('is_admin', InputArgument::REQUIRED, 'The role of the user.');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new \DateTime($input->getArgument('birthday'));

        $user = new User();

        $user->setFirstName($input->getArgument('firstName'));
        $user->setLastName($input->getArgument('lastName'));
        $user->setEmail($input->getArgument('email'));
        $user->setPassword($input->getArgument('password'));
        $user->setBirthday($date);
        $user->setIsAdmin($input->getArgument('is_admin'));


        $this->userManager->createUser($user);

        $output->writeln('User successfully created !');
    }

}