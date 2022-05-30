<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
    switch($page){
        case '':
            include "dashboard.php";
            break;
        case'karyawan':
            include "karyawan/karyawan.php";
            break;
        case 'karyawancreate':
            include "karyawan/karyawancreate.php";
            break;
        case 'karyawanupdate':
            include "karyawan/karyawanupdate.php";
            break;
        case 'karyawandelete':
            include "karyawan/karyawandelete.php";
            break;
        case'bagian':
            include "dataobat/dataobat.php";
            break;
        case'dataobatcreate':
            include "dataobat/dataobatcreate.php";
            break;
        case'dataobatupdate':
            include "dataobat/dataobatupdate.php";
            break;
            case'dataobatdelete':
                include "dataobat/dataobatdelete.php";
                break;
         default:
        include "dashboard.php";
        break;
    }
}else {
    include "dashboard.php";
}
?>