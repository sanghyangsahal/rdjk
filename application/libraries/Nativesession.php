<?php
if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

class Nativesession{
    public function __construct(){
        #session_start();
    }

    public function set( $key, $value ){
        $_SESSION[$key] = $value;
    }

    public function get( $key ){
        return isset( $_SESSION[$key] ) ? $_SESSION[$key] : null;
    }

    public function regenerateId( $delOld = false ){
        session_regenerate_id( $delOld );
    }

    public function delete( $key ){
        unset( $_SESSION[$key] );
    }

    public function freeSession(){
        try {
            session_unset();
            session_destroy();
            session_write_close();
            setcookie(session_name(),'',0,'/');
            session_regenerate_id(true);
        } catch (Exception $e) {
        }
    }

    public function set_flash_session( $key, $value ){
        $_SESSION[$key] = $value;
    }

    public function is_flash_session( $key ){
        $result = isset( $_SESSION[$key] ) ? TRUE : FALSE;
        return $result;
    }

    public function get_flash_session( $key ){
        $result = isset( $_SESSION[$key] ) ? $_SESSION[$key] : null;
        $this->delete($key);
        return $result;
    }

    public function isStatusPihak(){
        return isset( $_SESSION['is_status_pihak'] ) ? $_SESSION['is_status_pihak'] : FALSE;
    }

    // Modifikasi oleh Roy 
    // Tanggal 29 Nop 2015
    // Menambah Id Jenis Perkara dan Jenis Pengadilan
    // Khusus untuk mengubah sebutan para pihak di perkara Cerai Talak Peradilan Agama
    public function getStatusPihak($idtahapan,$idalurperkara,$pihakke,$idjenisperkara=0){
        $status = isset( $_SESSION['var_'.$idtahapan] ) ? $_SESSION['var_'.$idtahapan] : null;
        if(isset($status[$idalurperkara][$pihakke])){
            if($idalurperkara==15 AND $idjenisperkara==346 AND $idtahapan==10){
                $sebutan = '';
                switch($pihakke){
                    case 1  : $sebutan = 'Pemohon'; 
                              break;
                    case 2  : $sebutan = 'Termohon';
                              break;
                    case 4  : $sebutan = 'Turut Termohon';
                              break;
                    case 7  : $sebutan = 'Kuasa Hukum Pemohon';
                              break;
                    case 8  : $sebutan = 'Kuasa Hukum Termohon';
                              break;
                    case 10 : $sebutan = 'Kuasa Hukum Turut Termohon';
                              break;
                    default : $sebutan = $status[$idalurperkara][$pihakke];
                }
                return $sebutan;
            }else{
                return $status[$idalurperkara][$pihakke];
            }
        }else{
            return '<font color="red">Error, Pihak Not Found!!! Please Re-Login</font>';
        }
    }

    public function isLangguage(){
        return isset( $_SESSION['is_langguage'] ) ? $_SESSION['is_langguage'] : FALSE;
    }

    public function getLangguage($istilah){
        $status = isset( $_SESSION[$istilah] ) ? $_SESSION[$istilah] : null;
        if(!empty($status)){
            return $status;
        }else{
            return '<font color="red">Error, Langguage Not Found!!! Please Re-Login</font>';
        }
    }
}
?>