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
		if (preg_match('/^([a-z0-9 ]+)/i', $this->title, $matches))
		{
			$shortTitle = $matches[1];

			$shortTitle = str_replace(' ', '', $shortTitle);
			$shortTitle = strtolower($shortTitle);

			return $shortTitle;
		}

		throw new \Exception('Could not find a suitable portion of the title to convert to an id');
	}

	public function getTitle()
	{
		return $this->title;
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
