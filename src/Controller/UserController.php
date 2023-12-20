<?php
// src/Controller/UserController.php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/users")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/register", name="register", methods={"POST"})
     */
    public function register(Request $request): JsonResponse
    {
        // Récupérer les données du formulaire
        $data = json_decode($request->getContent(), true);

        // Validation des données (à ajouter selon vos besoins)

        // Créer un nouvel utilisateur
        $user = new User();
        $user->setUname($data['username']);
        $user->setUEmail($data['email']);
        $user->setUPass($data['password']); // Note: Vous devez hasher le mot de passe dans un vrai projet

        // Enregistrez l'utilisateur dans la base de données
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        // Réponse JSON pour confirmer l'inscription
        return $this->json(['message' => 'Inscription réussie'], Response::HTTP_CREATED);
    }
}
