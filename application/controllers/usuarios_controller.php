<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_Controller extends CI_Controller {

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
		$u = new Usuarios();
		$u= $u->get_all();
		$dados['dados'] = array();
		$dados['dados'] = $u;
		$this->parser->parse('usuarios_listagem',$dados);
	}
	
	public function load_new(){
		$dados['dados'] = array();
		$dados['nome_usu'] = '';
		$dados['email_usu'] = '';
		$dados['id_usu'] = '';
		$dados['senha_usu'] = '';
		$dados['id_perf'] = '';
		$dados['opcao_ativo'] = 'checked';
//		echo "<pre>"; print_r($_data); echo "</pre>";
		$this->parser->parse('usuarios_form',$dados);
	}
	
	public function load_form(){
		$u = new Usuarios();
		$u= $u->get_by_id($_GET['id']);
		$dados['dados'] = array();
		$dados = $u[0];
		$dados['opcao_ativo'] = $u[0]['ativo'] == 1 ? "checked": '';
		$dados['opcao_adm'] = $_GET['id']==USER_PADRAO ? "disabled" : '';
		//echo "<pre>"; print_r($u[0]); echo "</pre>";
		$this->parser->parse('usuarios_form',$dados);
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
	//	echo "<pre>"; print_r($dados); echo "</pre>";
		
		$u = new Usuarios();
		//echo "<pre>"; print_r($dados); echo "</pre>";
		$u->salvar($dados);
		if($u->exists()){
			//	 	echo "<pre>"; print_r($this->session->userdata); echo "</pre>";
			$feedback['cod'] = '1';
			$feedback['msg'] = 'Usuário <strong>'.$u->nome_usu.'</strong> cadastrado.';
		}
		else {
			$feedback['cod'] = '-1';
			$feedback['msg'] = 'Já existe este e-mail';
		}
		echo json_encode($feedback);
		//redirect('usuarios_controller');
	}
	
	public function deletar(){
		$u = new Usuarios();
		if($u->deletar($_GET['id'])){
			redirect('usuarios_controller');
		}	
		else{
			echo "possui vinculos";			
		}	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */