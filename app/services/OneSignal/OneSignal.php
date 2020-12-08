<?php
namespace App\Services\OneSignal;

class OneSignal {

    private $appID = null;

    /**
     * Classe para utilizar o onesignal no projeto.
     *
     * @param string $appID id da aplicação no OneSignal
     */
    public function __construct(string $appID)
    {
        $this->appID = $appID;
    }

    public function criarNotificacao(string $mensagem, string $playerId, array $dadosAdicionais = []) {
        $notificacao = new Conexao();
        return $response = $notificacao->enviarNotificacao($this->appID, $mensagem, $playerId, $dadosAdicionais);
    }
}
?>
