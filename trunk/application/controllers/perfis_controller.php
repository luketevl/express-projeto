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
	
	public function save(){
		$p = new Perfis();
		$p= $p->get_by_id(1);
		$dados['dados'] = array();
		$dados['dados'] = $p;
		$dados['descricao_perf'] = $p[0]['descricao_perf'];
		$dados['id_perf'] = $p[0]['id_perf'];
		$this->parser->parse('perfis_form',$dados);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */