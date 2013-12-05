<?php namespace Acme\wcsite\home;

interface HomeInterface {

	public function SaveHome($uid,$websiteData);

	public function getHome($uid);
}