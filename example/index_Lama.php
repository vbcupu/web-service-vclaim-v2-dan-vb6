<?php
require 'vendor/autoload.php';
require 'db.php';
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\App;


$app = new Slim\App();


$app->get('/', 'Depan');
$app->get('/daftarpasienonline[/{tgl1}/{tgl2}]', 'daftarpasienonline');
$app->get('/daftarpasienonlineNoCM[/{tgl1}/{tgl2}/{NoCM}]', 'daftarpasienonlinebyNoCM');
$app->get('/daftarpasienonlinebyNoBooking[/{NoBooking}]', 'daftarpasienonlinebyNoBooking');
$app->get('/daftarpasienonlinebyNAMA[/{tgl1}/{tgl2}/{namalengkap}/{alamat}]', 'daftarpasienonlinebyNAMA');
$app->post('/addpendaftaran/', 'addpendaftaran');
$app->post('/addNoCM/', 'addNoCM');


$app->run();


/* METHOD GET DISINI */
/* ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
function Depan() {
  echo "Halaman Depan";
}




function daftarpasienonline($request, $response, $args){	
	if (!$args=="") {
	$sql = "SELECT kdBooking, TglPendaftaran, KdRuangan, NoCM, NoIdentitas, NamaLengkap, alamat, rtrw, kecamatan, kota, propinsi, kelurahan, tgllahir,tempatlahir, jeniskelamin, titlepasien, namakeluarga, warga,goldarah, rhesus, statusnikah,pekerjaan,Agama,Suku,Pendidikan,NamaAyah,NamaIbu,NamaSuamiIstri, telepon, kodepos, namakeluarga FROM ngi_pasien_online where tglpendaftaran between ('" .$args['tgl1']."') and ('".$args['tgl2']."')"; 
	//echo $sql;
	try{
		$db = getConnectionpendaftaranonline();
        $stmt = $db->query($sql);
        $data = $stmt->fetchAll (PDO::FETCH_ASSOC);        
        $db = null;        
        $totalrow = $stmt->RowCount();        

    $x = 0;
	echo '<xml xmlns:s="uuid:BDC6E3F0-6DA3-11d1-A2A3-00AA00C14882" xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882" xmlns:rs="urn:schemas-microsoft-com:rowset" xmlns:z="#RowsetSchema">
            <s:Schema id="RowsetSchema">
            		<s:ElementType name="row" content="eltOnly">            		            		
            		<s:AttributeType name="KdBooking" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            		<s:AttributeType name="TglPendafataran" rs:number="1" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            			<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
                    <s:AttributeType name="KdRuangan" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            		<s:AttributeType name="NamaRuangan" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
                    <s:AttributeType name="NoCM" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            			<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            <s:AttributeType name="NoIdentitas" rs:number="4" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
                    <s:AttributeType name="NamaLengkap" rs:number="5" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
                        <s:AttributeType name="Alamat" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="RTRW" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="Kecamatan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="Kota" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>            			
						<s:AttributeType name="Propinsi" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>  
						<s:AttributeType name="JenisKelamin" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="TglLahir" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="TempatLahir" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="titlepasien" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="Kelurahan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Warga" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>			
					    <s:AttributeType name="GolDarah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>			
						<s:AttributeType name="Rhesus" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="StatusNikah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Pekerjaan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Agama" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Suku" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Pendidikan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaAyah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaIbu" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaSuamiIstri" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaKeluarga" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Telepon" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="kodepos" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						
            			<s:extends type="rs:rowbase"/>
            		</s:ElementType>
            	</s:Schema>
            	<rs:data>';
    
	while ($x <= ($totalrow - 1)) {					
		echo '<z:row KdBooking="' . $data[$x]['kdBooking'] . '" TglPendafataran="' . $data[$x]['TglPendaftaran'] . '" KdRuangan="' . $data[$x]['KdRuangan'] . '" NoCM="' . $data[$x]['NoCM'] . '" NoIdentitas="' . $data[$x]['NoIdentitas'] . '" NamaLengkap="' . $data[$x]['NamaLengkap'] . '" Alamat="' .$data[$x]['alamat']. '" RTRW="' . $data[$x]['rtrw'] . '" kecamatan="' .$data[$x]['kecamatan']. '" kota="' . $data[$x]['kota'] .'" Propinsi="' . $data[$x]['propinsi'] .'"  JenisKelamin="' . $data[$x]['jeniskelamin'] .'"  TglLahir="' . $data[$x]['tgllahir'] .'"  TempatLahir="' . $data[$x]['tempatlahir'] .'" TitlePasien="' . $data[$x]['titlepasien'] .'"  Kelurahan="' . $data[$x]['kelurahan'] .'" Warga="' . $data[$x]['warga'] .'" GolDarah="' . $data[$x]['goldarah'] .'" Rhesus="' . $data[$x]['rhesus'] .'" StatusNikah="' . $data[$x]['statusnikah'] .'" Pekerjaan="' . $data[$x]['pekerjaan'] .'" Agama="' . $data[$x]['Agama'] .'" Suku="' . $data[$x]['Suku'] .'" Pendidikan="' . $data[$x]['Pendidikan'] .'" NamaAyah="' . $data[$x]['NamaAyah'] .'" NamaIbu="' . $data[$x]['NamaIbu'] .'" NamaSuamiIstri="' . $data[$x]['NamaSuamiIstri'] .'" NamaKeluarga="' . $data[$x]['namakeluarga'] .'" telepon="' . $data[$x]['telepon'] .'" Kodepos="' . $data[$x]['kodepos'] .'" />';		
		$x++;
	} 
	

	echo '</rs:data></xml>';



		//$response = $sql;
		return $response;
	}catch (PDOException $e) {
       echo '{"error":{"text":'. $e->getMessage() .'}}';
      }  
    }
  } 

  function daftarpasienonlinebyNoCM($request, $response, $args){		
	if (!$args=="") {
	$sql = "SELECT kdBooking, TglPendaftaran, KdRuangan, NoCM, NoIdentitas, NamaLengkap, alamat, rtrw, kecamatan, kota, propinsi, kelurahan, tgllahir,tempatlahir, jeniskelamin, titlepasien, namakeluarga, warga,goldarah, rhesus, statusnikah,pekerjaan,Agama,Suku,Pendidikan,NamaAyah,NamaIbu,NamaSuamiIstri, telepon, kodepos, namakeluarga FROM ngi_pasien_online where tglpendaftaran between ('" .$args['tgl1']."') and ('".$args['tgl2']."') And NoCM like '%" .$args['NoCM']. "%'" ; 
	//echo $sql;
	try{
		$db = getConnectionpendaftaranonline();
        $stmt = $db->query($sql);
        $data = $stmt->fetchAll (PDO::FETCH_ASSOC);        
        $db = null;        
        $totalrow = $stmt->RowCount();        

    $x = 0;
	echo '<xml xmlns:s="uuid:BDC6E3F0-6DA3-11d1-A2A3-00AA00C14882" xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882" xmlns:rs="urn:schemas-microsoft-com:rowset" xmlns:z="#RowsetSchema">
            <s:Schema id="RowsetSchema">
            		<s:ElementType name="row" content="eltOnly">            		            		
            		<s:AttributeType name="KdBooking" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            		<s:AttributeType name="TglPendafataran" rs:number="1" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            			<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
                    <s:AttributeType name="KdRuangan" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            		<s:AttributeType name="NamaRuangan" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
                    <s:AttributeType name="NoCM" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            			<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            <s:AttributeType name="NoIdentitas" rs:number="4" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
                    <s:AttributeType name="NamaLengkap" rs:number="5" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
                        <s:AttributeType name="Alamat" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="RTRW" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="Kecamatan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="Kota" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>            			
						<s:AttributeType name="Propinsi" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>  
						<s:AttributeType name="JenisKelamin" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="TglLahir" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="TempatLahir" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="titlepasien" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="Kelurahan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Warga" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>			
					    <s:AttributeType name="GolDarah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>			
						<s:AttributeType name="Rhesus" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="StatusNikah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Pekerjaan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Agama" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Suku" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Pendidikan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaAyah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaIbu" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaSuamiIstri" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaKeluarga" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Telepon" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="kodepos" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						
            			<s:extends type="rs:rowbase"/>
            		</s:ElementType>
            	</s:Schema>
            	<rs:data>';
    
	while ($x <= ($totalrow - 1)) {					
		echo '<z:row KdBooking="' . $data[$x]['kdBooking'] . '" TglPendafataran="' . $data[$x]['TglPendaftaran'] . '" KdRuangan="' . $data[$x]['KdRuangan'] . '" NoCM="' . $data[$x]['NoCM'] . '" NoIdentitas="' . $data[$x]['NoIdentitas'] . '" NamaLengkap="' . $data[$x]['NamaLengkap'] . '" Alamat="' .$data[$x]['alamat']. '" RTRW="' . $data[$x]['rtrw'] . '" kecamatan="' .$data[$x]['kecamatan']. '" kota="' . $data[$x]['kota'] .'" Propinsi="' . $data[$x]['propinsi'] .'"  JenisKelamin="' . $data[$x]['jeniskelamin'] .'"  TglLahir="' . $data[$x]['tgllahir'] .'"  TempatLahir="' . $data[$x]['tempatlahir'] .'" TitlePasien="' . $data[$x]['titlepasien'] .'"  Kelurahan="' . $data[$x]['kelurahan'] .'" Warga="' . $data[$x]['warga'] .'" GolDarah="' . $data[$x]['goldarah'] .'" Rhesus="' . $data[$x]['rhesus'] .'" StatusNikah="' . $data[$x]['statusnikah'] .'" Pekerjaan="' . $data[$x]['pekerjaan'] .'" Agama="' . $data[$x]['Agama'] .'" Suku="' . $data[$x]['Suku'] .'" Pendidikan="' . $data[$x]['Pendidikan'] .'" NamaAyah="' . $data[$x]['NamaAyah'] .'" NamaIbu="' . $data[$x]['NamaIbu'] .'" NamaSuamiIstri="' . $data[$x]['NamaSuamiIstri'] .'" NamaKeluarga="' . $data[$x]['namakeluarga'] .'" telepon="' . $data[$x]['telepon'] .'" Kodepos="' . $data[$x]['kodepos'] .'" />';		
		$x++;
	} 
	

	echo '</rs:data></xml>';

		//$response = $sql;
		return $response;
	}catch (PDOException $e) {
       echo '{"error":{"text":'. $e->getMessage() .'}}';
      }  
    }
  } 

  function daftarpasienonlinebyNAMA($request, $response, $args){	
	if (!$args=="") {
	if ($args['alamat'] == "-") {	
	$sql = "SELECT kdBooking, TglPendaftaran, KdRuangan, NoCM, NoIdentitas, NamaLengkap, alamat, rtrw, kecamatan, kota, propinsi, kelurahan, tgllahir,tempatlahir, jeniskelamin, titlepasien, namakeluarga, warga,goldarah, rhesus, statusnikah,pekerjaan,Agama,Suku,Pendidikan,NamaAyah,NamaIbu,NamaSuamiIstri, telepon, kodepos, namakeluarga FROM ngi_pasien_online where tglpendaftaran between ('" .$args['tgl1']."') and ('".$args['tgl2']."') And NamaLengkap like '%" .$args['namalengkap']. "%'"; 
	}else{
		$sql = "SELECT kdBooking, TglPendaftaran, KdRuangan, NoCM, NoIdentitas, NamaLengkap, alamat, rtrw, kecamatan, kota, propinsi, kelurahan, tgllahir,tempatlahir, jeniskelamin, titlepasien, namakeluarga, warga,goldarah, rhesus, statusnikah,pekerjaan,Agama,Suku,Pendidikan,NamaAyah,NamaIbu,NamaSuamiIstri, telepon, kodepos, namakeluarga FROM ngi_pasien_online where tglpendaftaran between ('" .$args['tgl1']."') and ('".$args['tgl2']."') And NamaLengkap like '%" .$args['namalengkap']. "%' And alamat2 like '%".$args['alamat']."%'" ; 		
		
	}
	//echo $sql;
	try{
		$db = getConnectionpendaftaranonline();
        $stmt = $db->query($sql);
        $data = $stmt->fetchAll (PDO::FETCH_ASSOC);        
        $db = null;        
        $totalrow = $stmt->RowCount();        

    $x = 0;
	echo '<xml xmlns:s="uuid:BDC6E3F0-6DA3-11d1-A2A3-00AA00C14882" xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882" xmlns:rs="urn:schemas-microsoft-com:rowset" xmlns:z="#RowsetSchema">
            <s:Schema id="RowsetSchema">
            		<s:ElementType name="row" content="eltOnly">            		            		
            		<s:AttributeType name="KdBooking" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            		<s:AttributeType name="TglPendafataran" rs:number="1" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            			<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
                    <s:AttributeType name="KdRuangan" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            		<s:AttributeType name="NamaRuangan" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
                    <s:AttributeType name="NoCM" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            			<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            <s:AttributeType name="NoIdentitas" rs:number="4" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
                    <s:AttributeType name="NamaLengkap" rs:number="5" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
                        <s:AttributeType name="Alamat" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="RTRW" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="Kecamatan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="Kota" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>            			
						<s:AttributeType name="Propinsi" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>  
						<s:AttributeType name="JenisKelamin" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="TglLahir" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="TempatLahir" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="titlepasien" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="Kelurahan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Warga" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>			
					    <s:AttributeType name="GolDarah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>			
						<s:AttributeType name="Rhesus" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="StatusNikah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Pekerjaan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Agama" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Suku" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Pendidikan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaAyah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaIbu" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaSuamiIstri" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaKeluarga" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Telepon" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="kodepos" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						
            			<s:extends type="rs:rowbase"/>
            		</s:ElementType>
            	</s:Schema>
            	<rs:data>';
    
	while ($x <= ($totalrow - 1)) {					
		echo '<z:row KdBooking="' . $data[$x]['kdBooking'] . '" TglPendafataran="' . $data[$x]['TglPendaftaran'] . '" KdRuangan="' . $data[$x]['KdRuangan'] . '" NoCM="' . $data[$x]['NoCM'] . '" NoIdentitas="' . $data[$x]['NoIdentitas'] . '" NamaLengkap="' . $data[$x]['NamaLengkap'] . '" Alamat="' .$data[$x]['alamat']. '" RTRW="' . $data[$x]['rtrw'] . '" kecamatan="' .$data[$x]['kecamatan']. '" kota="' . $data[$x]['kota'] .'" Propinsi="' . $data[$x]['propinsi'] .'"  JenisKelamin="' . $data[$x]['jeniskelamin'] .'"  TglLahir="' . $data[$x]['tgllahir'] .'"  TempatLahir="' . $data[$x]['tempatlahir'] .'" TitlePasien="' . $data[$x]['titlepasien'] .'"  Kelurahan="' . $data[$x]['kelurahan'] .'" Warga="' . $data[$x]['warga'] .'" GolDarah="' . $data[$x]['goldarah'] .'" Rhesus="' . $data[$x]['rhesus'] .'" StatusNikah="' . $data[$x]['statusnikah'] .'" Pekerjaan="' . $data[$x]['pekerjaan'] .'" Agama="' . $data[$x]['Agama'] .'" Suku="' . $data[$x]['Suku'] .'" Pendidikan="' . $data[$x]['Pendidikan'] .'" NamaAyah="' . $data[$x]['NamaAyah'] .'" NamaIbu="' . $data[$x]['NamaIbu'] .'" NamaSuamiIstri="' . $data[$x]['NamaSuamiIstri'] .'" NamaKeluarga="' . $data[$x]['namakeluarga'] .'" telepon="' . $data[$x]['telepon'] .'" Kodepos="' . $data[$x]['kodepos'] .'" />';		
		$x++;
	} 
	

	echo '</rs:data></xml>';



		//$response = $sql;
		return $response;
	}catch (PDOException $e) {
       echo '{"error":{"text":'. $e->getMessage() .'}}';
      }  
    }
  } 
  
  
  
 function daftarpasienonlinebyNoBooking($request, $response, $args){		
	if (!$args=="") {
	$sql = "SELECT kdBooking, TglPendaftaran, KdRuangan, NoCM, NoIdentitas, NamaLengkap, alamat, rtrw, kecamatan, kota, propinsi, kelurahan, tgllahir,tempatlahir, jeniskelamin, titlepasien, namakeluarga, warga,goldarah, rhesus, statusnikah,pekerjaan,Agama,Suku,Pendidikan,NamaAyah,NamaIbu,NamaSuamiIstri, telepon, kodepos, namakeluarga FROM ngi_pasien_online where kdbooking like '%" .$args['NoBooking']. "%'" ; 	
	try{
		$db = getConnectionpendaftaranonline();
        $stmt = $db->query($sql);
        $data = $stmt->fetchAll (PDO::FETCH_ASSOC);        
        $db = null;        
        $totalrow = $stmt->RowCount();        

    $x = 0;
	echo '<xml xmlns:s="uuid:BDC6E3F0-6DA3-11d1-A2A3-00AA00C14882" xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882" xmlns:rs="urn:schemas-microsoft-com:rowset" xmlns:z="#RowsetSchema">
            <s:Schema id="RowsetSchema">
            		<s:ElementType name="row" content="eltOnly">            		            		
            		<s:AttributeType name="KdBooking" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            		<s:AttributeType name="TglPendafataran" rs:number="1" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            			<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
                    <s:AttributeType name="KdRuangan" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            		<s:AttributeType name="NamaRuangan" rs:number="2" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
                    <s:AttributeType name="NoCM" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            			<s:datatype dt:type="string" dt:maxLength="50"/>
            		</s:AttributeType>
            <s:AttributeType name="NoIdentitas" rs:number="4" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
                    <s:AttributeType name="NamaLengkap" rs:number="5" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
                        <s:AttributeType name="Alamat" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="RTRW" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="Kecamatan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
            			<s:AttributeType name="Kota" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>            			
						<s:AttributeType name="Propinsi" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>  
						<s:AttributeType name="JenisKelamin" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="TglLahir" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="TempatLahir" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="titlepasien" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>						
						<s:AttributeType name="Kelurahan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Warga" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>			
					    <s:AttributeType name="GolDarah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>			
						<s:AttributeType name="Rhesus" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="StatusNikah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Pekerjaan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Agama" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Suku" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Pendidikan" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaAyah" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaIbu" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaSuamiIstri" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="NamaKeluarga" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="Telepon" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						<s:AttributeType name="kodepos" rs:number="3" rs:nullable="true" rs:maydefer="true" rs:writeunknown="true">
            				<s:datatype dt:type="string" dt:maxLength="50"/>
            			</s:AttributeType>
						
            			<s:extends type="rs:rowbase"/>
            		</s:ElementType>
            	</s:Schema>
            	<rs:data>';
    
	while ($x <= ($totalrow - 1)) {					
		echo '<z:row KdBooking="' . $data[$x]['kdBooking'] . '" TglPendafataran="' . $data[$x]['TglPendaftaran'] . '" KdRuangan="' . $data[$x]['KdRuangan'] . '" NoCM="' . $data[$x]['NoCM'] . '" NoIdentitas="' . $data[$x]['NoIdentitas'] . '" NamaLengkap="' . $data[$x]['NamaLengkap'] . '" Alamat="' .$data[$x]['alamat']. '" RTRW="' . $data[$x]['rtrw'] . '" kecamatan="' .$data[$x]['kecamatan']. '" kota="' . $data[$x]['kota'] .'" Propinsi="' . $data[$x]['propinsi'] .'"  JenisKelamin="' . $data[$x]['jeniskelamin'] .'"  TglLahir="' . $data[$x]['tgllahir'] .'"  TempatLahir="' . $data[$x]['tempatlahir'] .'" TitlePasien="' . $data[$x]['titlepasien'] .'"  Kelurahan="' . $data[$x]['kelurahan'] .'" Warga="' . $data[$x]['warga'] .'" GolDarah="' . $data[$x]['goldarah'] .'" Rhesus="' . $data[$x]['rhesus'] .'" StatusNikah="' . $data[$x]['statusnikah'] .'" Pekerjaan="' . $data[$x]['pekerjaan'] .'" Agama="' . $data[$x]['Agama'] .'" Suku="' . $data[$x]['Suku'] .'" Pendidikan="' . $data[$x]['Pendidikan'] .'" NamaAyah="' . $data[$x]['NamaAyah'] .'" NamaIbu="' . $data[$x]['NamaIbu'] .'" NamaSuamiIstri="' . $data[$x]['NamaSuamiIstri'] .'" NamaKeluarga="' . $data[$x]['namakeluarga'] .'" telepon="' . $data[$x]['telepon'] .'" Kodepos="' . $data[$x]['kodepos'] .'" />';		
		$x++;
	} 
	

	echo '</rs:data></xml>';

		//$response = $sql;
		return $response;
	}catch (PDOException $e) {
       echo '{"error":{"text":'. $e->getMessage() .'}}';
      }  
    }
  }  

//====================================================================================================================================================*/



function addpendaftaran($request, $response, $args) {   
    $NoBooking = $request->getParsedBody()['NoBooking'];
	$NoPendaftaran = $request->getParsedBody()['NoPendaftaran'];
	$sql = "Update ngi_pasien_online set nopendaftaran = '" .$NoPendaftaran. "' where kdbooking = '" .$NoBooking."'";
	try{		
		$db= getConnectionpendaftaranonline();		
		$stmt = $db->exec($sql);
		//echo $sql;
		//echo $stmt;
		if ($stmt==0){
			echo 'Record Tidak DiTemukan';
		}else{
			echo 'Update Berhasil';
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}


function addNoCM($request, $response, $args) {   
    $NoBooking = $request->getParsedBody()['NoBooking'];
	$NoCM = $request->getParsedBody()['NoCM'];
	$sql = "Update ngi_pasien_online set NoCM = '" .$NoCM. "' where kdbooking = '" .$NoBooking."'";
	try{		
		$db= getConnectionpendaftaranonline();		
		$stmt = $db->exec($sql);
		//echo $sql;
		//echo $stmt;
		if ($stmt==0){
			echo 'Record Tidak DiTemukan';
		}else{
			echo 'Update Berhasil';
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}
?>
