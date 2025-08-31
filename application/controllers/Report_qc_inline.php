<?php


// $s_start = $this->input->get('s_start');
// $s_end = $this->input->get('s_end');
// $s_model_id = $this->input->get('s_model_id');
// $s_shift = $this->input->get('s_shift');
// $s_judgment = $this->input->get('s_judgement');
// $products = $this->M_report->tampil_data_where('products', array('active' => 1))->result_array();
// $w_shift = '';
// $g_shift = '';
// if ($s_shift != '') {
//     $w_shift = "AND a.shift = '$s_shift' ";
// }
// $w_model_id = '';
// if ($s_model_id != '') {
//     $w_model_id = "AND b.no = '$s_model_id'";
// }
// $w_date = '';
// $tomorrow = date('Y-m-d', strtotime('+1 day', strtotime($s_end)));
// if ($s_shift == 'D') {
//     $w_date = "DATE(a.process_date) >= '$s_start' AND DATE(a.process_date) <= '$s_end'";
//     $g_shift = ",a.shift";
// } else if ($s_shift == 'N') {
//     $w_date = "a.process_date >= '$s_start 20:00:00' AND a.process_date <= '$tomorrow 07:10:00'";
//     $g_shift = ",a.shift";
// } else {
//     $w_date = "a.process_date >= '$s_start 07:10:00' AND a.process_date <= '$tomorrow 07:10:00'";
// }


// $w_judgement = '';
// if ($s_judgment != '') {
//     if ($s_judgment == 'OK') {
//         $w_judgement = "AND a.judgement = 1";
//     } elseif ($s_judgment == 'NG') {
//         $w_judgement = "AND a.judgement = 0";
//     }
// }


// if ($w_shift != '') {
//     $group_product = $this->M_report->_query("SELECT b.`no`,b.hb_image, b.name AS product_name, a.product_id, a.shift FROM v_hb_history AS a
//         LEFT JOIN products AS b ON b.id =  a.product_id
//         WHERE $w_date $w_shift $w_model_id $w_judgement
//         GROUP BY a.product_id $g_shift")->result_array();
// } else {
//     $group_product = $this->M_report->_query("SELECT b.`no`,b.hb_image, b.name AS product_name, a.product_id FROM v_hb_history AS a
//         LEFT JOIN products AS b ON b.id =  a.product_id
//         WHERE $w_date $w_model_id $w_judgement
//         GROUP BY a.product_id")->result_array();


//     // echo $this->db->last_query();
//     // exit;
// }
defined('BASEPATH') or exit('No direct script access allowed');
class Report_qc_inline extends CI_Controller
{
    function __construct()
    {
        parent::__construct();


        $this->load->model('M_report');
    }


