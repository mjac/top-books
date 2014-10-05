<?php

namespace TopBooks;

class XmlBookReader implements IBookReader
{
	private $filename;

	public function __construct($filename)
	{
		$this->filename = $filename;
	}

	public function readBooks()
	{
		$books = array();

		$xml = simplexml_load_file($this->filename);

		foreach ($xml->book as $bookXml)
		{
			$book = $this->_readBook($bookXml);
			$books[] = $book;
		}

		return $books;
	}

	private function _readBook($bookXml)
	{
		$book = new Book((string)$bookXml->title);
		$book->setReferralUrl((string)$bookXml->url);
		return $book;
	}
}
