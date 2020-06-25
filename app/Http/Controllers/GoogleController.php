<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Oauth2;
use App\Http\Controllers\GuestController;
use App\Objects\Khach;

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
		// echo $view;
		$email = $userData["email"];

		switch ($view) {
			case 'chờ duyệt':
				return redirect("home/1");
				break;
			case 'guest.nhap-thong-tin-sinh-vien':
				$khach = new Khach();
				$duLieuLop = $khach->getAllLop(); 
				return view($view)->with(compact('email', 'duLieuLop'));
				break;
			case 'guest.nhap-thong-tin-giang-vien':
				$khach = new Khach();
				$duLieuHocVi = $khach->getALLHocVi(); 
				return view($view)->with(compact('email', 'duLieuHocVi'));
				break;
			case 'guest.nhap-thong-tin-nguoi-huong-dan':
				$khach = new Khach();
				$duLieuDonVi = $khach->getALLDonVi();
				$duLieuChucVu = $khach->getALLChucVu(); 
				return view($view)->with(compact('email', 'duLieuDonVi', 'duLieuChucVu'));
				break;
			case 'nguoi-huong-dan/home':
				return redirect($view);
				break;
			case 'sinh-vien.quan-tri':
				return redirect('sinh-vien/home');
				break;
			case 'giang-vien.quan-tri':
				return redirect('giang-vien/home');
				break;
			default:
				return view($view)->with(compact('email'));
				break;
		}			
    }

    public function logout() {
    	$this->gClient->revokeToken();
    }
}