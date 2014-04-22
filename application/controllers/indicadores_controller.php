<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicadores_Controller extends CI_Controller {

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
		$i = new Indicadores();
		$i= $i->get_all();
		$dados['dados'] = array();
		$dados['dados'] = $i;
		$this->parser->parse('indicadores_listagem',$dados);
	}
	
	public function load_new(){
		$dados['dados'] 			= array();
		$dados['descricao_ind'] 	= '';
		$dados['tipo_ind'] 			= '';
		$dados['sigla_ind'] 		= '';
		$dados['regra_ind'] 		= '';
		$dados['versao_ind'] 		= '';
		$dados['valor'] 			= '';
		$dados['referencia_ind'] 	= '';
		$dados['data_referencia_ind'] = '';
		$dados['id_ind'] 				= '';
//		echo "<pre>"; print_r($_data); echo "</pre>";
		$this->parser->parse('indicadores_form',$dados);
	}
	
	public function load_form(){
		$i = new Indicadores();
		$i= $i->get_by_id($_GET['id']);
		$dados['dados'] = array();
		$dados = $i[0];
		//echo "<pre>"; print_r($u[0]); echo "</pre>";
		$this->parser->parse('indicadores_form',$dados);
	}
	
	public function save(){
		$_data = $this->input->post();
		$dados = $_data;
		//echo "<pre>"; print_r($dados); echo "</pre>";die;
		
		$i = new Indicadores();
		//echo "<pre>"; print_r($dados); echo "</pre>";
		$i->salvar($dados);
		redirect('indicadores_controller');
	}
	
	public function deletar(){
		$i = new Indicadores();
		if($i->deletar($_GET['id'])){
			redirect('indicadores_controller');
		}	
		else{
			echo "possui vinculos";			
		}	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */