<?php

namespace App\Service;

use App\Entity\User;
use App\Interfaces\UpdateProfileInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UpdateProfile implements UpdateProfileInterface
{
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    public function updateProfile(User $user, string $prenom, string $email, string $plainPassword ): void
    {
        $user->setPrenom($prenom);
        $user->setEmail($email);

        if (!empty($plainPassword)) {
    $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
    $user->setPassword($hashedPassword);
}

        $this->entityManager->flush();
        
    }
}




// // string $plainPassword) rajoutez password apres pour l'instant je test juste avec le nom et l'email

//    if (!empty($plainPassword)) {
//     $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
//     $user->setPassword($hashedPassword);
// }