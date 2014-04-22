<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opcoes_Controller extends CI_Controller {

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
		$o = new Opcoes();
		$o= $o->get_all();
		if(empty($o)){
			$dados['proposito_opc'] = '';
			$dados['servidor_smtp'] = '';
			$dados['usuario_smtp'] = '';
			$dados['senha_smtp'] = '';
			$dados['porta_smtp'] = '';
		}
		else{
			$dados = $o[0];
		}
		$this->parser->parse('opcoes',$dados);
	}
	
	public function load_new(){
		$dados['dados'] = array();
		$dados['descricao_perf'] = '';
		$dados['id_perf'] = '';
		$dados['perm_indicadores'] = 'checked="checked"';
		$dados['perm_opcoes'] = 'checked="checked"';
		$dados['perm_perfis'] = 'checked="checked"';
		$dados['perm_projetos'] = 'checked="checked"';
		$dados['perm_solicitacoes'] = 'checked="checked"';
		$dados['perm_usuario'] = 'checked="checked"';
//		echo "<pre>"; print_r($_data); echo "</pre>";
		$this->parser->parse('perfis_form',$dados);
	}
	
	public function load_form(){
		$p = new Perfis();
		$p= $p->get_by_id($_GET['id']);
		$dados['dados'] = array();
		$dados = $p[0];
		$opcoes = str_split($dados['opcoes_perf']);
		$dados['perm_usuario'] = empty($opcoes[0])?'':'checked="checked"';
		$dados['perm_solicitacoes'] = empty($opcoes[1])?'':'checked="checked"';
		$dados['perm_projetos'] = empty($opcoes[2])?'':'checked="checked"';
		$dados['perm_perfis'] = empty($opcoes[3])?'':'checked="checked"';
		$dados['perm_opcoes'] = empty($opcoes[4])?'':'checked="checked"';
		$dados['perm_indicadores'] = empty($opcoes[5])?'':'checked="checked"';
			
		//echo "<pre>"; print_r($p[0]); echo "</pre>";
		$this->parser->parse('perfis_form',$dados);
	}
	
	public function save(){
		$_data = $this->input->post();
		$dados['id_opc'] 			= $_data['id_opc'];	
		$dados['proposito_opc'] 	= $_data['proposito_opc'];
		$dados['servidor_smtp'] 	= $_data['servidor_smtp'];
		$dados['usuario_smtp'] 	= $_data['usuario_smtp'];
		$dados['senha_smtp'] 	= $_data['senha_smtp'];
		$dados['porta_smtp'] 	= $_data['porta_smtp'];
		$o = new Opcoes();
		//echo "<pre>"; print_r($_data); echo "</pre>";
		$o->salvar($dados);
		redirect('opcoes_controller');
	}
	
	public function deletar(){
		$p = new Perfis();
		if($p->deletar($_GET['id'])){
			redirect('perfis_controller');
		}	
		else{
			echo "possui vinculos";			
		}	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */