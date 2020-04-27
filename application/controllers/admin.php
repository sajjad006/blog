<?php

class Admin extends MY_Controller
{

	// Admin Dashboard part
	public function dashboard()
	{
		$this->load->library('pagination');
		$config=[
			'base_url' => base_url('admin/dashboard'),
			'per_page' => 5,
			'total_rows' => $this->articles->numRows()
		];
		
		$this->pagination->initialize($config);

		$articles = $this->articles->getArticles('all');
		$this->load->view('admin/adminpanel.php', ['articles'=>$articles]);
	}


	// Adding article part
	public function addArticle()
	{
		$this->load->helper('form');
		$this->load->view('admin/addArticle');
	}

	public function saveArticle()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run('addArticle')) {
			
			$title=$this->input->post('title');
			$body=$this->input->post('body');
			
			$name=$_FILES['image']['name'];
	        $fExt=explode('.', $name);
	        $fActExt=strtolower(end($fExt));

	        if (!empty($name)) {
	        	$fname=md5(uniqid($name, true)).'.'.$fActExt;
	        }
	        else{
	        	$fname='';
	        }
	        
	        $config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'jpg|png|jpeg';
	        $config['file_name']            = $fname;

	        $this->load->library('upload', $config);

	        if (!empty($name) && ! $this->upload->do_upload('image')) {
	        	$this->session->set_flashdata('error', 'Sorry failed to upload image. Please try again');	
				return redirect('admin/addArticle');
	        }
	        else {
	        	if ($this->articles->insertArticles($title, $body, $fname)) {
					$this->session->set_flashdata('success', 'Successfully added your article');
					return redirect('admin/addArticle');
				}
				else{
					$this->session->set_flashdata('error', 'Sorry failed to add your article. Please try again');	
					return redirect('admin/addArticle');
				}	
	        }
		}
		else{
			$this->load->view('admin/addArticle');
		}
	}

	//add article ends here

	//Reading article
	public function readArticle()
	{
		$id=$id=$this->uri->segment(3, 0);
		
		$this->load->model('article_model','article');

		$articles=$this->article->getArticles($id);
		$this->load->view('user/articles', ['articles'=>$articles]);
	}

	//edit article part
	public function editArticle($id)
	{
		if(!$id){
			return redirect('admin/dashboard');
		}
		$result=$this->articles->getArticles($id);
		
		$this->load->helper('form');
		$this->load->view('admin/editArticle',['article' => $result[0]]);

	}

	public function updateArticle($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run('addArticle')) {

        	if ($this->articles->editArticles($id, $this->input->post())) {
				$this->session->set_flashdata('success', 'Successfully updated the article');
				return redirect('admin/addArticle');
			}
			else{
				$this->session->set_flashdata('error', 'Sorry failed to update the article. Please try again');	
				return redirect('admin/addArticle');
			}	
		}
		else{
			$result=$this->articles->getArticles($id);
			$this->load->view('admin/editArticle',['article' => $result[0]]);	
		}
	}

	// delete article part
	public function deleteArticle()
	{
		if(!$id=$this->uri->segment(3, 0)){
			return redirect('admin/dashboard');
		}
		
		if ($this->articles->deleteArticles($id)) {
			$this->session->set_flashdata('success', 'Successfully deleted the article');
			return redirect('admin/dashboard');
		}
		else{
			$this->session->set_flashdata('error', 'Sorry could not delete the article');
			return redirect('admin/dashboard');
		}
	}

	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username'))
			return redirect('login');
		$this->load->model('article_model', 'articles');
	}
}