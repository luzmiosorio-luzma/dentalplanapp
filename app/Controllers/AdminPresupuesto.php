<?php

namespace App\Controllers;

use App\Models\PresupuestoModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class AdminPresupuesto extends BaseController
{
    public function __construct()
    {
        require_once APPPATH . "ThirdParty/vendor/autoload.php";
        $this->PresupuestoModel = new PresupuestoModel();
    }

    function uploadPrestaciones()
    {

        helper('utils_helper');

        $file = $this->request->getFile('file');

        if (file_exists($file)){
            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = $file->getTempName();

                try {

                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
                    $sheet = $spreadsheet->getActiveSheet();


                    // Validar encabezados
                    $headerA1 = trim($sheet->getCell('A1')->getValue());
                    $headerB1 = trim($sheet->getCell('B1')->getValue());

                    if ($headerA1 !== 'Prestación' || $headerB1 !== 'Valor') {
                        throw new \Exception('El archivo no tiene los encabezados esperados: "Descripción" y "Valor".');
                    }

                    $prestaciones = [];
                    $row = 2; // Los datos comienzan desde la fila 2

                    while ($sheet->getCell('A' . $row)->getValue() !== null) {


                        $descripcion = trim($sheet->getCell('A' . $row)->getValue());
                        $valor = $sheet->getCell('B' . $row)->getValue();

                        if ($valor == null) {
                            $valor = "";
                        }else{
                            $valor = convertirMonedaANumero(trim($valor));
                        }

                        if (!empty($descripcion)) {
                            $prestaciones[] = [
                                'descripcion' => $descripcion,
                                'valor' => $valor
                            ];
                        }
                        $row++;
                    }

                    if (empty($prestaciones)) {
                        return $this->response->setJSON(['error' => 'El archivo no contiene datos válidos.'])->setStatusCode(400);
                    }

                    $response = $this->PresupuestoModel->updatePrestaciones($prestaciones);

                    if ($response === true) {
                        return $this->response->setJSON(['resp' => 'Prestaciones actualizadas.'])->setStatusCode(200);
                    }else{
                        return $this->response->setJSON(['resp' => 'Error al actualizar prestaciones.'])->setStatusCode(200);
                    }

                    echo json_encode($response);

                } catch (\Exception $e) {
                    log_message('error', 'Error inesperado: ' . $e->getMessage());
                    return $this->response->setJSON(['error' => 'Error al procesar el archivo: ' . $e->getMessage()])->setStatusCode(500);
                }

            } else {
                return $this->response->setJSON(['error' => 'El archivo no es válido: '])->setStatusCode(500);
            }
        }

    }

    function getPrestaciones(){

        $session = session();
        $data['user_id'] = $session->get('user');
        $responseData = $this->PresupuestoModel->getPrestaciones();
        echo json_encode($responseData);

    }

    function getUserPrestacionesExcel()
    {
//        $template = base_url() . '\writable\uploads\plantilla.xlsx';
        $template = WRITEPATH ."uploads/plantilla.xlsx";


        $prestaciones = $this->PresupuestoModel->getPrestaciones();


        try {


            // Load the template file
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($template);
            $sheet = $spreadsheet->getActiveSheet();
    
            // Llenar datos
            $row = 2; // Assuming data starts from row 2
            foreach ($prestaciones as $prestacion) {
                $sheet->setCellValue('A' . $row, $prestacion['descripcion']);
                $sheet->setCellValue('B' . $row, $prestacion['valor_int']);
                $row++;
            }
    
            // Ajustar ancho de columnas
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
    

            $writer = new Xlsx($spreadsheet);
            $filename = 'prestaciones.xlsx';
    
            // Enviar archivo al navegador
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
    
            $writer->save('php://output');
            exit;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function obtieneUserPresupuestos()
    {

        $usuario = $_REQUEST['usuario'];

        $responseData = $this->PresupuestoModel->getUserPresupuestos($usuario);

        echo json_encode($responseData);

    }

    function getPacientePresupuestos()
    {
        $id_paciente = $_REQUEST['paciente'];

        $responseData = $this->PresupuestoModel->getPacientePresupuestos($id_paciente);

        echo json_encode($responseData);
    }

    function addPresupuesto()
    {
        $session = session();
        $data = $_REQUEST;
        $data['user_id'] = $session->get('user');
        $responseData = $this->PresupuestoModel->insetPresupuesto($data);
        echo json_encode($responseData);
    }

    function eliminarItemPresupuesto(){
        $data = $_REQUEST;
        $responseData = $this->PresupuestoModel->deleteItemPresupuesto($data);
        echo json_encode($responseData);
    }

    function addItemToPresupuesto(){
        $data = $_REQUEST;
        $responseData = $this->PresupuestoModel->insertItemToPresupuesto($data);
        echo $responseData;
    }

    function updatePresupuesto(){

        $session = session();
        $data = $_REQUEST;
        $data['user_id'] = $session->get('user');
        $responseData = $this->PresupuestoModel->updatePresupuesto($data);
        echo json_encode($responseData);

    }

    function editItemFechaPago()
    {
        $data = $_REQUEST;

        $responseData = $this->PresupuestoModel->updateItemFechaPago($data);

        echo $responseData;
    }

    function editItemPago()
    {
        $data = $_REQUEST;

        $responseData = $this->PresupuestoModel->updateItemPago($data);

        echo $responseData;
    }

    function editItemDescripcion(){
        $data = $_REQUEST;

        $responseData = $this->PresupuestoModel->updateItemDescripcion($data);

        echo $responseData;
    }

    function editItemDiente(){
        $data = $_REQUEST;

        $responseData = $this->PresupuestoModel->updateItemDiente($data);

        echo $responseData;
    }

    function editItemObserv(){
        $data = $_REQUEST;

        $responseData = $this->PresupuestoModel->updateItemObservacion($data);

        echo $responseData;
    }

    function editItemDesarrollo()
    {
        $data = $_REQUEST;

        $responseData = $this->PresupuestoModel->updateItemDesarrollo($data);

        echo $responseData;
    }

    function editItemValor()
    {
        $data = $_REQUEST;

        $responseData = $this->PresupuestoModel->updateItemValor($data);

        echo $responseData;
    }

    function getDataPresupuesto()
    {
        $id_presupuesto = $_REQUEST['idPresupuesto'];

        $responseData['nombre'] = $this->PresupuestoModel->getNombrePresupuestoById($id_presupuesto);
        $responseData['items'] = $this->PresupuestoModel->selectItemsPresupuesto($id_presupuesto);
        $responseData['descuento'] = $this->PresupuestoModel->selectDataPresupuesto($id_presupuesto);
        $responseData['subtotal'] = $this->PresupuestoModel->selectSubtotalPresupuesto($id_presupuesto);

        $subtotal = $responseData['subtotal'];
        $descuento = $responseData['descuento'][0]['descuento'];
        $total = $subtotal - ($subtotal * ($descuento /100));

        $responseData['total'] = "$".number_format($total, "0", ",", ".");
        $responseData['subtotal_format'] = "$".number_format($responseData['subtotal'], "0", ",", ".");

        echo json_encode($responseData);
    }

    function getDataItemPresupuesto()
    {

        $id_item_presupuesto = $_REQUEST['idItemPresupuesto'];

        $responseData = $this->PresupuestoModel->selectDataItemPresupuesto($id_item_presupuesto);

        echo json_encode($responseData);

    }

    function editItemPresupuesto()
    {
        $data = $_REQUEST;

        $responseData = $this->PresupuestoModel->updateDataItemPresupuesto($data);

        echo json_encode($responseData);
    }

    function getDataItemsPresupuesto()
    {
        $id_presupuesto = $_REQUEST['idPresupuesto'];

        $responseData = $this->PresupuestoModel->selectItemsPresupuesto($id_presupuesto);

        echo json_encode($responseData);
    }

}
