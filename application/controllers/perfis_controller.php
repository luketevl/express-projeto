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
		$this->parser->parse('perfis',$dados);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */