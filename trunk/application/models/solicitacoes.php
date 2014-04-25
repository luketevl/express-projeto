<?php

/**
 * Template DataMapper Model
 *
 * Use this basic model as a template for creating new models.
 * It is not recommended that you include this file with your application,
 * especially if you use a Template library (as the classes may collide).
 *
 * To use:
 * 1) Copy this file to the lowercase name of your new model.
 * 2) Find-and-replace (case-sensitive) 'Template' with 'Your_model'
 * 3) Find-and-replace (case-sensitive) 'template' with 'your_model'
 * 4) Find-and-replace (case-sensitive) 'templates' with 'your_models'
 * 5) Edit the file as desired.
 *
 * @license		MIT License
 * @category	Models
 * @author		Phil DeJarnett
 * @link		http://www.overzealous.com
 */
class Solicitacoes extends DataMapper {

	// Uncomment and edit these two if the class has a model name that
	//   doesn't convert properly using the inflector_helper.
	// var $model = 'template';
	 //var $table = '';

	// You can override the database connections with this option
	// var $db_params = 'db_config_name';

	// --------------------------------------------------------------------
	// Relationships
	//   Configure your relationships below
	// --------------------------------------------------------------------

	// Insert related models that Template can have just one of.
	var $has_one = array();

	// Insert related models that Template can have more than one of.
	var $has_many = array();

	/* Relationship Examples
	 * For normal relationships, simply add the model name to the array:
	 *   $has_one = array('user'); // Template has one User
	 *
	 * For complex relationships, such as having a Creator and Editor for
	 * Template, use this form:
	 *   $has_one = array(
	 *   	'creator' => array(
	 *   		'class' => 'user',
	 *   		'other_field' => 'created_template'
	 *   	)
	 *   );
	 *
	 * Don't forget to add 'created_template' to User, with class set to
	 * 'template', and the other_field set to 'creator'!
	 *
	 */

	// --------------------------------------------------------------------
	// Validation
	//   Add validation requirements, such as 'required', for your fields.
	// --------------------------------------------------------------------
/*
	var $validation = array(
		'example' => array(
			// example is required, and cannot be more than 120 characters long.
			'rules' => array('required', 'max_length' => 120),
			'label' => 'Example'
		)
	);

	// --------------------------------------------------------------------
	// Default Ordering
	//   Uncomment this to always sort by 'name', then by
	//   id descending (unless overridden)
	// --------------------------------------------------------------------

	// var $default_order_by = array('name', 'id' => 'desc');

	// --------------------------------------------------------------------

	/**
	 * Constructor: calls parent constructor
	 */
    function __construct($sd = NULL)
	{
		parent::DataMapper();
    }

	// --------------------------------------------------------------------
	// Post Model Initialisation
	//   Add your own custom initialisation code to the Model
	// The parameter indicates if the current config was loaded from cache or not
	// --------------------------------------------------------------------
	/*function post_model_init($srom_cache = FALSE)
	{
	}

	// --------------------------------------------------------------------
	// Custom Methods
	//   Add your own custom methods here to enhance the model.
	// --------------------------------------------------------------------

	/* Example Custom Method
	function get_open_templates()
	{
		return $this->where('status <>', 'closed')->get();
	}
	*/

	// --------------------------------------------------------------------
	// Custom Validation Rules
	//   Add custom validation rules for this model here.
	// --------------------------------------------------------------------

	/* Example Rule
	function _convert_written_numbers($sield, $sarameter)
	{
	 	$nums = array('one' => 1, 'two' => 2, 'three' => 3);
	 	if(in_array($this->{$sield}, $nums))
		{
			$this->{$sield} = $nums[$this->{$sield}];
	 	}
	}
	*/
	function get_by_id($id){
		return $this->where('id_proj',$id)->get()->all_to_array();
	}
	
	function deletar($id){
		$this->db->select('*');
		$this->db->from('solicitacoes');
		$this->db->where('id_proj',$id);
		$resultado = $this->db->get();
		//echo "<pre>"; print_r($resultado); echo "</pre>";
		if(!empty($resultado->num_rows)){
			return false;
		}
		else {
			$this->db->where('id_proj',$id);
			$this->db->delete('projetos');
			return true;
		}
	}
	
	function get_all(){
		return $this->get()->all_to_array();
	}
	
	function salvar($dados){
		$s = new Solicitacoes();
		$s->id_usu				 	 	 = $dados['id_usu'];
		$s->id_tipo_soli				 = $dados['id_tipo_soli'];
		$s->id_proj						 = $dados['id_proj'];
		$s->data_soli					 = $dados['data_soli'];
		$s->sigla_soli					 = $dados['sigla_soli'];
		$s->identificacao_soli			 = $dados['identificacao_soli'];
		$s->tipo_funcao_soli			 = $dados['tipo_funcao_soli'];
		$s->tecnica_soli				 = $dados['tecnica_soli'];
		$s->data_criacao_soli		 	 = date('Y-m-d h:m:s');
		
	//	echo "<pre>"; print_r($dados); echo "</pre>";
		if(!empty($dados['id_soli'])){
			$s->where('id_soli', $dados['id_soli']);
			$s->update($dados);
		}
		else{
			$s->save();
		//	echo $s->check_last_query();
		}
		return $s;
	}
}

/* End of file template.php */
/* Location: ./application/models/template.php */
