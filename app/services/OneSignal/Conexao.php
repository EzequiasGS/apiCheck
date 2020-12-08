<?php
namespace App\Services\OneSignal;

class Conexao {
    /**
     * Método responsável por enviar a notificação
     *
     * @param string $appID id da aplicação no OneSignal
     * @param string $mensagem conteúdo da mensagem a ser enviada
     * @param string $playerId id do dispositivo que vai receber a notificação
     * @param array $dadosAdicionais array com informações adicionais que pode ser enviado na notificação.
     * @return void
     */
    public function enviarNotificacao(string $appID, string $mensagem, string $playerId, array $dadosAdicionais = []){
        $content = array(
            "en" => $mensagem
        );

        $fields = array(
            'app_id' => $appID,
            'include_player_ids' => array($playerId),
            'data' => array("foo" => "bar"),
            'contents' => $content
        );

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
?>
