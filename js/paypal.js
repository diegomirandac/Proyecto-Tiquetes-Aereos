function paypal_PDT_request($tx,$pdt_identity_token) {
    $request = curl_init();
 
    // Set request options
    curl_setopt_array($request, array
        (
          CURLOPT_URL => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
          CURLOPT_POST => TRUE,
          CURLOPT_POSTFIELDS => http_build_query(array
              (
                'cmd' => '_notify-synch',
                'tx' => $tx,
                'at' => $pdt_identity_token,
              )
          ),
          CURLOPT_RETURNTRANSFER => TRUE,
          CURLOPT_HEADER => FALSE,
          // CURLOPT_SSL_VERIFYPEER => TRUE,
          // CURLOPT_CAINFO => 'cacert.pem',
        )
    );
 
    // Realizar la solicitud y obtener la respuesta
    // y el código de status
    $response = curl_exec($request);
    $status   = curl_getinfo($request, CURLINFO_HTTP_CODE);
 
    // Cerrar la conexión
    curl_close($request);
    return $response;
}