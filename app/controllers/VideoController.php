<?php

class VideoController extends BaseController {
	
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
		
		$data['title'] = 'Videos';
		
		$search = Input::get('search');
		
				
		$data['rows'] =  $this->video->orderBy('name')->paginate(10);
		$data['count'] = $this->video->count();
		
		return View::make('video.index', $data);
	}	
}