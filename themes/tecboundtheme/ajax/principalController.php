<?php class principalController
	{
		static function manage_requires($rut_absolut){


			require_once('mailer/controlador.php');

			$dir=$_REQUEST['action'];
			if ($dir=='mailer') 
			{

				$action=$_REQUEST['module'];
				if ($action=='consulta') 
				{

					$dir=$_REQUEST;

					if ($dir['nombre'] != null && $dir['email'] != null && $dir['telefono'] != null && $dir['mensaje'] != null) 
					{
						/*  Data Setting
						/* ---------------------------------------------------------------------- */


						//  Mail General Data
						
						$data=array('nombe'		=> $dir['nombre'],
									'correo'	=> $dir['email'] , 
									'telefono' 	=> $dir['telefono'],
									'mensaje'	=> $dir['mensaje']);
						
						$dat_admin=array(of_get_option('email'),'Admin');
	                    $dat_client=array($dir['email'],'Cliente Siselcom');

						/*  Email Sending
						/* ---------------------------------------------------------------------- */


	                   	principal_send($dat_client,$dat_admin,'Consulta TRITURADOS',$data,__DIR__.'/mailer/plantilla-admin.php');
	                    principal_send($dat_admin,$dat_client,'TRITURADOS',$data,__DIR__.'/mailer/plantilla.php');

	                    echo '<div class="alert alert-success" role="alert"> Mensaje enviado</div>';
					}
					else
					{
						echo '<div class="alert alert-danger" role="alert"> Los datos del formularios deben estar llenos</div>';

					}

				}
				elseif ($action == 'contacto') 
				{
					$dir = $_REQUEST;
					if ($dir['nombre'] != null && $dir['email'] != null && $dir['empresa'] != null && $dir['telefono'] != null && $dir['mensaje'] != null) 
					{
						/*  Data Setting
						/* ---------------------------------------------------------------------- */


						//  Mail General Data
						
						$data=array('nombre'	=> $dir['nombre'],
									'correo' 	=> $dir['email'] ,
									'empresa'	=> $dir['empresa'], 
									'telefono' 	=> $dir['telefono'],
									'mensaje'	=> $dir['mensaje']);
						
						$dat_admin=array(of_get_option('email'),'Admin');
	                    $dat_client=array($dir['email'],$dir['nombre']);

						/*  Email Sending
						/* ---------------------------------------------------------------------- */


	                   	principal_send($dat_client,$dat_admin,'Consulta TRITURADOS',$data,__DIR__.'/mailer/plantilla-admin.php');
	                    principal_send($dat_admin,$dat_client,'TRITURADOS',$data,__DIR__.'/mailer/plantilla.php');

	                    echo '<div class="alert alert-success" role="alert"> Mensaje enviado</div>';
					}
					else
					{
						echo '<div class="alert alert-danger" role="alert"> Los datos del formularios deben estar llenos</div>';

					}
				}
				else{false;}

			}else{false;}
		}
	}
?>