<?php

namespace App\Controllers;
use App\Models\M_model;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{
public function index() 
{
 if (!session()->get('id_user') > 0) {
 return redirect()->to('/Home/login');
 }
 $model =new M_model;
echo view ('template/header');
echo view ('navbar');
echo view ('dashboard');




}
public function hal()
{

    $model = new M_model;
    echo view ('template/header');
    echo view ('navbar');
    echo view ('hal/index');
    echo view ('template/footer');
    
    }
    public function hapus_barang($id)
  {
        $model=new M_model();
        $where=array('id'=>$id);
        $model->hapus('barang',$where);
        return redirect()->to('Home/barang'); 
  }
  public function hapuslap($id)
  {
        $model=new M_model();
        $where=array('id_Cart'=>$id);
        $model->hapus('laporan',$where);
        return redirect()->to('Home/laporan'); 
  }
    public function laporan()
    {
        $model = new M_model;
        echo view ('template/header');
        echo view ('navbar');
        echo view ('hal/laporan');
        // echo view ('template/footer');
    }
    public function edit()
    {
        $model = new M_model;
        echo view ('template/header');
        echo view ('navbar');
        echo view ('edit');
        //  echo view ('template/footer');
    }
    public function delete()
    {
        $model = new M_model;
        echo view ('template/header');
        echo view ('navbar');
        echo view ('delete');
        //  echo view ('template/footer');
    }
    public function hapus_laporan($d)
    {
      
        $model=new M_model();
        $where=array('id_cart'=>$d);
        $model->hapus('hal/laporan',$where);
        return redirect()->to('home/laporan'); 
       
}      
public function laporanku()
{
    $model = new M_model;
    echo view ('template/header');
    echo view ('navbar');
    echo view ('laporan');
}

public function barang()
{

$model = new M_model;
echo view ('template/header');
echo view ('navbar');
echo view ('barang/barang');
echo view ('template/footer');
}

public function setting()
{

$model = new M_model;
echo view ('template/header');
echo view ('navbar');
echo view ('setting/pengaturan');
echo view ('template/footer');
}
 public function login()
    { 

        if (session()->get('id_user') > 0) {
             return redirect()->to('/Home');
         }
       echo view('template/header');
       echo view('login');
       //print_r(session()->get());
    //    echo view('template/footer');        

    }
    public function aksi_login()
    {
        $u=$this->request->getPost('u');
        $p=$this->request->getPost('p');
        $where=array(
            'username'=>$u,
            'password'=>md5($p)
        );
        $model = new M_model();
        $kui=$model->getarray('user',$where);

        if ($kui>0) {
            session()->set('id_user',$kui['id_user']);
            session()->set('username',$kui['username']);
           
            return redirect()->to('/home');
        }else{
            return redirect()->to('Home/login');
        }
    }  


 public function keluar()
    {
        session()->destroy();
        return redirect()->to('Home/login');
    }
    //======================================== U S E R =================//
    public function user()
    {
    $level=session()->get('level');
    if ($level == 1 ) {
    $model=new M_model();
    $kui['gas']=$model->tampil('user');
    echo view('header');
    echo view('navbar');
    echo view('user',$kui);
    echo view('footer');
    }else{
    return redirect()->to('Home/login');
}
    }
    public function tambah_user()
    {
        $level=session()->get('level');
if ($level == 1 ) {
        $model=new M_model();
        $kui['sakas']=$model->tampil('user');
        echo view('header');
        echo view('navbar');
        echo view('tambah_user',$kui);
        echo view('footer');  
        }else{
        return redirect()->to('Home/login');
}
    }
    public function aksi_u()
    {
        $level=session()->get('level');
        if ($level == 1) {
        $model=new M_model();
        $username=$this->request->getPost('username');
        $password=$this->request->getPost('password');
        $level=$this->request->getPost('level');
        $data=array(
            'username'=>$username,
            'password'=>md5($password),
            'level'=>$level,
        );
        $model->simpan('user',$data);
        return redirect()->to('/Home/user');
        }else{
        return redirect()->to('Home/login');
}

    }

    public function edit_user($id)
    {
        $level=session()->get('level');
if ($level == 1 ) {
        $model=new M_model();
        $where=array('id_user'=>$id);
        $kui['gas']=$model->getRow('user', $where);
        echo view('header');
        echo view('navbar');
        echo view('edit_user',$kui);
        echo view('footer'); 
        }else{
        return redirect()->to('Home/login');
}
} 
    public function hapus_user($id)
    {
        $level=session()->get('level');
        if ($level == 1 ) {
        $model=new M_model();
        $where=array('id_user'=>$id);
        $model->hapus('user',$where);
        return redirect()->to('Home/user'); 
        }else{
        return redirect()->to('Home/login');
}  
    }
   

   
 
    // ----------------------------------------------- T I P E
    public function tipe()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        $model=new M_model();
        $kui['gas']=$model->tampil('tipe');
        echo view('header');
        echo view('navbar');
        echo view('tipe',$kui);
        echo view('footer');
        }else{
        return redirect()->to('Home/login');
}
    }
    public function tambah_tipe()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        $model=new M_model();
        $kui['gas']=$model->tampil('tipe');
        // $kui['gas']=$model->getarray_f('tipe', $where);
        echo view('header');
        echo view('navbar');
        echo view('tambah_tipe',$kui);
        echo view('footer');  
        }else{
        return redirect()->to('Home/login');
}
    }
        public function aksi_tipe()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        $model=new M_model();
        $nama=$this->request->getPost('nama');
        $data=array(
            'tipe_hewan'=>$nama,
        );
        $model->simpan('tipe',$data);
        return redirect()->to('/Home/tipe');
}else{
        return redirect()->to('Home/login');
}
    }

    public function edit_tipe($id)
    {
        $level=session()->get('level');
if ($level == 1 || $level == 2) {
        $model=new M_model();
        $where=array('id_tipe'=>$id);
        $kui['gas']=$model->getRow('tipe', $where);
        echo view('header');
        echo view('navbar');
        echo view('edit_tipe',$kui);
        echo view('footer');  
        }else{
        return redirect()->to('Home/login');
}
    }

        
    public function hapus_tipe($id)
    {
        $level=session()->get('level');
if ($level == 1 || $level == 2) {
        $model=new M_model();
        $where=array('id_tipe'=>$id);
        $model->hapus('tipe',$where);
        return redirect()->to('Home/tipe'); 
        }else{
        return redirect()->to('Home/login');
}  
    }




    //----------------------------------- L A P O R A N ---------------------------///
    public function laporan_pembayaran ()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        // if (session()->get('id_user')>0){
        $model=new M_model();
        echo view('header');
        echo view('navbar');
        $data['kunci']='view_pembayaran';
        echo view('filter',$data);
        echo view('footer');
        }else{
        return redirect()->to('home/login');
    }
    }

    public function cari_pembayaran ()
    {
        $level=session()->get('level');
if ($level == 1 || $level == 2) {
        //if (session()->get('id_user')>0){
        $model=new M_model();
        $awal=$this ->request->getPost('awal');
        $akhir=$this ->request->getPost('akhir');
        $data['okta']=$model ->filter2('pembayaran',$awal,$akhir);
        $img = file_get_contents(
           'C:\xampp\htdocs\in\public\image\kop_surat_ph.jpg');
            $data['foto'] = base64_encode($img);
         echo view ('c_p',$data);
         }else{
        return redirect()->to('home/login');
    }
    }
    public function pdf_pembayaran()
    {
    $level=session()->get('level');
    if ($level == 1 || $level == 2) {
        $model = new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data['okta']=$model->filter2('pembayaran',$awal,$akhir);
        $img = file_get_contents(
        'C:\xampp\htdocs\in\public\image\kop_surat_ph.jpg');
        $data['foto'] = base64_encode($img);
        $dompdf = new\Dompdf\Dompdf();
        // $dompdf->set_option('isRemoteEnabled',TRUE);
        $dompdf->loadHtml(view('c_p',$data));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>0));
     }else{
    return redirect()->to('home/login');
}

    }

    public function excel_pembayaran()
    {
    // if(session()->get('level')== 2) {

    $model=new M_model();
    $awal= $this->request->getPost('awal');
    $akhir= $this->request->getPost('akhir');
    $data=$model->filter2('pembayaran',$awal,$akhir);

    $spreadsheet=new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Nama Pasien')
    ->setCellValue('B1', 'Tanggal Bayar')
    ->setCellValue('C1', 'Jumlah Bayar');    
    // ->setCellValue('C1', 'Jarak')
    // // ->setCellValue('D1', 'Due Date')
    // ->setCellValue('D1', 'Suhu')
    // ->setCellValue('E1', 'Tanggal Perjalanan');

    $column=2;

    foreach($data as $data){

        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'. $column, $data->kode_psn)
        ->setCellValue('B'. $column, $data->tanggal_byr)
        ->setCellValue('C'. $column, $data->jumlah_byr);        
        // ->setCellValue('C'. $column, $data->jarak)
        // // ->setCellValue('D'. $column, $data->tgl_jatuh_tempo)
        // ->setCellValue('D'. $column, $data->suhu)
        // ->setCellValue('E'. $column, $data->tanggal_perjalanan);

        // $total += $data->jumlah_gaji;

        $column++;
    }
    $writer = new XLsx($spreadsheet);
    $fileName = 'Pembayaran';

    header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition:attachment;filename='.$fileName.'.xls');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    // }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }
    //==================================================
    public function lbarang ()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        // if (session()->get('id_user')>0){
        $model=new M_model();
        echo view('header');
        echo view('navbar');
        $data['kunci']='view_b';
        echo view('filter',$data);
        echo view('footer');
        }else{
        return redirect()->to('home/login');
    }
    }

public function lcatat ()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        // if (session()->get('id_user')>0){
        $model=new M_model();
        echo view('header');
        echo view('navbar');
        $data['kunci']='view_catat';
        echo view('filter',$data);
        echo view('footer');
        }else{
        return redirect()->to('home/login');
    }
    }


    public function lbm ()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        //if (session()->get('id_user')>0){
        $model=new M_model();
        echo view('header');
        echo view('navbar');
        $data['kunci']='view_bm';
        echo view('filter',$data);
        echo view('footer');
        }else{
        return redirect()->to('home/login');
    }
    }
public function lp ()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        //if (session()->get('id_user')>0){
        $model=new M_model();
        echo view('header');
        echo view('navbar');
        $data['kunci']='view_trans';
        echo view('filter',$data);
        echo view('footer');
        }else{
        return redirect()->to('home/login');
    }
    }  
    //--------------------------------------------[ C A R I ]--------------------------------//
    public function cari_b ()
    {
        $level=session()->get('level');
if ($level == 1 || $level == 2) {
        //if (session()->get('id_user')>0){
        $model=new M_model();
        $awal=$this ->request->getPost('awal');
        $akhir=$this ->request->getPost('akhir');
        $data['okta']=$model ->filter2('barang',$awal,$akhir);
        $img = file_get_contents(
           'C:\xampp\htdocs\acc\public\image\kop_surat_ph.jpg');
            $data['foto'] = base64_encode($img);
         echo view ('cb',$data);
         }else{
        return redirect()->to('home/login');
    }
    }
        public function cari_c ()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        //if (session()->get('id_user')>0){
        $model=new M_model();
        $awal=$this ->request->getPost('awal');
        $akhir=$this ->request->getPost('akhir');
        $data['okta']=$model ->filter2('pencatatan',$awal,$akhir);
        $img = file_get_contents(
            'C:\xampp\htdocs\in\public\image\kop_surat_ph.jpg');
            $data['foto'] = base64_encode($img);
         echo view ('cp',$data);
         }else{
        return redirect()->to('home/login');
    }
    }
    public function cari_bm ()
    {
        $level=session()->get('level');
if ($level == 1 || $level == 2) {
            //if (session()->get('id_user')>0){
        $model=new M_model();
        //$on=('cari_bm.id_barang=barang.id_barang');
        $awal=$this ->request->getPost('awal');
        $akhir=$this ->request->getPost('akhir');
        $data['okta']=$model ->filter2('barang',$awal,$akhir);
        $img = file_get_contents(
            'C:\xampp\htdocs\in\public\image\kop_surat_ph.jpg');
            $data['foto'] = base64_encode($img);
        echo view('c_bm',$data);
        }else{
        return redirect()->to('home/login');
    }
    }
    public function cari_p ()
    {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
                 //if (session()->get('id_user')>0){
        $model=new M_model();
        $awal=$this ->request->getPost('awal');
        $akhir=$this ->request->getPost('akhir');
        $data['okta']=$model ->filter3('barang',$awal,$akhir);
        $img = file_get_contents(
            'C:\xampp\htdocs\in\public\image\kop_surat_ph.jpg');
            $data['foto'] = base64_encode($img);
        echo view('c_penj',$data);
}else{
        return redirect()->to('home/login');
    }
    }
    // ---------------------------------------------------- [   Pdf File   ]

 public function pdf_p()
        {
        $level=session()->get('level');
        if ($level == 1 || $level == 2) {
            $model = new M_model();
            $awal= $this->request->getPost('awal');
            $akhir= $this->request->getPost('akhir');
            $data['okta']=$model->filter3('barang',$awal,$akhir);
            $img = file_get_contents(
            'C:\xampp\htdocs\in\public\image\kop_surat_ph.jpg');
            $data['foto'] = base64_encode($img);
            $dompdf = new\Dompdf\Dompdf();
            // $dompdf->set_option('isRemoteEnabled',TRUE);
            $dompdf->loadHtml(view('c_penj',$data));
            $dompdf->setPaper('A4','landscape');
            $dompdf->render();
            $dompdf->stream('my.pdf', array('Attachment'=>0));
         }else{
        return redirect()->to('home/login');
    }

        }
        
public function pdf_c()
        {
                    $level=session()->get('level');
                    if ($level == 1 || $level == 2) {
            $model = new M_model();
            $awal= $this->request->getPost('awal');
            $akhir= $this->request->getPost('akhir');
            $data['okta']=$model->filter3('pencatatan',$awal,$akhir);
            $img = file_get_contents(
            'C:\xampp\htdocs\in\public\image\kop_surat_ph.jpg');
            $data['foto'] = base64_encode($img);
            $dompdf = new\Dompdf\Dompdf();
            // $dompdf->set_option('isRemoteEnabled',TRUE);
            $dompdf->loadHtml(view('cp',$data));
            $dompdf->setPaper('A4','landscape');
            $dompdf->render();
            $dompdf->stream('my.pdf', array('Attachment'=>0));
         }else{
        return redirect()->to('home/login');
    }

        }

        public function pdf_b()
        {
                    $level=session()->get('level');
        if ($level == 1 || $level == 2) {
            $model = new M_model();
            $awal= $this->request->getPost('awal');
            $akhir= $this->request->getPost('akhir');
            $data['okta']=$model->filter2('barang',$awal,$akhir);
            $img = file_get_contents(
            'C:\xampp\htdocs\in\public\image\kop_surat_ph.jpg');
            $data['foto'] = base64_encode($img);
            $dompdf = new\Dompdf\Dompdf();
            // $dompdf->set_option('isRemoteEnabled',TRUE);
            $dompdf->loadHtml(view('cb',$data));
            $dompdf->setPaper('A4','landscape');
            $dompdf->render();
            $dompdf->stream('my.pdf', array('Attachment'=>0));
         }else{
        return redirect()->to('home/login');
    }

        }
        public function pdf_bm()
        {
                    $level=session()->get('level');
        if ($level == 1 || $level == 2) {
            $model = new M_model();
            $awal= $this->request->getPost('awal');
            $akhir= $this->request->getPost('akhir');
            $data['okta']=$model->filter2('barang',$awal,$akhir);
            $img = file_get_contents(
            'C:\xampp\htdocs\in\public\image\kop_surat_ph.jpg');
            $data['foto'] = base64_encode($img);
            $dompdf = new\Dompdf\Dompdf();
            // $dompdf->set_option('isRemoteEnabled',TRUE);
            $dompdf->loadHtml(view('c_bm',$data));
            $dompdf->setPaper('A4','landscape');
            $dompdf->render();
            $dompdf->stream('my.pdf', array('Attachment'=>0));
         }else{
        return redirect()->to('home/login');
    }

        }


// ---------------------------------------------------- [   Excel File   ]
public function excel_barang()
{
            $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data=$model->filter2('barang',$awal,$akhir);
        

        $spreadsheet=new Spreadsheet();
        
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nama Barang')
        ->setCellValue('B1', 'Kode Barang')
        ->setCellValue('C1', 'Kondisi')
        ->setCellValue('D1', 'Stok')
        ->setCellValue('E1', 'Tanggal');
        $column=2;
        
        foreach($data as $data){
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'. $column, $data->nama_barang)
            ->setCellValue('B'. $column, $data->kode_barang)
            ->setCellValue('C'. $column, $data->kondisi)
            ->setCellValue('D'. $column, $data->stok)
            ->setCellValue('E'. $column, $data->tanggal);
            $column++;
        }

        $writer = new XLsx($spreadsheet);
        $fileName = 'Data Laporan Barang';

        
        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename='.$fileName.'.xls');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
         }else{
        return redirect()->to('home/login');
    }

}
public function excel_c()
{
            $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data=$model->filter2('pencatatan',$awal,$akhir);
        

        $spreadsheet=new Spreadsheet();
        
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nama Barang')
        ->setCellValue('B1', 'Jumlah Rusak')
        ->setCellValue('C1', 'Jumlah Baik')
        ->setCellValue('D1', 'Keterangan')
        ->setCellValue('E1', 'Tanggal Pencatatan');
        $column=2;
        
        foreach($data as $data){
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'. $column, $data->nama_barang)
            ->setCellValue('B'. $column, $data->jumlah_rusak)
            ->setCellValue('C'. $column, $data->jumlah_baik)
            ->setCellValue('D'. $column, $data->kondisi)
            ->setCellValue('E'. $column, $data->tanggal);
            $column++;
        }

        $writer = new XLsx($spreadsheet);
        $fileName = 'Data Laporan Pencatatan';

        
        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename='.$fileName.'.xls');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
         }else{
        return redirect()->to('home/login');
    }

}

