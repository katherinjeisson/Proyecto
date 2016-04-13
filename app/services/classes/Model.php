<?php
class Model {
	
	private $conn;

	public function __construct() 
	{
		// $this->conn = new PDO('mysql:host=localhost;dbname=jyk8tn', 'root');
		$this->conn = new PDO('mysql:host=sql300.freecluster.eu;dbname=fceu_17532647_ws', 'fceu_17532647','AbC12345678');
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	/**
	 * Obtine todos los datos del producto
	 * @return array
	 */
	public function getProduct($id_product = 0) 
	{
		try{
			$stmt = $this->conn->prepare('SELECT
											p.id_producto,
											p.Nombre,
											p.Descripcion,
											p.Presentacion,
											p.Imagen,
											p.Iva,
											p.Precio,
											ROUND( p.Precio + (p.Precio * p.Iva) ) AS PrecioUnitTotal,
											c.Nombre AS categoria,
											f.Nombre AS Fabrica
										FROM producto p
										INNER JOIN categoria c ON p.id_categoria = c.id_categoria
										INNER JOIN fabrica f ON ( p.id_fabrica = f.id_fabrica )
										WHERE p.id_producto = :id_product');
			$stmt->bindParam(':id_product', $id_product, PDO::PARAM_INT);

			$stmt->execute();
			$resultado = $stmt->fetchAll();

			return $resultado;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	/**
	 * Obtine los precios del producto
	 * @return array
	 */
	public function getProductPrices($id_product = 0) 
	{
		try{			
			$stmt = $this->conn->prepare('SELECT
											p.id_producto,
											p.Iva,
											p.Precio,
											ROUND( p.Precio + (p.Precio * p.Iva) ) AS PrecioUnitTotal
										FROM producto p
										WHERE p.id_producto = :id_product');
			$stmt->bindParam(':id_product', $id_product, PDO::PARAM_INT);

			$stmt->execute();
			$resultado = $stmt->fetchAll();

			return $resultado;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	/**
	 * Obtine los productos relacionados del producto consultado x categoria
	 * @return array
	 */
	public function getRelatedProducts($id_product = 0) 
	{
		try{			
			$stmt = $this->conn->prepare('SELECT p.*
										FROM producto p
										WHERE p.id_categoria = (
											SELECT id_categoria
											FROM producto
											WHERE id_producto = :id_product
										)');
			$stmt->bindParam(':id_product', $id_product, PDO::PARAM_INT);

			$stmt->execute();
			$resultado = $stmt->fetchAll();

			return $resultado;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
}