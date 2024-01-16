<?php
// src/Controller/RegisterController.php

namespace App\Controller;

use App\Entity\User; // Assurez-vous d'importer l'entité User
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/api/users/register", name="register", methods={"POST"})
     */
    public function register(Request $request): JsonResponse
    {
        // Récupérer les données JSON
        $data = json_decode($request->getContent(), true);

        // Vérifier si les données nécessaires sont présentes
        if (!isset($data['username']) || !isset($data['email']) || !isset($data['password'])) {
            // Retourner une réponse d'erreur si des données sont manquantes
            return $this->json(['error' => 'Veuillez fournir un nom d\'utilisateur, une adresse e-mail et un mot de passe.'], 400);
        }

        // Récupérer les données nécessaires
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];

        // Créer une instance de l'entité User et définir les propriétés
        $user = new User();
        $user->setUname($username);
        $user->setUEmail($email);
        $user->setUPass($password); // Vous devrez peut-être hasher le mot de passe, selon votre configuration

        // Enregistrer l'utilisateur dans la base de données
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Retourner une réponse JSON pour indiquer que l'inscription a réussi
        return $this->json(['message' => 'Inscription réussie']);
    }
}