public function excel_barangmasuk()
{
            $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data=$model->filter3('barangmasuk',$awal,$akhir);
        

        $spreadsheet=new Spreadsheet();
        
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nama Barang')
        ->setCellValue('B1', 'Kondisi')
        ->setCellValue('C1', 'Stok Masuk')
        ->setCellValue('D1', 'Tanggal Masuk');

        $column=2;
        
        foreach($data as $data){
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'. $column, $data->id_barang)
            ->setCellValue('B'. $column, $data->kondisi)
            ->setCellValue('C'. $column, $data->stokmasuk)
            ->setCellValue('D'. $column, $data->tanggal);
            $column++;
        }
        
        $writer = new XLsx($spreadsheet);
        $fileName = 'Data Laporan Barang Masuk';

        
        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename='.$fileName.'.xls');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
         }else{
        return redirect()->to('home/login');
    }

}
public function excel_p()
{
            $level=session()->get('level');
        if ($level == 1 || $level == 2) {
        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $data=$model->filter4('barangkeluar',$awal,$akhir);
    

        $spreadsheet=new Spreadsheet();
        
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nama Barang')
        ->setCellValue('B1', 'Kondisi')
        ->setCellValue('C1', 'Stok Keluar')
        ->setCellValue('D1', 'Tanggal Keluar');
        
        $column=2;
        
        foreach($data as $data){
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'. $column, $data->id_barang)
            ->setCellValue('B'. $column, $data->kondisi)
            ->setCellValue('C'. $column, $data->stokkeluar)
            ->setCellValue('D'. $column, $data->tanggal);
            $column++;
        }
        
        $writer = new XLsx($spreadsheet);
        $fileName = 'Data Laporan Barang Keluar';
        header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename='.$fileName.'.xls');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
         }else{
        return redirect()->to('home/login');
    }

}


}