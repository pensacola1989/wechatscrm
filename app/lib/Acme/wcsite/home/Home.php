<?php namespace Acme\wcsite\home;

use Website;

class Home implements HomeInterface {

	public function SaveHome($userid,$websiteData)
	{
		try {
			if($website = $this->userHasRecord($userid)) {
				$website->homepage = $websiteData;
				$website->save();
			} 
			else 
			{
				$website = new Website;
				$website->userid = $userid;
				$website->homepage = $websiteData;
				$website->save();
			}
			return $website;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	public function getHome($uid)
	{
		$website = Website::where('userid',$uid)
							->firstOrFail();
		return $website;
	}
 
	private function userHasRecord($uid) 
	{
		return Website::where('userid',$uid)
						->firstOrFail();
	}
}