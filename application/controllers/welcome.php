<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$opcoes_menu = $this->monta_menu();
		$dados['dados'] = array();
		if(substr($opcoes_menu,-8,1) == 1){
			$dados['dados'][0]['url']= base_url()."index.php/usuarios_controller/"; 
			$dados['dados'][0]['nome']= "Usuários";
		}
		if(substr($opcoes_menu,-5,1) == 1){
			$dados['dados'][1]['url']= base_url()."index.php/perfis_controller/";
			$dados['dados'][1]['nome']= "Perfil";
		}
		if(substr($opcoes_menu,-6,1) == 1){
			$dados['dados'][2]['url']= base_url()."index.php/projetos_controller/";
			$dados['dados'][2]['nome']= "Projetos";
		}
		if(substr($opcoes_menu,-1,1) == 1){
			$dados['dados'][3]['url']= base_url()."index.php/funcoes_controller/";
			$dados['dados'][3]['nome']= "Funções";
		}
		if(substr($opcoes_menu,-2,1) == 1){
			$dados['dados'][4]['url']= base_url()."index.php/indicadores_controller/";
			$dados['dados'][4]['nome']= "Indicadores";
		}
		if(substr($opcoes_menu,-1,1) == 1){
			$dados['dados'][5]['url']= base_url()."index.php/tipo_solicitacoes_controller/";
			$dados['dados'][5]['nome']= "Tipo Solicitações";
		}
		if(substr($opcoes_menu,-7,1) == 1){
			$dados['dados'][6]['url']= base_url()."index.php/solicitacoes_controller/";
			$dados['dados'][6]['nome']= "Solicitações";
		}
		if(substr($opcoes_menu,-3,1) == 1){
			$dados['dados'][7]['url']= base_url()."index.php/opcoes_controller/";
			$dados['dados'][7]['nome']= "Opções";
		}
		//echo "<pre>"; print_r($dados); echo "</pre>";
		$this->parser->parse('index',$dados);
	}
	
	public function monta_menu(){
		$p = new Perfis();
		$p = $p->get_by_id($this->session->userdata['id_perf']);
		return $p[0]['opcoes_perf'];
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */