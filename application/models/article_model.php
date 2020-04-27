<?php

/**
 * 
 */
class Article_model extends CI_Model
{
	public function insertArticles($title, $body, $name)
	{
		$username=$this->session->userdata('username');
		$date=date('Y-m-d');
		$data = array(
		        'Title' => $title,
		        'Body' => $body,
		        'Username' => $username,
		        'Image' => $name,
		        'Date' => $date
		);
		if($this->db->insert('articles', $data)){
			return true;
		}
		else{
			return false;
		}
	}

	public function getArticles($id)
	{
		$username=$this->session->userdata('username');
		if ($id=="all") {
			$query = $this->db->select('*')
				        ->where('Username', $username)
				        ->get('articles');
		}
		else{
			$query = $this->db->select('*')
				        ->where('ID', $id)
				        ->get('articles');
		}
		return $query->result();	
	}

	public function getUserArticles($limit, $offset)
	{
		$query=$this->db->limit($limit, $offset)
						->get('articles');
						//->limit($limit, $offset);

		return $query->result();	
	}	
			
	public function editArticles($id, Array $article)
	{
		$q = $this->db->where('ID',$id)
						->update('articles',$article);
		$result = ($q) ? true : false ;
		return $q;
	}

	public function deleteArticles($id)
	{
		$query = $this->db->where('ID', $id)
						->delete('articles');
		
		$result = ($query) ? 1 : 0 ;
		return $result;
	}

	public function serachArticle($term)
	{
		$query=$this->db->like('Title', $term)
						->or_like('Body', $term)
						->get('articles');
		return $query->result();
	}

	public function numRows()
	{
		return $this->db->count_all('articles');
	}
}

?>