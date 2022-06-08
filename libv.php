<?php
/*--------------KODING--------------------*/
/* REFERENSI */
function refDiagnosa1($request, $response, $args){    
    $data = $request->getParsedBody();        
    $getCari = '/referensi/diagnosa/' . $data;
    $data = kirimws($getCari, 'GET', 0);
    $response->getBody()
        ->write($data);
    return $response;
    
}

function refDiagnosa($request, $response, $args){
    $data = $request->getParsedBody();        
    $getCari = '/referensi/diagnosa/' . $data['diagnosa'];
    $data = kirimws($getCari, 'GET', 0);
    $response->getBody()
        ->write($data);
    return $response;
}
function refPoli($request, $response, $args){
    $data = $request->getParsedBody();
    $getCari = '/referensi/poli/' . $data['poli'];
    $data = kirimws($getCari, 'GET', '',1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refFaskes($request, $response, $args){
    $data = $_POST;
    
    $getCari = '/referensi/faskes/'.$data['nama'].'/'.$data['jenisfaskes'];  
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refDPJP($request, $response, $args){
    $data = $request->getParsedBody();
    $getCari = '/referensi/dokter/pelayanan/'.$data['jenispelayanan'].'/tglPelayanan/'.$data['tglpelayanan'].'/Spesialis/'.$data['kodespesialis'];
    $data = kirimws($getCari, 'GET', 0);
    $response->getBody()
        ->write($data);
    return $response;
}
function refPropinsi($request, $response, $args){    
    $getCari = '/referensi/propinsi';
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refKabupaten($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/kabupaten/propinsi/'.$data['kodePropinsi'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refKecamatan($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/kecamatan/kabupaten/'.$data['kodeKabupaten'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refDiagnosaProgramPRB($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/procedure/'.$data['prosedur'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refObatGenerikProgramPRB($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/obatprb/'.$data['obat'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refProcedurePKS($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/procedure/'.$data['prosedur'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refKelasRawatPKS($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/kelasrawat';
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refDokterPKS($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/dokter/'.$data['dokter'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refSpesialistikPKS($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/spesialistik';
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refRuangRawatPKS($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/ruangrawat';
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refCaraKeluarPKS($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/carakeluar';
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function refPascaPulangPKS($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/pascapulang';
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function caribynokartu($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/Peserta/nokartu/'.$data['nokartu'].'/tglSEP/'.$data['tglsep'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function caribynik($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/Peserta/nik/'.$data['nik'].'/tglSEP/'.$data['tglsep'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function insertSEP($request, $response, $args){        
    
    $getCari = '/SEP/2.0/insert';    
    $data = $_POST['data'];    
    
    $data = kirimws($getCari, 'POST', $data, 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function updateSEP($request, $response, $args){    
   
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/SEP/2.0/update';
    $data = kirimws($getCari, 'PUT', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function deleteSEP($request, $response, $args){   
    
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/SEP/2.0/delete';
    $data = kirimws($getCari, 'DELETE', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function jasaRaharjaSuplesi($request, $response, $args){      
    $data = $request->getParsedBody();          
    $getCari = '/sep/JasaRaharja/Suplesi/'.$data['nokartu'].'/tglPelayanan/'.$data['tglsep'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function jasaRaharjaDIK($request, $response, $args){       
    $data = $request->getParsedBody();          
    $getCari = '/sep/KllInduk/List/'.$data['nokartu'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function pengajuanSEP($request, $response, $args){    
   
    $data = $_POST;          
    $body = '{
        "request": {
           "t_sep": {
              "noKartu": "'.$data['noKartu'].'",
              "tglSep": "'.$data['tglSep'].'",
              "jnsPelayanan": "'.$data['jnsPelayanan'].'",
              "jnsPengajuan": "'.$data['jnsPengajuan'].'",
              "keterangan": "'.$data['keterangan'].'",
              "user": "'.$data['user'].'"
           }
        }
     }';
  
    
    $getCari = '/Sep/pengajuanSEP';
    $data = kirimws($getCari, 'POST', $body, 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function approvalSEP($request, $response, $args){    
   
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/Sep/aprovalSEP';
    $data = kirimws($getCari, 'POST', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function sepInternal($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/SEP/Internal/'.$data['nomorSEP'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function hapusSepInternal($request, $response, $args){        
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/SEP/Internal/delete';
    $data = kirimws($getCari, 'DELETE', $data);
    $response->getBody()
        ->write($data);
    return $response;
}   
function getFinger($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/SEP/FingerPrint/Peserta/'.$data['nokartu'].'/TglPelayanan/'.$data['tglpelayanan'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function rencanaKontrol($request, $response, $args){    
    /* Kiriman Json Harus Seperti ini */
    $data = $_POST;
    $data =  '{
            "request": {
                "noSEP":"'.$data['noSEP'].'",
                "kodeDokter":"'.$data['idDokter'].'",
                "poliKontrol":"'.$data['poliKontrol'].'",
                "tglRencanaKontrol":"'.$data['tglKontrol'].'",
                "user":"'.$data['User'].'"
            }
            }';
     /* End Kiriman Json */
    //$data = $request->getParsedBody();            
    $getCari = '/RencanaKontrol/insert';
    $data = kirimws($getCari, 'POST', $data, 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function updateRencanaKontrol($request, $response, $args){    
   
    $data = $_POST;      
    $data = '{"request": {"noSuratKontrol":"'.$data['noSuratKontrol'].'","noSEP":"'.$data['noSEP'].'","kodeDokter":"'.$data['kodeDokter'].'","poliKontrol":"'.$data['poliKontrol'].'","tglRencanaKontrol":"'.$data['TglRencanaKontrol'].'","user":"'.$data['user'].'"}}';    
    $getCari = '/RencanaKontrol/Update';    
    $data = kirimws($getCari, 'PUT', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function hapusRencanaKontrol($request, $response, $args){    
   
    $data = $_POST;    
    $data = '{
                "request": {
                "t_suratkontrol":{
                "noSuratKontrol": "'.$data['noSuratKontrol'].'",
                "user": "'.$data['user'].'" 
                }
                }
            }'; 
    $getCari = '/RencanaKontrol/Delete';
    $data = kirimws($getCari, 'DELETE', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function SPRI($request, $response, $args){    
  
    $data = $_POST;
    $data = '{"request": {"noKartu":"'.$data['noKartu'].'","kodeDokter":"'.$data['idDokter'].'","poliKontrol":"'.$data['poliKontrol'].'","tglRencanaKontrol":"'.$data['tglKontrol'].'","user":"'.$data['User'].'"}}';
            
    $getCari = '/RencanaKontrol/InsertSPRI';
    //print_r($body);
    //die();
    $data = kirimws($getCari, 'POST', $data, 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function updateSPRI($request, $response, $args){    
  
    $data = $_POST;              
    $getCari = '/RencanaKontrol/UpdateSPRI';    
    $data = '{"request":{"noSPRI":"'.$data['noSPRI'].'","kodeDokter":"'.$data['kodeDokter'].'","poliKontrol":"'.$data['poliKontrol'].'","tglRencanaKontrol":"'.$data['tglRencanaKontrol'].'","user":"'.$data['user'].'"}}';    
    $data = kirimws($getCari, 'PUT', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function rencanaKontrolCariSEP($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/RencanaKontrol/nosep/'.$data['nosep'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function getRencanaKontrol($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/RencanaKontrol/noSuratKontrol/'.$data['norencanakontrol'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function listRencanaKontrol($request, $response, $args){        
    $data = $_POST;                  
    $getCari = '/RencanaKontrol/ListRencanaKontrol/Bulan/'.$data['bulan'].'/Tahun/'.$data['tahun'].'/Nokartu/'.$data['nokartu'].'/filter/'.$data['formatfilter'];
    //print_r($getCari);
    //die();
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function dataPoliRencanaKontrol($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/RencanaKontrol/ListSpesialistik/JnsKontrol/'.$data['jenis'].'/nomor/'.$data['nomor'].'/TglRencanaKontrol/'.$data['tglrencana']; //Parameter 1: Jenis kontrol --> 1: SPRI, 2: Rencana Kontrol, Parameter 2: Nomor --> jika jenis kontrol = 1, maka diisi nomor kartu; jika jenis kontrol = 2, maka diisi nomor SEP
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function dataDokterRencanaKontrol($request, $response, $args){        
    $data = $_POST;              
    $KdPoliCari = $data['kdpoli'];
    if ($KdPoliCari == 'Klinik Bedah Onkologi') {
        $KdPoliCari = '017';
    }
    $getCari = '/RencanaKontrol/JadwalPraktekDokter/JnsKontrol/'.$data['jenis'].'/KdPoli/'.$KdPoliCari.'/TglRencanaKontrol/'.$data['tglrencana']; //Parameter 1: Jenis kontrol --> 1: SPRI, 2: Rencana Kontrol, Parameter 2: Kode poli, Parameter 3: Tanggal rencana kontrol --> format yyyy-MM-dd
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function rujukanFaskes($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/'.$data['norujukan'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function rujukanFaskesget($request, $response, $args){            
    $NoRujukan = $args['norujukan'];
    
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/'.$NoRujukan;
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function rujukanFaskesgetrs($request, $response, $args){        
    $NoRujukan = $args['norujukan'];              
    $getCari = '/Rujukan/RS/'.$NoRujukan;
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}

function rujukanRS($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/RS/'.$data['norujukan'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function rujukanTerbaruByNoKarFaskes($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/Peserta/'.$data['nokartu'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function rujukanTerbaruByNoKarRS($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/RS/Peserta/'.$data['nokartu'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function listRujukanByNoKarFaskes($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/List/Peserta/'.$data['nokartu'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function listRujukanByNoKarRS($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/RS/List/Peserta/'.$data['nokartu'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function rujukan($request, $response, $args){            
    $data = file_get_contents('php://input');
    $getCari = '/Rujukan/2.0/insert';
    $data = kirimws($getCari, 'POST', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function updateRujukan($request, $response, $args){    
   
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/Rujukan/2.0/Update';
    $data = kirimws($getCari, 'PUT', $data);
    $response->getBody()
        ->write($data);
    return $response;
}

function listSpesialistikRujukan($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/ListSpesialistik/PPKRujukan/'.$data['kdppk'].'/TglRujukan/'.$data['tglrujukan'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function listSaranaRujukan($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/ListSarana/PPKRujukan/'.$data['kdppk'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function rujukanKhusus($request, $response, $args){    
   
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/Rujukan/Khusus/insert';
    $data = kirimws($getCari, 'POST', $data);
    $response->getBody()
        ->write($data);
    return $response;
}

function deleteRujukanKhusus($request, $response, $args){    
    
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/Rujukan/Khusus/delete';
    $data = kirimws($getCari, 'DELETE', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function listRujukanKhusus($request, $response, $args){        
    $data = $request->getParsedBody();              
    $getCari = '/Rujukan/Khusus/List/Bulan/'.$data['bulan'].'/Tahun/'.$data['tahun'];
    $data = kirimws($getCari, 'GET', 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function monitoringriwayatSEP($request, $response, $args){        
   
    $data = $_POST;  
  
    $getCari = '/monitoring/HistoriPelayanan/NoKartu/'.trim($data['noKartu']).'/tglMulai/'.trim($data['tglMulai']).'/tglAkhir/'.trim($data['tglAkhir']);
   
    $data = kirimws($getCari, 'GET', '',1);
   
    $response->getBody()
        ->write($data);
    return $response;
}

function hapussep($request, $response, $args){        
   
    $data = $_POST;      
    $arr = '{
        "request": {
           "t_sep": {
              "noSep": "'.$data['nosep'].'",
              "user": "'.$data['user'].'"
           }
        }
     }';  
    
    $getCari = '/SEP/2.0/delete';    
    $data = kirimws($getCari, 'DELETE', $arr,1);   
    $response->getBody()
        ->write($data);
    return $response;
}
function updateTglPulang($request, $response, $args){        
    
    $data = $_POST;      
    $arr = '{
              "request":{
              "t_sep":{
              "noSep": "'.$data['nosep'].'",
              "statusPulang":"'.$data['statuspulang'].'",
              "noSuratMeninggal":"'.$data['nosuratMeninggal'].'",
              "tglMeninggal":"'.$data['tglSuratMeninggal'].'",
              "tglPulang":"'.$data['tglPulang'].'",
              "noLPManual":"'.$data['noLPManual'].'",
              "user":"'.$data['user'].'"
            }
        }
    }';  
    
    $getCari = '/SEP/2.0/updtglplg';    
    $data = kirimws($getCari, 'PUT', $arr,1);   
    $response->getBody()
        ->write($data);
    return $response;
}
function lihatsep($request, $response, $args){            
    $data = $_POST;    
    $getCari = 'SEP/'.$data['nosep'];
    $data = kirimws($getCari, 'GET', $data,1);
    $response->getBody()
        ->write($data);
    return $response;
}

function generateHeader($request, $response, $args){    
    $data = getHeader();    
    print_r(json_encode($data));
    die();
}