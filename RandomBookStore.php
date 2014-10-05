<?php

namespace TopBooks;

class RandomBookStore
{
	public function __construct(IBookReader $bookReader)
	{
		$this->bookReader = $bookReader;
	}

	public function getBooksForDate($date, $amount = null)
	{
		$books = $this->bookReader->readBooks();

		$randomExecutor = new RepeatableRandomExecutor('localbookseed' . $date);
		$books = $randomExecutor->execute('\\' . __NAMESPACE__ . '\\SortHelpers::sortArray', $books);

		if ($amount === null) {
			return $books;
		}

		return array_splice($books, 0, $amount);
	}
}
