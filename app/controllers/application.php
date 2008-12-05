<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

class ApplicationController extends Controller
{
	public function index()
	{
		$this->actionResult[] = 'Default -> ApplicationController';
	}
}

?>