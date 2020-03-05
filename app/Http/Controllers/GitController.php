<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GitController extends Controller
{
    // GitHub Webhook Secret.
    // GitHub项目 Settings/Webhooks 中的 Secret
    protected $secret = 'zjy123';
    // Path to your respostory on your server.
    // e.g. "/var/www/respostory"
    // 项目地址
    protected $path = "/www/wwwroot/www.amoyzjy.top";
    
    public function index()
    {
        // Headers deliveried from GitHub
        $signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
        $path = $this->path;
        $secret = $this->secret;
        if ($signature) {
            $hash = "sha1=" . hash_hmac('sha1', file_get_contents("php://input"), $secret);
            if (strcmp($signature, $hash) == 0) {
                echo shell_exec("cd {$path} && /usr/bin/git reset --hard origin/master && /usr/bin/git clean -f && /usr/bin/git pull 2>&1");
                exit();
            }
        }
        http_response_code(404);
    }
}
