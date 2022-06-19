<?php
namespace App\Libraries;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

use App\Models\LoginModel;
use App\Models\ChatModel;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        $queryString = $conn->httpRequest->getUri()->getQuery();
        parse_str($queryString, $queryArray);

        $LoginModel = new LoginModel();
        $LoginModel->update_data($queryArray['id_login'], array('id_connection' => $conn->resourceId));

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $data = json_decode($msg, true);
        $ChatModel = new ChatModel();
        $LoginModel = new LoginModel();

        $chat_data = array(
            'to_login_id' => $data['to_login_id'],
            'from_login_id' => $data['from_login_id'],
            'message' => $data['message'],
            'status' => 1,
        );

        $ChatModel->insert($chat_data);

        $sender_login_data = $LoginModel->getLoginById($data['from_login_id']);
        $receiver_login_data = $LoginModel->getLoginById($data['to_login_id']);

        $sender_name = $sender_login_data[0]->nama;
        $data['datetime'] = date('Y-m-d H:i:s');
        $receiver_connection_id = $receiver_login_data[0]->id_connection;


        foreach ($this->clients as $client) {
            if ($from == $client) {
                $data['from'] = 'Saya';

            }
            else {
                $data['from'] = $sender_name;
            }

            // kirim ke client yang menerima pesan
            if($client->resourceId == $receiver_connection_id || $from == $client) {
                $client->send(json_encode($data));
            }
            // jika dia offline
            else{
                $ChatModel->update_data($ChatModel->insertID(), array('status' => 0));
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}