<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfis_Controller extends CI_Controller {

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
		$p = new Perfis();
		$p= $p->get_all();
		$dados['dados'] = array();
		$dados['dados'] = $p;
		$this->parser->parse('perfis_listagem',$dados);
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
		$dados['perm_funcoes'] = 'checked="checked"';
		$dados['perm_tipo_solicitacoes'] = 'checked="checked"';
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
		$dados['perm_funcoes'] = empty($opcoes[6])?'':'checked="checked"';
		$dados['perm_tipo_solicitacoes'] = empty($opcoes[7])?'':'checked="checked"';
			
		//echo "<pre>"; print_r($p[0]); echo "</pre>";
		$this->parser->parse('perfis_form',$dados);
	}
	
	public function save(){
		$_data = $this->input->post();
		$_data['perm_usuario'] 		= array_key_exists('perm_usuario',$_data)?'1':'0';
		$_data['perm_solicitacoes'] = array_key_exists('perm_solicitacoes',$_data)?'1':'0';
		$_data['perm_projetos']		= array_key_exists('perm_projetos',$_data)?'1':'0';
		$_data['perm_perfis']		= array_key_exists('perm_perfis',$_data)?'1':'0';
		$_data['perm_opcoes']		= array_key_exists('perm_opcoes',$_data)?'1':'0';
		$_data['perm_indicadores']	= array_key_exists('perm_indicadores',$_data)?'1':'0';
		$_data['perm_funcoes']		= array_key_exists('perm_funcoes',$_data)?'1':'0';
		$_data['perm_tipo_solicitacoes']	= array_key_exists('perm_tipo_solicitacoes',$_data)?'1':'0';
		$dados['id_perf'] 			= $_data['id_perf'];	
		$dados['descricao_perf'] 	= $_data['descricao_perf'];
		$dados['opcoes_perf'] 		= $_data['perm_usuario'] . $_data['perm_solicitacoes'] . $_data['perm_projetos'] . $_data['perm_perfis'] . $_data['perm_opcoes'] . $_data['perm_indicadores']. $_data['perm_funcoes'] . $_data['perm_tipo_solicitacoes'] ;		
		$p = new Perfis();
		//echo "<pre>"; print_r($_data); echo "</pre>";
		$p->salvar($dados);
		redirect('perfis_controller');
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
	
	public function as_perfil(){
		$term = trim($_GET['term']);
		$p = new Perfis();
		$p= $p->get_by_descricao($term);
		foreach($p as $k=>$v){
			foreach($v as $key=>$valor){
				if($key == 'descricao_perf'){
					$retorno[$k]['label']= $valor;
					$retorno[$k]['value']= $valor;
				}
				else if($key == 'id_perf'){
					$retorno[$k]['id_perf']= $valor;
				}
			}
		}
		echo json_encode($retorno);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */