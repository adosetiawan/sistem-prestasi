<?php
include '../../config/koneksi.php';
include '../../config/session.php';
    if(isset($_FILES)&&isset($_GET['prsid'])){
        $method = $_SERVER['REQUEST_METHOD'];
        $dirUpload = "../../assets/upload/img/";
        if($method == 'POST'){
            $namaFile = $_FILES['uploadFile']['name'];
            $namaSementara = $_FILES['uploadFile']['tmp_name'];
            $size = $_FILES['uploadFile']['size'];
            $prsid=$_GET['prsid'];
            $file = 'INSERT INTO `tb_prestasi_file` (`prs_file_prsid`, `prs_file_nama`, `prs_file_size`, `prs_file_extension`,`prs_file_date`) VALUES ("'.$prsid.'", "'.$namaFile.'", "'.$size.'", "'.pathinfo($namaFile,FILEINFO_EXTENSION).'","'.DATE('Y-m-d').'")';
            $eksekusi = mysqli_query($koneksi,$file);
            if($eksekusi){
                $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
                if ($terupload) {
                    $res['pesan'] = 'File berhasil diupload';
                    $res['status'] = true;
                } else {
                    $res['pesan'] = 'File gagal diupload';
                    $res['status'] = false;
                }
            }else{
                $res['pesan'] = 'Gagal menyimpan file';
                $res['status'] = false;
            }
        }elseif($method == 'DELETE'){
        $delete = 'DELETE FROM tb_prestasi_file WHERE prs_file_id = "'.$_GET['fileid'].'"';
          $eksekusi = mysqli_query($koneksi,$delete);
          if($eksekusi){
            if(unlink($dirUpload.$_GET['filename'])){
                $res['pesan'] = 'File berhasil di hapus';
                $res['status'] = true;
             }else{
                $res['pesan'] = 'File gagal di hapus';
                $res['status'] = false;
             }
          }else{
            $res['pesan'] = 'Data gagal di hapus';
            $res['status'] = false;
          }
        }
    }else{
        $res['pesan'] = 'Inputan ditolak';
        $res['status'] = false;
    }

    echo json_encode($res);
    exit;
?>