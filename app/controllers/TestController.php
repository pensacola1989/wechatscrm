<?php
use Acme\Product\Anvil\AnvilInterface;

class TestController extends BaseController {

	public function __construct(AnvilInterface $anvil)
	{
		$this->anvil = $anvil;
	}

	public function index()
	{
		return $this->anvil->drop();
	}
}