    public function index()
    {


        // $menu_permissions_url = $this->session->userdata('menu_permissions_url');
        // $current_url = $this->uri->uri_string(); // Menghasilkan "admin/dashboard"  
        // $can_add = 1;
        // if (!empty($menu_permissions_url[$current_url])) {
        //     if (!$menu_permissions_url[$current_url]['can_add']) {
        //         $can_add = 0;
        //     }
        // }




        $s_start = $this->input->get('s_start');         // Tanggal mulai
        $s_end = $this->input->get('s_end');             // Tanggal akhir
        $s_model_id = $this->input->get('s_model_id');     // Nomor part
        $s_shift = $this->input->get('s_shift');


        $tb_process_cylinder_head = $this->M_report->tampil_data('tb_process_cylinder_head')->result_array();


        // $tb_process_cylinder_head = $this->M_report->tampil_data_where('tb_process_cylinder_head', array('active' => 1))->result_array();
        $w_shift = '';
        $g_shift = '';
        if ($s_shift != '') {
            $w_shift = "AND shift = '$s_shift' ";
        }
        $w_model_id = '';
        if ($s_model_id != '') {
            $w_model_id = "'$s_model_id'";
        }
        $w_date = '';
        $tomorrow = date('Y-m-d', strtotime('+1 day', strtotime($s_end)));
        if ($s_shift == 'D') {
            $w_date = "DATE(process_date) >= '$s_start' AND DATE(process_date) <= '$s_end'";
            $g_shift = ",shift";
        } else if ($s_shift == 'N') {
            $w_date = "process_date >= '$s_start 20:00:00' AND process_date <= '$tomorrow 07:10:00'";
            $g_shift = ",shift";
        } else {
            $w_date = "process_date >= '$s_start 07:10:00' AND process_date <= '$tomorrow 07:10:00'";
        }


        if ($w_shift != '') {
            // $group_product = $this->M_report->_query("SELECT b.`model_id`,b.hb_image, b.name AS product_name, a.product_id, a.shift FROM v_hb_history AS a
            //     LEFT JOIN products AS b ON b.id =  a.product_id
            //     WHERE $w_date $w_shift $w_part_no
            //     GROUP BY a.product_id $g_shift")->result_array();


            $group_product = $this->M_report->_query("SELECT * FROM tb_process_cylinder_head  WHERE $w_date $w_shift $w_model_id  GROUP BY charging_date $g_shift")->result_array();
        } else {
            // $group_product = $this->M_report->_query("SELECT b.`no`,b.hb_image, b.name AS product_name, a.product_id FROM v_hb_history AS a
            //     LEFT JOIN products AS b ON b.id =  a.product_id
            //     WHERE $w_date $w_part_no
            //     GROUP BY a.product_id")->result_array();


            $group_product = $this->M_report->_query("SELECT * FROM tb_process_cylinder_head  WHERE $w_date $w_model_id GROUP BY charging_date")->result_array();


            //     //     // echo $this->db->last_query();
            //     //     // exit;
        }


        $data = array(
            // 'title_bar'          => 'Quality Control ',
            // 'title'              => 'Quality Control ', //H4
            // 'br_title'           => $this->uri->segment('2'), //Breadcumb
            // 'br_title_active'    => $this->uri->segment('3'), //Breadcumb
            // 'my_controller'   => $this,
            // 'current_url'       => $this->uri->uri_string(),
            // 'can_add'           => $can_add,
            'tb_process_cylinder_head' => $tb_process_cylinder_head,
            'group_product' => $group_product,
        );


        $this->load->view('quality/quality_control', $data);
    }


