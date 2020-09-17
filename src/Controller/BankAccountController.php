<?php

namespace App\Controller;

use App\Entity\BankAccount;
use App\Form\BankAccountType;
use App\Repository\BankAccountRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BankAccountController extends AbstractController
{

      /**
     * @var BankAccountRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * UsersController constructor
     * @param BankAccountRepository $repository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(BankAccountRepository $repository, EntityManagerInterface $entityManager)
    {
       $this->repository = $repository;
       $this->entityManager = $entityManager; 
    }

    /**
     * @Route("/bank/account", name="bank_account")
     */
    public function index(BankAccountRepository $repository)
    {
        $bankAccounts = $this->repository->findAll();

        return $this->render('bank_account/index.html.twig', [
            'bankAccounts' => $bankAccounts
        ]);
    }

    /**
     * @Route("/bank/account/creation", name="bank_account_creation")
     */
    public function add(Request $request)
    {
        $bankAccount = new BankAccount();
        $form = $this->createForm(BankAccountType::class, $bankAccount);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($bankAccount);
            $this->entityManager->flush();

            return $this->redirectToRoute('bank_account');
        }

        return $this->render('bank_account/creation.html.twig', [
            'bankAccount' => $bankAccount,
            'form' => $form->createView(),
        ]);

    }
}