<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo_Solicitacoes_Controller extends CI_Controller {

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
			redirect('acesso');
		}
		$s = new Tipo_Solicitacoes();
		$s= $s->get_all();
		$dados['dados'] = array();
		$dados['dados'] = $s;
		$this->parser->parse('tipo_solicitacoes_listagem',$dados);
	}
	
	public function load_new(){
		$dados['dados'] 					= array();
		$dados['descricao_tipo_soli'] 				= '';
		$dados['id_tipo_soli'] 					= '';
//		echo "<pre>"; print_r($_data); echo "</pre>";
		$this->parser->parse('tipo_solicitacoes_form',$dados);
	}
	
	public function load_form(){
		$s = new Tipo_Solicitacoes();
		$s= $s->get_by_id($_GET['id']);
		$dados['dados'] = array();
		$dados = $s[0];
		//echo "<pre>"; print_r($u[0]); echo "</pre>";
		$this->parser->parse('tipo_solicitacoes_form',$dados);
	}
	
	public function save(){
		$_data = $this->input->post();
		$dados = $_data;
		//echo "<pre>"; print_r($dados); echo "</pre>";die;
		
		$s = new Tipo_Solicitacoes();
		//echo "<pre>"; print_r($dados); echo "</pre>";
		$s->salvar($dados);
		redirect('tipo_solicitacoes_controller');
	}
	
	public function deletar(){
		$s = new Tipo_Solicitacoes();
		if($s->deletar($_GET['id'])){
			redirect('tipo_solicitacoes_controller');
		}	
		else{
			echo "possui vinculos";			
		}	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */