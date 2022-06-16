<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Libraries\Chat;

class Server extends BaseController
{
    public function index()
    {
        $server = IoServer::factory(
			new HttpServer(
				new WsServer(
					new Chat()
				)
			),
			31686
		);

		$server->run();
    }
}
