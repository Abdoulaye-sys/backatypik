<?php

// src/Controller/AdminUserController.php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/admin/users")
 */
class AdminUserController extends AbstractController
{
    /**
     * @Route("/", name="admin_user_list", methods={"GET"})
     */
    public function listUsers(): JsonResponse
    {
        // Votre logique pour récupérer la liste des utilisateurs
        $userRepository = $this->getDoctrine()->getRepository(User::class);
        $users = $userRepository->findAll();

        // Transformez les utilisateurs en un format adapté pour la réponse JSON
        $usersData = [];
        foreach ($users as $user) {
            $usersData[] = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                // Ajoutez d'autres propriétés que vous souhaitez inclure
            ];
        }

        return $this->json($usersData);
    }

    /**
     * @Route("/{id}", name="admin_user_show", methods={"GET"})
     */
    public function showUser(User $user): JsonResponse
    {
        // Votre logique pour récupérer et afficher un utilisateur spécifique
        $userData = [
            'id' => $user->getId(),
            'username' => $user->getUname(),
            // Ajoutez d'autres propriétés que vous souhaitez inclure
        ];

        return $this->json($userData);
    }

    // Ajoutez d'autres actions pour la création, la modification et la suppression des utilisateurs
}
