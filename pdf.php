<?php ob_start(); ?>
<h2>Informacion Usuarios</h2>
<table style="background-color:#0e77e8; width="500px" cellpadding="5px" cellspacing="5px" border="1">
    <tr bgcolor="#cccaca">
        <th>CEDULA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO1</th>
                    <th>APELLIDO2</th>
                    <th>FEC. NACIMIENTO</th>
                    <th>SEXO</th>
                    <th>ACCION</th>
    </tr>
    <tr bgcolor="#ffffff">
        <td>12345678</td>
        <td>diego</td>
        <td>miranda</td>
        <td>chaves</td>
        <td>2020-12-15</td>
        <td>1</td>
        <td>Reporte Informacion</td>
        
    </tr>
    <tr bgcolor="#ffffff">
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>---</td>
        <td>----</td>
        <td>----</td>
        <td>----</td>
        </tr>
    
</table>
<?php
require_once 'lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = "Informacion Usuarios.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>