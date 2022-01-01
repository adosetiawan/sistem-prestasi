<?php
    require_once '../../library/cart.php';
    $cart = new Cart;
    $method = $_SERVER['REQUEST_METHOD'];
    $dirUpload = "../../assets/upload/img/";
    if($method == 'POST'){
        $namaFile = $_FILES['uploadFile']['name'];
        $namaSementara = $_FILES['uploadFile']['tmp_name'];
        $uniq =  uniqid();
        $itemData = array( 
            'id' =>$uniq, 
            'name' => $namaFile, 
            'price' => $_FILES['uploadFile']['size'], 
            'qty' => 1 
        ); 
        $cart->insert($itemData);
        $dirUpload = "../../assets/upload/img/";
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        if ($terupload) {  
            $res['pesan'] = 'File berhasil diupload';
            $res['status'] = true;
            $res['file'] = array(
                'name'=>$namaFile,
                'size'=>$_FILES['uploadFile']['size'],
                'id'=> $uniq,
                'url'=>'../assets/upload/img/'.$namaFile,
            );
        } else {
            $res['pesan'] = 'File gagal diupload';
            $res['status'] = false;
            $res['file'] = array();
        }
    }elseif($method == 'DELETE'){
        $sessionid = null;
        foreach($cart->contents() as $index => $temp){
            if(in_array($_GET['filename'],$temp)){
                $sessionid = $index;
            }
        }
        if($cart->remove($sessionid)){
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

    echo json_encode($res);
    exit;
?>