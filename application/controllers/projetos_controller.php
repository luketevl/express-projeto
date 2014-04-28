<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projetos_Controller extends CI_Controller {

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
		$p = new Projetos();
		$p= $p->get_all();
		$dados['dados'] = array();
		$dados['dados'] = $p;
		$this->parser->parse('projetos_listagem',$dados);
	}
	
	public function load_new(){
		$dados['dados'] 					= array();
		$dados['nome_proj'] 				= '';
		$dados['descricao_proj'] 			= '';
		$dados['sigla_proj'] 				= '';
		$dados['id_proj'] 					= '';
//		echo "<pre>"; print_r($_data); echo "</pre>";

		$dados['funcoes_lista'] = array();
		$this->parser->parse('projetos_form',$dados);
	}
	
	public function load_form(){
		$p = new Projetos();
		$p= $p->get_by_id($_GET['id']);
		$dados['dados'] = array();
		$dados = $p[0];
		//echo "<pre>"; print_r($u[0]); echo "</pre>";
		
		$f = new Funcoes();
		$f = $f->get_by_id_projeto($_GET['id']);
		foreach ($f as $k=>$v){
			$p = new Projetos();
			$p = $p->get_by_id($v['id_proj']);
			$v['nome_proj'] = $p[0]['nome_proj'];
			$f[$k]= $v;
			$v['ativo'] = ($v['ativo'] == 1) ? 'ok':'asterisk';
			$f[$k]= $v;
		}
		$dados['funcoes_lista'] = $f;
		$this->parser->parse('projetos_form',$dados);
	}
	
	public function save(){
		$_data = $this->input->post();
		$dados = $_data;
		//echo "<pre>"; print_r($dados); echo "</pre>";die;
		
		$p = new Projetos();
		//echo "<pre>"; print_r($dados); echo "</pre>";
		$p->salvar($dados);
		redirect('projetos_controller');
	}
	
	public function deletar(){
		$p = new Projetos();
		if($p->deletar($_GET['id'])){
			redirect('projetos_controller');
		}	
		else{
			echo "possui vinculos";			
		}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */