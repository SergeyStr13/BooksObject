<?php
namespace book;
use app\App;

/**
 * Class books
 */
class Book {

	public $id;
	public $title;
	public $description;
	public $author;

	public function __construct($fields = []) {
		foreach ((array)$fields as $field => $value) {
			if (property_exists($this,$field)) {
				$this->$field = $value;
			}
		}
	}

	public static function getBooks() {
		/*$db = new \app\Database([]);
		$query = $db->getConnection();
		$books = $query->query('select * from books');
		*/
		$db = App::getInstance()->db->getConnection();
		$query = $db->query('select * from book');
		$books = $query->fetchAll(\PDO::FETCH_CLASS, self::class);

		//var_dump($books);
		return $books;
	}

}