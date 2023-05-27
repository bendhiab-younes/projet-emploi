<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/', name: 'app_login')]
    public function index_login(AuthenticationUtils $authenticationUtils): Response
    {

        $error = "invalide informations";
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
    #[Route('/logout', name: 'app_logout', methods: ['GET'])]
    
    public function logout(): void
    {
        // controller can be blank: it will never be called!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }



    
  

}





class ProfileController extends AbstractController
{
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTIFICATED_FULLY');
         
        /**@var \App\Entity\User $user */
        $user = $this->getUser();

        return new Response('well hi there' .$user->getEmail());
    }
}


