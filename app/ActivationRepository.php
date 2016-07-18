<?php
namespace App;


use Carbon\Carbon;
use Illuminate\Database\Connection;

class ActivationRepository
{

    protected $db;

    protected $table = 'tenista_activations';

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    protected function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public function createActivation($tenista)
    {

        $activation = $this->getActivation($tenista);

        if (!$activation) {
            return $this->createToken($tenista);
        }
        return $this->regenerateToken($tenista);

    }

    private function regenerateToken($tenista)
    {

        $token = $this->getToken();
        $this->db->table($this->table)->where('tenista_id', $tenista->id)->update([
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    private function createToken($tenista)
    {
        $token = $this->getToken();
        $this->db->table($this->table)->insert([
            'tenista_id' => $tenista->id,
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    public function getActivation($tenista)
    {
        return $this->db->table($this->table)->where('tenista_id', $tenista->id)->first();
    }


    public function getActivationByToken($token)
    {
        return $this->db->table($this->table)->where('token', $token)->first();
    }

    public function deleteActivation($token)
    {
        $this->db->table($this->table)->where('token', $token)->delete();
    }
    


}