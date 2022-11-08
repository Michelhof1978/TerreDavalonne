<?php

namespace App\Services;

use App\Entity\DiffusionNewsletter;
use App\Entity\User;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;

class MaillerServices
{
    private EmailVerifier $emailVerifier;
    
    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    public function sendMailCreateCompte(User $user): void
    {
        $isSend = $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
        (new TemplatedEmail())
            ->from(new Address('erik@terredavalonne.com', 'Terre d\'Avalonne'))
            ->to(new Address($user->getEmail(), $user->getFirstname()))
            ->subject('Confirmez votre E-mail')
            ->htmlTemplate('MAILS/REGISTRATION/Check-inConfirmation.html.twig')
            ->context([
                'user' => $user
            ]));
    }

    public function sendMailResetPassword(User $user, $resetToken): void
    {
        $isSend = $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
        (new TemplatedEmail())
            ->from(new Address('erikreset@terredavalonne.com', 'Terre d\'Avalonne email automatique'))
            ->to($user->getEmail())
            ->subject('Email de réinitialisation de mot de passe')
            ->htmlTemplate('reset_password/email.html.twig')
            ->context([
                'resetToken' => $resetToken,
            ]));
    }
}