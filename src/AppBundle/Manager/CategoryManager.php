<?php
namespace AppBundle\Manager;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;

class CategoryManager extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $entityManager)

    {
        $this->em = $entityManager;
    }

    public function getCategories()
    {
        return $this->em->getRepository(Category::class)->findAll();
    }

    public function getCategory($id)
    {
        return $this->em->getRepository(Category::class)->find($id);
    }

    public function deleteCategory($category){
        $this->em->remove($category);
        $this->em->flush();
    }
}