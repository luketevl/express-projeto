<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcoes_Controller extends CI_Controller {

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
		$f = new Funcoes();
		$f= $f->get_all();
		$dados['dados'] = array();
		foreach ($f as $k=>$v){
			$p = new Projetos();
			$p = $p->get_by_id($v['id_proj']);
			$v['nome_proj'] = $p[0]['nome_proj'];
			$f[$k]= $v;
			$v['ativo'] = ($v['ativo'] == 1) ? 'ok':'asterisk';
			$f[$k]= $v;
		}
		$dados['dados'] = $f;
		$this->parser->parse('funcoes_listagem',$dados);
	}
	
	public function load_new(){
		$dados['dados'] 					= array();
		$dados['nome_func'] 				= '';
		$dados['ativo'] 					= '';
		$dados['id_proj'] 					= '';
		$dados['id_func'] 					= '';
		$dados['opcao_ativo'] 				= 'checked';
//		echo "<pre>"; print_r($_data); echo "</pre>";
		$this->parser->parse('funcoes_form',$dados);
	}
	
	public function load_form(){
		$f = new Funcoes();
		$f= $f->get_by_id($_GET['id']);
		$dados['dados'] = array();
		$dados = $f[0];
		$dados['opcao_ativo'] = $f[0]['ativo'] == 1 ? "checked": '';
		//echo "<pre>"; print_r($u[0]); echo "</pre>";
		$this->parser->parse('funcoes_form',$dados);
	}
	
	public function save(){
		$_data = $this->input->post();
		$dados = $_data;
		if(!empty($dados['ativo'])){
			$dados['ativo'] = '1';
		}
		else{
			$dados['ativo'] = '0';
		}
		//echo "<pre>"; print_r($dados); echo "</pre>";die;
		
		$f = new Funcoes();
		//echo "<pre>"; print_r($dados); echo "</pre>";
		$f->salvar($dados);
		redirect('funcoes_controller');
	}
	
	public function deletar(){
		$f = new Funcoes();
		if($f->deletar($_GET['id'])){
			redirect('funcoes_controller');
		}	
		else{
			echo "possui vinculos";			
		}	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */