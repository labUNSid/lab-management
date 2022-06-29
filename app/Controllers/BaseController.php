<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\UserModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['cookie'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        session();

        $cookie = get_cookie('email');
        if (isset($cookie)) {
            $userModel = new UserModel();
            $dataUser = $userModel->where(['email' => $cookie])->first();
            $sesi = [
                'email' => $dataUser['email'],
                'nama' => $dataUser['nama'],
                'id' => $dataUser['id_user'],
                'id_role' => $dataUser['id_role'],
            ];
            session()->set($sesi);
        }
        if (isset($dataUser['id_role'])) {
            if ($dataUser['id_role'] == 1) {
                return redirect()->to('/admin');
            }
            if ($dataUser['id_role'] == 2) {
                return redirect()->to('/user');
            }
        }
    }
}
