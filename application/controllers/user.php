<?php

/**
 * 
 */
class User extends MY_Controller
{

	public function index()
	{	
		$this->load->helper('form');
		$this->load->model('article_model');
		$this->load->library('pagination');
		
		$config=[
			'base_url' 			=> base_url('user/index'),
			'per_page' 			=> 5,
			'total_rows' 		=> $this->article_model->numRows(),
			'full_tag_open' 	=> '<ul class="pagination">',
			'full_tag_close'	=> '</ul>',
			'first_tag_open'	=> '<li>',
			'first_tag_close'	=> '</li>',
			'last_tag_open'	=> '<li>',
			'last_tag_close'	=> '</li>',
			'next_tag_open'		=> '<li class="page-item">',
			'next_tag_close'	=> '</li>',
			'prev_tag_open'		=> '<li class="page-item">',
			'prev_tag_close'	=> '</li>',
			'num_tag_open'		=> '<li class="page-item">',
			'num_tag_close'		=> '</li>',
			'cur_tag_open'		=> '<li class="active"><a>',
			'cur_tag_close'		=> '</a></li>'
		];
		
		$this->pagination->initialize($config);
		
		$article=$this->article_model->getUserArticles($config['per_page'], $this->uri->segment(3));
		$this->load->view('user/article_list', array('articles'=>$article));
	}

	public function readArticle()
	{
		$id=$id=$this->uri->segment(3, 0);
		
		$this->load->model('article_model','article');

		$articles=$this->article->getArticles($id);
		$this->load->view('user/articles', ['articles'=>$articles]);
	}

	public function searchArticle()
	{
		$this->load->model('article_model','article');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('query','Query','required');

		if($this->form_validation->run()){
			$query=$this->input->post('query');
			$result=$this->article->serachArticle($query);
			
			$this->load->view('user/search_results',['articles'=>$result]);
		}
		else{
			$this->index();
		}
	}
}