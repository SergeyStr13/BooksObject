<?php
namespace book;

class Book {

	public function __construct() {
	}

	public function getBookId() {

	}

	public function getItems() {
		$view = 'book/booksItems.php';
		return $view;
	}
}