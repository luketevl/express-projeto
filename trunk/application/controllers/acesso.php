<?php
class Acesso extends CI_Controller{
 	
	public function index(){
//		echo "<pre>"; print_r($this->session->userdata); echo "</pre>";
		if(!empty($this->session->userdata['id_ent'])){
			redirect('upload');
		}
		else{
			$this->load->view('login_vw');
		}
	}
	public function logar(){
		$feedback = array();
	 	$_data = $this->input->post();
	 	// echo "<pre>"; print_r($_data); echo "</pre>";
	 	$u = new Usuarios();
	 	$u = $u->verifica_login($_data['email'], $_data['senha']);
	 	if($u->exists()){
//	 	echo "<pre>"; print_r($this->session->userdata); echo "</pre>";
	 		$this->login->criarSessao($u);
	 		$feedback['cod'] = '1';
	 		$feedback['msg'] = 'Bem Vindo <strong>'.$u->nome_usu.'</strong>';
	 	}
	 	else {
	 		$feedback['cod'] = '-1';
	 		$feedback['msg'] = 'Usuário ou senha incorretos';
	 	}
	 	echo json_encode($feedback);
	 }

	 public function deslogar(){
		$this->login->deslogar();
	}
}
?>