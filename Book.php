<?php

namespace TopBooks;

class Book
{
	private $title;
	private $referralUrl;

	public function __construct($title)
	{
		$this->title = $title;
	}

	public function getId()
	{
		$id = $this->getShortTitle();

		$id = str_replace(' ', '', $id);
		$id = strtolower($id);

		return $id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getShortTitle()
	{
		if (preg_match('/^([a-z0-9 ]+)/i', $this->title, $matches))
		{
			return $matches[1];
		}

		throw new \Exception('Could not find a suitable portion of the title to convert to an id');
	}

	public function getReferralUrl()
	{
		return $this->referralUrl;
	}

	public function setReferralUrl($referralUrl)
	{
		$this->referralUrl = $referralUrl;
	}
}
