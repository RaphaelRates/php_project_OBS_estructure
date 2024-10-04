<?php 
namespace App\Controllers;

include __DIR__ . '/../../core/Controller.php';
require_once __DIR__.'/../../vendor/autoload.php';

use Core\Controller;
use Google\Client;
use Google\Service\Oauth2;

class LoginController extends Controller {
    private $client;

    public function __construct() {
        $this->client = new Client();
        $this->client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(getenv('GOOGLE_REDIRECT_URI'));
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function googleLogin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Gerar um novo estado e armazená-lo na sessão
        $state = bin2hex(random_bytes(16));
        $_SESSION['state'] = $state;
        $this->client->setState($state);

        // Verificar se o usuário já está autenticado
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $oauth = new Oauth2($this->client);
            $userInfo = $oauth->userinfo->get();
            $_SESSION['user_email'] = $userInfo->email;
            $_SESSION['user_name'] = $userInfo->name;
            $_SESSION['user_picture'] = $userInfo->picture;
            header("Location: /");
            exit();
        } else {
            $authUrl = $this->client->createAuthUrl();
            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
            exit();
        }
    }

    public function googleCallback() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_GET['code'])) {
            die('No code provided.');
        }

        if (!isset($_GET['state']) || $_GET['state'] !== $_SESSION['state']) {
            die('State mismatch. Possible CSRF attack.');
        }

        $this->client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $this->client->getAccessToken();
        $oauth = new Oauth2($this->client);
        $userInfo = $oauth->userinfo->get();
        $_SESSION['user_email'] = $userInfo->email;
        $_SESSION['user_name'] = $userInfo->name;
        $_SESSION['user_picture'] = $userInfo->picture;
        header('Location: /');
        exit();
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset(
            $_SESSION['access_token'],
            $_SESSION['user_email'],
            $_SESSION['user_name'],
            $_SESSION['state']);
        session_destroy();
        header('Location: /');
        exit();
    }
}
