<?php

namespace App\Controller;


use App\Entity\CreditCard;
use App\Form\CreditCardType;
use App\Repository\CreditCardRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreditCardController extends AbstractController
{

    /**
     * @var CreditCardRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * UsersController constructor
     * @param CreditCardRepository $repository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(CreditCardRepository $repository, EntityManagerInterface $entityManager)
    {
       $this->repository = $repository;
       $this->entityManager = $entityManager; 
    }

    /**
     * @Route("/credit/card", name="credit_card")
     */
    public function index(CreditCardRepository $repository)
    {
        $creditCards = $repository->findAll();

        return $this->render('credit_card/index.html.twig', [
            'creditCards' => $creditCards
        ]);
    }

     /**
     * @Route("/credit/card/creation", name="credit_card_creation")
     */
    public function add(Request $request)
    {
        $creditCard = new CreditCard();
        $form = $this->createForm(CreditCardType::class, $creditCard);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($creditCard);
            $this->entityManager->flush();

            return $this->redirectToRoute('credit_card');
        }

        return $this->render('credit_card/creation.html.twig', [
            'creditCard' => $creditCard,
            'form' => $form->createView(),
        ]);

    }

}
