<?php if (!defined('SCRATCH')) { header('Location: /'); exit(); }

class ApplicationController extends Controller
{
	public function index()
	{
		echo 'Default -> ApplicationController';
	}
}

?>