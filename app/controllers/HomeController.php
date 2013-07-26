<?php

class HomeController extends BaseController {
	
	/**
	 * The template to use.
	 *
	 * @var string
	 */
	protected $layout = 'template';
	
	protected $video;
	
	/**
	 * Constructor.
	 *
	 * @var interface
	 */
	public function __construct(Video $video)
	{
		$this->video = $video;
	}
	
	public function index($title = '', $author = '')
	{	
		$data = array();
		
		// Titles should be from language files
		$data['title'] 			= 'Dashboard';
		$data['title_small'] 	= '';
				
		return View::make('home.index', $data);
	}	
}