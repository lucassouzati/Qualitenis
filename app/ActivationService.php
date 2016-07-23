<?php

namespace App;


use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class ActivationService
{

    protected $mailer;

    protected $activationRepo;

    protected $resendAfter = 24;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($tenista)
    {
        //dd(!$this->shouldSend($tenista));
        if ($tenista->activated){// || !$this->shouldSend($tenista)) {
            return;
        }

        $token = $this->activationRepo->createActivation($tenista);

        $link = route('tenista.activate', $token);
        //$message = sprintf('Activate account <a href="%s">%s</a>', $link, $link);
        $message = sprintf('Código de ativação: %s', $link);

        $this->mailer->raw($message, function (Message $m) use ($tenista) {
            $m->to($tenista->email)->subject('Activation mail');
        });


    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $tenista = Tenista::find($activation->tenista_id);

        $tenista->activated = true;

        $tenista->save();

        $this->activationRepo->deleteActivation($token);

        return $tenista;

    }

    private function shouldSend($tenista)
    {
        $activation = $this->activationRepo->getActivation($tenista);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}