    // // Export to Excel
    // public function export_excel()
    // {
    //     // Load PHPExcel
    //     require_once APPPATH . 'third_party/PHPExcel/PHPExcel.php';
    //     $excel = new PHPExcel();
    //     $excel->getProperties()->setCreator('AICC WIP Ace Magang')
    //         ->setLastModifiedBy('AICC WIP Ace Magang')
    //         ->setTitle("Data HB")
    //         ->setSubject("HB")
    //         ->setDescription("Laporan Data HB")
    //         ->setKeywords("Data HB");
    //     $excel->setActiveSheetIndex(0);
    //     $sheet = $excel->getActiveSheet();
    //     $sheet->setCellValue('A1', 'No');
    //     $sheet->setCellValue('B1', 'Charging Date');
    //     $sheet->setCellValue('C1', 'Part Name');
    //     $sheet->setCellValue('D1', 'Cavity');
    //     $sheet->setCellValue('E1', 'Hardness');
    //     $sheet->setCellValue('F1', 'Katazure');
    //     $sheet->setCellValue('G1', 'Weight');
    //     $sheet->setCellValue('H1', 'Judgement');
    //     $sheet->setCellValue('I1', 'Remark');
    //     $sheet->setCellValue('J1', 'Process Date');
    //     $sheet->setCellValue('K1', 'Shift');
    //     $sheet->setCellValue('L1', 'Created At');
    //     $sheet->setCellValue('M1', 'Created Log');
    //     $sheet->setCellValue('N1', 'Updated At');
    //     $sheet->setCellValue('O1', 'Updated Log');
    //     $sheet->getStyle('A1:O1')->getFont()->setBold(true);
    //     $sheet->getStyle('A1:O1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    //     $sheet->getColumnDimension('A')->setWidth(5);
    //     $sheet->getColumnDimension('B')->setWidth(20);
    //     $sheet->getColumnDimension('C')->setWidth(20);
    //     $sheet->getColumnDimension('D')->setWidth(10);
    //     $sheet->getColumnDimension('E')->setWidth(10);
    //     $sheet->getColumnDimension('F')->setWidth(10);
    //     $sheet->getColumnDimension('G')->setWidth(10);
    //     $sheet->getColumnDimension('H')->setWidth(15);
    //     $sheet->getColumnDimension('I')->setWidth(20);
    //     $sheet->getColumnDimension('J')->setWidth(20);
    //     $sheet->getColumnDimension('K')->setWidth(10);
    //     $sheet->getColumnDimension('L')->setWidth(20);
    //     $sheet->getColumnDimension('M')->setWidth(20);
    //     $sheet->getColumnDimension('N')->setWidth(20);
    //     $sheet->getColumnDimension('O')->setWidth(20);
    //     $sheet->getStyle('A1:O1')->getAlignment()->setWrapText(true);
    //     $sheet->getStyle('A1:O1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    //     $sheet->getStyle('A1:O1')->getBorders()->getAllBorders()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
    //     $sheet->getStyle('A1:O1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    //     $sheet->getStyle('A1:O1')->getFill()->getStartColor()->setARGB('FFCCCCCC');
    //     $s_start = $this->input->get('s_start');
    //     $s_end = $this->input->get('s_end');
    //     $s_part_no = $this->input->get('s_part_no');
    //     $s_shift = $this->input->get('s_shift');
    //     $s_judgement = $this->input->get('s_judgement');
    //     $this->M_report->_where('DATE(process_date) >=', $s_start);
    //     $this->M_report->_where('DATE(process_date) <=', $s_end);
    //     if ($s_part_no != '') {
    //         $this->M_report->_where('product_id', $s_part_no);
    //     }
    //     if ($s_shift != '') {
    //         $this->M_report->_where('shift', $s_shift);
    //     }
    //     if ($s_judgement != '') {
    //         if ($s_judgement == 'OK') {
    //             $this->M_report->_where('judgement', 1);
    //         } elseif ($s_judgement == 'NG') {
    //             $this->M_report->_where('judgement', 0);
    //         }
    //     }
    //     $this->M_report->_order_by('process_date', 'DESC');
    //     $data_hb = $this->M_report->tampil_data('v_hb_history')->result_array();
    //     if (count($data_hb) > 0) {
    //         $no = 1;
    //         $row = 2;
    //         foreach ($data_hb as $a) {
    //             $sheet->setCellValue('A' . $row, $no++);
    //             $sheet->setCellValue('B' . $row, $a['charging_date']);
    //             $sheet->setCellValue('C' . $row, $a['product_name']);
    //             $sheet->setCellValue('D' . $row, $a['cav']);
    //             $sheet->setCellValue('E' . $row, $a['hardness']);
    //             $sheet->setCellValue('F' . $row, $a['katazure']);
    //             $sheet->setCellValue('G' . $row, $a['weight']);
    //             if ($a['judgement'] == 1) {
    //                 $judgement = 'OK';
    //             } else {
    //                 $judgement = 'NG';
    //             }
    //             $sheet->setCellValue('H' . $row, $judgement);
    //             $sheet->setCellValue('I' . $row, $a['remark']);
    //             $sheet->setCellValue('J' . $row, date('Y-m-d H:i:s', strtotime($a['process_date'])));
    //             $sheet->setCellValue('K' . $row, strtoupper($a['shift']));
    //             if ($a['created_at'] != '') {
    //                 $sheet->setCellValue('L' . $row, date('Y-m-d H:i:s', strtotime($a['created_at'])));
    //             } else {
    //                 $sheet->setCellValue('L' . $row, '-');
    //             }
    //             if ($a['created_log'] != '') {
    //                 $sheet->setCellValue('M' . $row, strtoupper($a['created_log']));
    //             } else {
    //                 $sheet->setCellValue('M' . $row, '-');
    //             }
    //             if ($a['updated_at'] != '') {
    //                 $sheet->setCellValue('N' . $row, date('Y-m-d H:i:s', strtotime($a['updated_at'])));
    //             } else {
    //                 $sheet->setCellValue('N' . $row, '-');
    //             }
    //             if ($a['updated_log'] != '') {
    //                 $sheet->setCellValue('O' . $row, strtoupper($a['updated_log']));
    //             } else {
    //                 $sheet->setCellValue('O' . $row, '-');
    //             }


    //             $row++;
    //         }




    //         // Summary Data Group By Per Charging Date
    //         $w_shift = '';
    //         if ($s_shift != '') {
    //             $w_shift = "AND a.shift = '$s_shift' ";
    //         }
    //         $w_part_no = '';
    //         if ($s_part_no != '') {
    //             $w_part_no = "AND b.no = '$s_part_no'";
    //         }


    //         $w_judgement = '';
    //         if ($s_judgement != '') {
    //             if ($s_judgement == 'OK') {
    //                 $w_judgement = "AND a.judgement = 1";
    //             } elseif ($s_judgement == 'NG') {
    //                 $w_judgement = "AND a.judgement = 0";
    //             }
    //         }


    //         $s_start = date('Y-m-d', strtotime($s_start));
    //         $s_end = date('Y-m-d', strtotime($s_end));


    //         $w_date = "DATE(a.process_date) >= '$s_start' AND DATE(a.process_date) <= '$s_end'";
    //         $sum_data = $this->M_report->_query("
    //             SELECT a.charging_date,
    //                 COUNT(a.id) AS qty,
    //                 SUM(CASE WHEN a.judgement = 1 THEN 1 ELSE 0 END) AS ok,
    //                 SUM(CASE WHEN a.judgement = 0 THEN 1 ELSE 0 END) AS ng
    //             FROM v_hb_history AS a
    //             WHERE $w_date $w_part_no $w_shift $w_judgement
    //             GROUP BY a.charging_date
    //             ORDER BY a.charging_date DESC
    //         ")->result_array();


    //         // Tentukan baris awal summary (misal setelah summary total OK/NG)
    //         $summary_row = $row + 4; // sesuaikan jika perlu


    //         // Judul kolom summary
    //         $sheet->setCellValue('B' . $summary_row, 'Charging Date');
    //         $sheet->setCellValue('C' . $summary_row, 'Qty');
    //         $sheet->setCellValue('D' . $summary_row, 'OK');
    //         $sheet->setCellValue('E' . $summary_row, 'NG');
    //         $sheet->getStyle('B' . $summary_row . ':E' . $summary_row)->getFont()->setBold(true);
    //         $sheet->getStyle('B' . $summary_row . ':E' . $summary_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    //         $sheet->getStyle('B' . $summary_row . ':E' . $summary_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    //         $sheet->getStyle('B' . $summary_row . ':E' . $summary_row)->getFill()->getStartColor()->setARGB('FFFF3D60');
    //         $sheet->getStyle('B' . $summary_row . ':E' . $summary_row)->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);


    //         // Isi data summary
    //         $summary_data_row = $summary_row + 1;
    //         if (count($sum_data) > 0) {
    //             foreach ($sum_data as $s) {
    //                 $sheet->setCellValue('B' . $summary_data_row, $s['charging_date']);
    //                 $sheet->setCellValue('C' . $summary_data_row, $s['qty']);
    //                 $sheet->setCellValue('D' . $summary_data_row, $s['ok']);
    //                 $sheet->setCellValue('E' . $summary_data_row, $s['ng']);
    //                 $summary_data_row++;
    //             }
    //         } else {
    //             $sheet->setCellValue('B' . $summary_data_row, 'No Data');
    //             $sheet->mergeCells('B' . $summary_data_row . ':E' . $summary_data_row);
    //             $sheet->getStyle('B' . $summary_data_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    //         }




    //         // Hitung total summary
    //         $total_qty = 0;
    //         $total_ok = 0;
    //         $total_ng = 0;
    //         foreach ($sum_data as $s) {
    //             $total_qty += $s['qty'];
    //             $total_ok += $s['ok'];
    //             $total_ng += $s['ng'];
    //         }


    //         // Baris untuk total summary
    //         $total_row = $summary_data_row + 1;


    //         $sheet->setCellValue('B' . $total_row, 'TOTAL');
    //         $sheet->setCellValue('C' . $total_row, $total_qty);
    //         $sheet->setCellValue('D' . $total_row, $total_ok);
    //         $sheet->setCellValue('E' . $total_row, $total_ng);


    //         // Style untuk total summary
    //         $sheet->getStyle('B' . $total_row . ':E' . $total_row)->getFont()->setBold(true);
    //         $sheet->getStyle('B' . $total_row . ':E' . $total_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    //         $sheet->getStyle('B' . $total_row . ':E' . $total_row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
    //         $sheet->getStyle('B' . $total_row . ':E' . $total_row)->getFill()->getStartColor()->setARGB('FFCCCCCC');




    //         // Simpan file Excel dan kirim ke browser
    //         $filename = "Data_HB_" . $s_start . "_sd_" . $s_end . ".xlsx"; // gunakan .xlsx


    //         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //         header('Content-Disposition: attachment;filename="' . $filename . '"');
    //         header('Cache-Control: max-age=0');


    //         $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007'); // gunakan $excel, bukan $objPHPExcel
    //         $objWriter->save('php://output');
    //         exit;
    //     }
    // }
}
