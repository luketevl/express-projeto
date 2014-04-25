<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Solicitacoes_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		if(empty($this->session->userdata['id_ent'])){
		//	redirect('acesso');
		}
		$s = new Solicitacoes();
		$s= $s->get_all();
		$dados['dados'] = array();
		foreach ($s as $k=>$v){
			$p = new Projetos();
			$u = new Usuarios();
			$u = $u->get_by_id($v['id_usu']);
			$p = $p->get_by_id($v['id_proj']);
			$v['nome_proj'] = $p[0]['nome_proj'];
			$v['nome_usu'] = $u[0]['nome_usu'];
			$s[$k]= $v;
		}
		$dados['dados'] = $s;
		$this->parser->parse('solicitacoes_listagem',$dados);
	}
	
	public function load_new(){
		$dados['dados'] 					= array();
		$dados['nome_proj'] 				= '';
		$dados['descricao_proj'] 			= '';
		$dados['sigla_proj'] 				= '';
		$dados['id_proj'] 					= '';
//		echo "<pre>"; print_r($_data); echo "</pre>";
		$this->parser->parse('solicitacoes_form',$dados);
	}
	
	public function load_form(){
		$s = new Solicitacoes();
		$s= $s->get_by_id($_GET['id']);
		$dados['dados'] = array();
		$dados = $s[0];
		//echo "<pre>"; print_r($u[0]); echo "</pre>";
		$this->parser->parse('solicitacoes_form',$dados);
	}
	
	public function save(){
		$_data = $this->input->post();
		$dados = $_data;
		//echo "<pre>"; print_r($dados); echo "</pre>";die;
		
		$s = new Solicitacoes();
		//echo "<pre>"; print_r($dados); echo "</pre>";
		$s->salvar($dados);
		redirect('solicitacoes_controller');
	}
	
	public function deletar(){
		$s = new Solicitacoes();
		if($s->deletar($_GET['id'])){
			redirect('solicitacoes_controller');
		}	
		else{
			echo "possui vinculos";			
		}	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */