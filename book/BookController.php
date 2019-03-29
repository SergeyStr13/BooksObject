<?php
namespace book;


class BookController extends \app\Controller {

	//booksItems
	//booksItem
	//add, update, delete
	//

	public function books() {
		$items = Book::getBooks();
		$this->render('books', compact('items'));
	}

	public function getBookById() {

	}

	public function add() {

	}

	public function update() {

	}

	public  function delete() {

	}
}