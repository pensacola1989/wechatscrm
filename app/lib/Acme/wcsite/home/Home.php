<?php namespace Acme\wcsite\home;

use Website;

class Home implements HomeInterface {

	public function SaveHome($userid,$websiteData)
	{
		$website = new Website;
		$website->userid = $userid;
		$website->homepage = $websiteData;

		try {
			$website->save();
			return $website;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}