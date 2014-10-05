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
