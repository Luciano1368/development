<?php 

include ('../../dist/conect/dbConnect.php'); 

$contador = 0;

//SE RECIBE EL IDUSER COMO CONDICION PARA ACCEDER
if (isset($_POST["userId"]) && $_POST["userId"] !=="" ) {
	//SE HACE UN DECODE AL STRING RECIBIDO PARA OBTENER CADA DATO INDIVIDUALMENTE
	$datos = json_decode(getURLAPI());
	try {
		//SE HACE UN FOR PARA PROCESAR CADA DATO INDIVIDUALMENTE Y GUARDARLOS EN BD
		for ($i=0; $i < count($datos); $i++) { 
			$userId = $datos[$i]->userId;
			$id = $datos[$i]->id;
			$title=(string)$datos[$i]->title;
			$body=(string)$datos[$i]->body;


			$queryGuardaIngreso = "INSERT INTO post (userId,id,title,body) VALUES ('$userId','$id','$title','$body')";
			$guardado = mysqli_query($conn, $queryGuardaIngreso) or die(mysqli_error($conn));
			//SE CUENTA CUANTOS DATOS SE ALMACENARON CORRECTAMENTE
			if ($guardado > 0) {
				$contador++;
			}
		}
		//LUEGO DE QUE TERMINA DE PROCESAR TODOS LOS DATOS SE GUARDA LA INFORMACION DEL PROCESAMIENTO
		$queryGuardaIngreso = "INSERT INTO post_request (timeReq,hourReq, contador) VALUES ('$horaHoy','$fechaHoy','$contador')";
		$guardado = mysqli_query($conn, $queryGuardaIngreso) or die(mysqli_error($conn));

	} catch (Exception $e) {
		echo $e->getMessage;
	}

	echo  $contador;
	
	
}

//FUNCION CURL PARA HACER UN GET A LA URL SOLICITADA
function getURLAPI(){
        
    $curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response = curl_exec($curl);
	

	curl_close($curl);

    return $response;
}

   
//RECIBE ID PARA MOSTRAR Y EXTRAER EL DATO DE BD

if (isset($_POST['idMostrar']) && $_POST['idMostrar'] !== "") {

	$query = "SELECT * FROM post WHERE id = '$_POST[idMostrar]' ";
	$buscaPorId = mysqli_query($conn, $query) or die(mysqli_error($conn));

	$row =mysqli_fetch_assoc($buscaPorId);
	//IMPRIME EL RESULTADO OBTENIDO EN FORMATO JSON
	
	echo (json_encode($row,JSON_PRETTY_PRINT)); 
}



die("No data");

 ?>