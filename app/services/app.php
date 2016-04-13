<?php 

require_once('classes/Rest.inc.php');
require_once('classes/Model.php');

class API extends REST {

	public function __construct() 
	{
		parent::__construct(); // Init parent contructor
	}

	/**
	 * Método público para el acceso a la API.
	 * Este método llama dinámicamente el método basado en la cadena de consulta
	 *
	 */
	public function processApi()
	{
		$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
		if((int)method_exists($this,$func) > 0)
			$this->$func();
		else
			$this->response('',404); // If the method not exist with in this class, response would be "Page not found".
	}

	/**
	 * Codifica el array en un JSON
	 */
	private function json($data)
	{
		if ( is_array($data) ) {
			return json_encode($data);
		}
	}

	/** 
	 * Productos API
	 * Consulta de los productos debe ser por método GET
	 * expr : <Nombre del producto o referencia>
	 * page_number : <Número de página>
	 * page_size : <Filas por página>
	 * order_by : <Ordenar por ascendente ó descendente>
	 * order_way : <Ordenar por campo>
	 */
	private function product()
	{
		// Validación Cross si el método de la petición es GET de lo contrario volverá estado de "no aceptable"
		if ($this->get_request_method() != "GET") {
			$this->response('', 406);
		}

		$id_producto = $this->_request['id'];

		$model = new Model();
		$result = $model->getProduct( $id_producto );

		if (empty($result)) {
			// Si no hay registros, estado "Sin contenido"
			$this->response('', 204);
		} else {
			// Si todo sale bien, enviará cabecera de "OK" y la lista de la búsqueda en formato JSON
			$this->response($this->json($result), 200);
		}
		
	}

	private function productprices()
	{
		// Validación Cross si el método de la petición es GET de lo contrario volverá estado de "no aceptable"
		if ($this->get_request_method() != "GET") {
			$this->response('', 406);
		}

		$id_producto = $this->_request['id'];

		$model = new Model();
		$result = $model->getProductPrices( $id_producto );

		if (empty($result)) {
			// Si no hay registros, estado "Sin contenido"
			$this->response('', 204);
		} else {
			// Si todo sale bien, enviará cabecera de "OK" y la lista de la búsqueda en formato JSON
			$this->response($this->json($result), 200);
		}
		
	}

	private function relatedproducts()
	{
		// Validación Cross si el método de la petición es GET de lo contrario volverá estado de "no aceptable"
		if ($this->get_request_method() != "GET") {
			$this->response('', 406);
		}

		$id_producto = $this->_request['id'];

		$model = new Model();
		$result = $model->getRelatedProducts( $id_producto );

		if (empty($result)) {
			// Si no hay registros, estado "Sin contenido"
			$this->response('', 204);
		} else {
			// Si todo sale bien, enviará cabecera de "OK" y la lista de la búsqueda en formato JSON
			$this->response($this->json($result), 200);
		}
		
	}
}

// Iniciar
$api = new API;
$api->processApi();

?>