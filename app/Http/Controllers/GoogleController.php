<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Oauth2;
use App\Http\Controllers\GuestController;

class GoogleController extends Controller
{
	private $gClient;
	private $loginURL;

	/**
     * @return mixed
     */
    public function getLoginURL()
    {
        return $this->loginURL;
    }

    /**
     * @param mixed $loginURL
     *
     * @return self
     */
    public function setLoginURL($loginURL)
    {
        $this->loginURL = $loginURL;

        return $this;
    }

	public function __construct() {
		$this->gClient = new Google_Client();
		$this->gClient->setClientId("357212470826-un2creb01sh79svsjm4ekro664osljkl.apps.googleusercontent.com");
		$this->gClient->setClientSecret("CLL_XlaD8Rac0tSd2Wqx3Krj");
		$this->gClient->setApplicationName("Thực Tập SET");
		$this->gClient->setRedirectUri("http://localhost/do-an/ThucTap/google-callback");
		$this->gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
		/*
           * setClientId và setClientSecret: bạn lấy ở phần tạo app lúc nãy điền vào
           * setApplicationName: Thay đổi tên cho phù hợp
           * setRedirectUri: để giống như lúc bạn tạo app
           * addScope: các quyền yêu cầu người dùng
        */
       
       $this->loginURL = $this->gClient->createAuthUrl(); //Lấy link đăng nhập google
    }

    public function callback() {
		if (isset($_SESSION['access_token']))
			$this->gClient->setAccessToken($_SESSION['access_token']);
		else if (isset($_GET['code'])) {
			$token = $this->gClient->fetchAccessTokenWithAuthCode($_GET['code']);
			$_SESSION['access_token'] = $token;
		} else {
			//header('Location: index.php');
			exit();
		}

		$oAuth = new Google_Service_Oauth2($this->gClient);
		$userData = $oAuth->userinfo_v2_me->get();

		$guest = new GuestController();
		$view = $guest->handleGoogleLoginAfter($userData);
		// echo "<pre>";
		// print_r($userData);
		// echo "</pre>";

		return view($view);
    }

}