<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use LZCompressor\LZString as LZString;

require __DIR__ . './vendor/autoload.php';


$app = AppFactory::create();
$app->setBasePath('/jknapi');
date_default_timezone_set("Asia/Jakarta");



/*--------------ROUTING--------------------*/
/*------- START referensi/ERENSI -----------------*/
$app->post('/referensi/diagnosa', 'refDiagnosa'); //data: diagnosa
$app->post('/referensi/poli', 'refPoli'); //data: klinik
$app->post('/referensi/faskes', 'refFaskes');
$app->post('/referensi/DPJP', 'refDPJP');
$app->post('/referensi/propinsi', 'refPropinsi');
$app->post('/referensi/kabupaten', 'refKabupaten');
$app->post('/referensi/kecamatan', 'refKecamatan');
$app->post('/referensi/diagnosaProgramPRB', 'refDiagnosaProgramPRB');
$app->post('/referensi/obatGenerikProgramPRB', 'refObatGenerikProgramPRB');
$app->post('/referensi/procedurePKS', 'refProcedurePKS');
$app->post('/referensi/kelasRawatPKS', 'refKelasRawatPKS');
$app->post('/referensi/dokterPKS', 'refDokterPKS');
$app->post('/referensi/spesialistikPKS', 'refSpesialistikPKS');
$app->post('/referensi/ruangRawatPKS', 'refRuangRawatPKS');
$app->post('/referensi/caraKeluarPKS', 'refCaraKeluarPKS');
$app->post('/referensi/pascaPulangPKS', 'refPascaPulangPKS');
/*------- END referensi/ERENSI -----------------*/
/*------- START PESERTA -----------------*/
$app->post('/peserta/byNokartu', 'caribynokartu');
$app->post('/peserta/byNik', 'caribynik');
/*------- END PESERTA -----------------*/
/*------- START SEP -----------------*/
$app->post('/sep/insertSEP', 'insertSEP');
$app->post('/sep/updateSEP', 'updateSEP');
$app->post('/sep/deleteSEP', 'deleteSEP'); 
$app->post('/sep/JasaRaharja/Suplesi', 'jasaRaharjaSuplesi'); //Req nokartu
$app->post('/sep/JasaRaharja/DIK', 'jasaRaharjaDIK'); //Req nokartu
$app->post('/sep/pengajuanSEP', 'pengajuanSEP'); 
$app->post('/sep/approvalSEP', 'approvalSEP'); 
$app->post('/sep/updateTglPulang', 'updateTglPulang'); 
$app->post('/sep/sepInternal', 'sepInternal'); 
$app->post('/sep/hapusSepInternal', 'hapusSepInternal'); 
$app->post('/sep/getFinger', 'getFinger'); 
/*------- END SEP -----------------*/

/*------- START RENCANA KONTROL -----------------*/
$app->post('/rencanaKontrol/insert', 'rencanaKontrol'); 
$app->post('/rencanaKontrol/update', 'updateRencanaKontrol'); 
$app->post('/rencanaKontrol/hapus', 'hapusRencanaKontrol'); 
$app->post('/rencanaKontrol/insertSPRI', 'SPRI'); 
$app->post('/rencanaKontrol/updateSPRI', 'updateSPRI'); 
$app->post('/rencanaKontrol/cariSEP', 'rencanaKontrolCariSEP'); 
$app->post('/rencanaKontrol/cariNoSurat', 'getRencanaKontrol'); 
$app->post('/rencanaKontrol/list', 'listRencanaKontrol'); 
$app->post('/rencanaKontrol/poli', 'dataPoliRencanaKontrol'); 
$app->post('/rencanaKontrol/dokter', 'dataDokterRencanaKontrol'); 
/*------- END RENCANA KONTROL -----------------*/

/*------- START RUJUKAN -----------------*/
$app->post('/rujukan/rujukanfaskesbynomor', 'rujukanFaskes'); 
$app->post('/rujukan/rujukanRSbynomor', 'rujukanRS'); 
$app->post('/rujukan/rujukanTerbaruByNoKarFaskes', 'rujukanTerbaruByNoKarFaskes'); 
$app->post('/rujukan/rujukanTerbaruByNoKarRS', 'rujukanTerbaruByNoKarRS'); 
$app->post('/rujukan/listRujukanByNoKarFaskes', 'listRujukanByNoKarFaskes'); 
$app->post('/rujukan/listRujukanByNoKarRS', 'listRujukanByNoKarRS'); 
$app->post('/rujukan/insert', 'rujukan'); 
$app->post('/rujukan/update', 'updateRujukan'); 
$app->post('/rujukan/listSpesialistikRujukan', 'listSpesialistikRujukan'); 
$app->post('/rujukan/listSaranaRujukan', 'listSaranaRujukan'); 
$app->post('/rujukan/rujukanKhusus', 'rujukanKhusus'); 
$app->post('/rujukan/deleteRujukanKhusus', 'deleteRujukanKhusus'); 
$app->post('/rujukan/listRujukanKhusus', 'listRujukanKhusus'); 
/*------- END RUJUKAN -----------------*/













/*--------------ROUTING--------------------*/
$app->run();

?>