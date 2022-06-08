<?php
/*--------------KODING--------------------*/
/* REFERENSI */


function refDiagnosa1($request, $response, $args){    
    //$data = $request->getParsedBody();     
    $data = "I10";   
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
    /* Kiriman Json Harus Seperti ini */
    /*{
        "request":{
           "t_sep":{
              "noKartu":"0001105689835",
              "tglSep":"2021-07-30",
              "ppkPelayanan":"0301R011",
              "jnsPelayanan":"1",
              "klsRawat":{
                 "klsRawatHak":"2",
                 "klsRawatNaik":"1",
                 "pembiayaan":"1",
                 "penanggungJawab":"Pribadi"
              },
              "noMR":"MR9835",
              "rujukan":{
                 "asalRujukan":"2",
                 "tglRujukan":"2021-07-23",
                 "noRujukan":"RJKMR9835001",
                 "ppkRujukan":"0301R011"
              },
              "catatan":"testinsert RI",
              "diagAwal":"E10",
              "poli":{
                 "tujuan":"",
                 "eksekutif":"0"
              },
              "cob":{
                 "cob":"0"
              },
              "katarak":{
                 "katarak":"0"
              },
              "jaminan":{
                 "lakaLantas":"0",
                 "penjamin":{
                    "tglKejadian":"",
                    "keterangan":"",
                    "suplesi":{
                       "suplesi":"0",
                       "noSepSuplesi":"",
                       "lokasiLaka":{
                          "kdPropinsi":"",
                          "kdKabupaten":"",
                          "kdKecamatan":""
                       }
                    }
                 }
              },
              "tujuanKunj":"0",
              "flagProcedure":"",
              "kdPenunjang":"",
              "assesmentPel":"",
              "skdp":{
                 "noSurat":"0301R0110721K000021",
                 "kodeDPJP":"31574"
              },
              "dpjpLayan":"",
              "noTelp":"081111111101",
              "user":"Coba Ws"
           }
        }
     }*/
     /* End Kiriman Json */
    //$data = $request->getParsedBody();         
    //$data = json_decode(file_get_contents('php://input'));
    //print_r($_POST['data']);
    
    
    $getCari = '/SEP/2.0/insert';    
    $data = $_POST['data'];
    //$data = json_decode($data);
    //print_r($data);
    //$data - json_encode($data, true);
    
    $data = kirimws($getCari, 'POST', $data, 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function updateSEP($request, $response, $args){    
    /* Kiriman Json Harus Seperti ini */
    /*{
     "request": {
        "t_sep": {
                "noSep": "0301R0110521V000037",
                "klsRawat":{
                                "klsRawatHak":"3",
                                "klsRawatNaik":"",
                                "pembiayaan":"",
                                "penanggungJawab":""
                              },
                "noMR": "00469120",
                "catatan": "",
                "diagAwal": "E10",
                "poli": {
                        "tujuan": "IGD",
                        "eksekutif": "0"
                },
                "cob": {
                        "cob": "0"
                },
                "katarak": {
                        "katarak": "0"
                },
                "jaminan": {
                        "lakaLantas": "0",
                        "penjamin": {
                                "tglKejadian": "",
                                "keterangan": "",
                                "suplesi": {
                                        "suplesi": "0",
                                        "noSepSuplesi": "",
                                        "lokasiLaka": {
                                                "kdPropinsi": "",
                                                "kdKabupaten": "",
                                                "kdKecamatan": ""
                                        }
                                }
                        }
                },
                "dpjpLayan":"46",
                "noTelp": "08522038363",
                "user": "Cobaws"
        }
      }
    }*/
     /* End Kiriman Json */
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/SEP/2.0/update';
    $data = kirimws($getCari, 'PUT', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function deleteSEP($request, $response, $args){    
    /* Kiriman Json Harus Seperti ini */
    /*{
       "request": {
          "t_sep": {
             "noSep": "0301R0011017V000007",
             "user": "Coba Ws"
          }
       }
    }*/
     /* End Kiriman Json */
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
    /* Kiriman Json Harus Seperti ini */
    /* {
           "request": {
              "t_sep": {
                 "noKartu": "0001300759569",
                 "tglSep": "2021-03-26",
                 "jnsPelayanan": "1",
                 "jnsPengajuan": "2",
                 "keterangan": "Hari libur",
                 "user": "Coba Ws"
              }
           }
        }*/
     /* End Kiriman Json */
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
    /* Kiriman Json Harus Seperti ini */
    /*  Tanpa parameter jnsPengajuan maka default jnsPengajuan="1" (Approval SEP Backdate) 

        {
           "request": {
              "t_sep": {
                 "noKartu": "0003814312013",
                 "tglSep": "2017-10-26",
                 "jnsPelayanan": "1",
                 "keterangan": "Hari libur",
                 "user": "Coba Ws"
              }
           }
        }		
		
        Jika parameter jnsPengajuan ada nilai, maka approval sesuai jnsPengajuan 
 
        {
           "request": {
              "t_sep": {
                 "noKartu": "0003814312013",
                 "tglSep": "2017-10-26",
                 "jnsPelayanan": "1",
                 "jnsPengajuan": "1",
                 "keterangan": "Hari libur",
                 "user": "Coba Ws"
              }
           }
        }         */
     /* End Kiriman Json */
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
    /* Kiriman Json Harus Seperti ini */
    /* {
            "request": {
                "noSuratKontrol":"0301R0110321K000002",
                "noSEP":"0301R0111018V000006",
                "kodeDokter":"11111",
                "poliKontrol":"INT",
                "tglRencanaKontrol":"2021-03-18",
                "user":"coba"
            }
        }*/
     /* End Kiriman Json */
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/RencanaKontrol/Update';
    $data = kirimws($getCari, 'PUT', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function hapusRencanaKontrol($request, $response, $args){    
    /* Kiriman Json Harus Seperti ini */
    /*  {
            "request": {
                "t_suratkontrol":{
                "noSuratKontrol": "0301R0010320K000004",
                "user": "xxx"
                }
            }
        }*/
     /* End Kiriman Json */
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/RencanaKontrol/Delete';
    $data = kirimws($getCari, 'DELETE', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
function SPRI($request, $response, $args){    
    /* Kiriman Json Harus Seperti ini */
    $data = $_POST;
    $data = '{"request": {"noKartu":"'.$data['noKartu'].'","kodeDokter":"'.$data['idDokter'].'","poliKontrol":"'.$data['poliKontrol'].'","tglRencanaKontrol":"'.$data['tglKontrol'].'","user":"'.$data['User'].'"}}';
     /* End Kiriman Json */
    //$data = $request->getParsedBody();          
    $getCari = '/RencanaKontrol/InsertSPRI';
    //print_r($body);
    //die();
    $data = kirimws($getCari, 'POST', $data, 1);
    $response->getBody()
        ->write($data);
    return $response;
}
function updateSPRI($request, $response, $args){    
    /* Kiriman Json Harus Seperti ini */
    /*  {
    "request":
        {
            "noSPRI":"0301R0110421K000116",
            "kodeDokter":"31537",
            "poliKontrol":"ANA",
            "tglRencanaKontrol":"2021-04-13",
            "user":"cobdda"
        }
        }*/
     /* End Kiriman Json */
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/RencanaKontrol/UpdateSPRI';
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
    $getCari = '/RencanaKontrol/JadwalPraktekDokter/JnsKontrol/'.$data['jenis'].'/KdPoli/'.$data['kdpoli'].'/TglRencanaKontrol/'.$data['tglrencana']; //Parameter 1: Jenis kontrol --> 1: SPRI, 2: Rencana Kontrol, Parameter 2: Kode poli, Parameter 3: Tanggal rencana kontrol --> format yyyy-MM-dd
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
    /* Kiriman Json Harus Seperti ini */
    /*{
         "request": {
                "t_rujukan": {
                            "noRujukan": "0301R0010321V000003",
                            "tglRujukan": "2021-03-18",
                            "tglRencanaKunjungan":"2021-03-19",
                            "ppkDirujuk": "03010402",
                            "jnsPelayanan": "1",
                            "catatan": "test",
                            "diagRujukan": "A15",
                            "tipeRujukan": "2", (0 Penuh, 1 Partial, 2 balik PRB)
                            "poliRujukan": "", (kosong untuk tipe rujukan 2)
                            "user": "Coba Ws"
                }
         }
    }               */
     /* End Kiriman Json */
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/Rujukan/2.0/Update';
    $data = kirimws($getCari, 'PUT', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
/*function deleteRujukan($request, $response, $args){    
     Kiriman Json Harus Seperti ini 
    {
        "request": {
            "t_rujukan": {
                "noRujukan": "0301R0011117B000015",
                "user": "Coba Ws"
            }
        }
    }        
      End Kiriman Json 
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/Rujukan/delete';
    $data = kirimws($getCari, 'DELETE', $data);
    $response->getBody()
        ->write($data);
    return $response;
}
*/
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
    /* Kiriman Json Harus Seperti ini */
    /*{
         "noRujukan": "0301U0331019P003283",
         "diagnosa": [
                 {"kode": "P;N18"},
                 {"kode": "S;N18.1"}
         ],
        "procedure":  [
                 {"kode": "39.95"}
         ],
         "user": "Coba Ws"
    }   */
     /* End Kiriman Json */
    $data = $request->getParsedBody();      
    $data = $data['data'];    
    $getCari = '/Rujukan/Khusus/insert';
    $data = kirimws($getCari, 'POST', $data);
    $response->getBody()
        ->write($data);
    return $response;
}

function deleteRujukanKhusus($request, $response, $args){    
    /* Kiriman Json Harus Seperti ini */
    /*{
       "request": {
                "t_rujukan": {
                          "idRujukan": "98865",
                          "noRujukan": "0301U0331019P003283",
                          "user": "Coba Ws"
                  }
        }
    }         */
     /* End Kiriman Json */
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
    //{Base URL}/{Service Name}/monitoring/HistoriPelayanan/NoKartu/{Parameter 1}/tglMulai/{Parameter 2}/tglAkhir/{Parameter 3}
    //$data = $request->getParsedBody();  
    $data = $_POST;  
    //print_r($data['noKartu']);
    //print_r($data['tglMulai']);
    //print_r($data['tglAkhir']);
    //die();
    $getCari = '/monitoring/HistoriPelayanan/NoKartu/'.trim($data['noKartu']).'/tglMulai/'.trim($data['tglMulai']).'/tglAkhir/'.trim($data['tglAkhir']);
    //print_r($getCari);
    //die();
    //.'/tglMulai/'.$data['tglMulai']'.'/tglAkhir/'.$data['tglAkhir'];
    $data = kirimws($getCari, 'GET', '',1);
    //$data = json_decode($data);
    $response->getBody()
        ->write($data);
    return $response;
}

function hapussep($request, $response, $args){        
    //{Base URL}/{Service Name}/monitoring/HistoriPelayanan/NoKartu/{Parameter 1}/tglMulai/{Parameter 2}/tglAkhir/{Parameter 3}
    //$data = $request->getParsedBody();  
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
    //{Base URL}/{Service Name}/monitoring/HistoriPelayanan/NoKartu/{Parameter 1}/tglMulai/{Parameter 2}/tglAkhir/{Parameter 3}
    //$data = $request->getParsedBody();  
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
    $getCari = '/SEP/'.$data['nosep'];
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


/*--------------KODING--------------------*/