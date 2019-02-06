<?php
namespace app;

use user\UserController;

class App {

	public $request;

	/**
	 * @var Database $db
	 */
	public $db;
	public $uri;
	private $router;
	private $path;
	private static $instance;

	public function __construct() {
		$this->path = dirname(__DIR__);
		spl_autoload_register([$this,'autoload']);

		$this->request = new Request();
		$this->uri = '/'.($this->request->get('YPATH') ?? ''); // todo: переименовать YPATH во что-то более подходящее
		$this->db = new Database(['user' => 'root', 'dbname' => 'booksphp']);
		$this->router = new Router([
			'/' => [UserController::class, 'users'],
			'/user/add' => [UserController::class, 'add'],
			'/user/update' => [UserController::class, 'update'],
			'/user/delete' => [UserController::class, 'delete']
		]);
		if (self::$instance === null) {
			self::$instance = $this;
		}
	}

	public static function getInstance(): self {
		return self::$instance;
	}

	public function run() {

		if (!$this->router->dispatch($this->uri)) {
			echo '404 Page not found';
		}
	}

	public function redirect($uri) {
		header("location: $uri");
		exit();
	}

	private function autoload($className) {
		$file = $this->path.'/'.str_replace('\\','/',$className).'.php';
		if (is_file($file)) {
			require_once $file;
		}
	}

}
