<?php
if (!function_exists('check_login_user')) {
    function check_login_user()
    {
      $ci = get_instance();
      if ($ci->session->userdata('is_user_login') != TRUE) {
  
        $array_items = array('idusuario', 'nombre', 'cargo');
  
        $ci->session->sess_destroy();
  
        redirect(base_url());
      }
    }
  }
if (!function_exists('arrayToCommaString')) {
    function arrayToCommaString($data)
    {

        $dataArray = json_decode($data, true);
        $valuesArray = array_map(function ($item) {
            return $item['value'];
        }, $dataArray);

        $resultString = implode(',', $valuesArray);

        echo $resultString;
    }
}

function obtenerNombreRol($idCargo) {
    // Definir un array asociativo con los roles y sus IDs
    $roles = array(
        1 => "admin",
        // Otros roles aquí si es necesario
    );

    // Verificar si el ID del cargo existe en el array de roles
    if (array_key_exists($idCargo, $roles)) {
        return $roles[$idCargo]; // Devolver el nombre del rol correspondiente al ID
    } else {
        return "Rol no encontrado"; // Mensaje de error si el ID no coincide con ningún rol
    }
}
