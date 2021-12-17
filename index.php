<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use LZCompressor\LZString as LZString;

require __DIR__ . './vendor/autoload.php';
require 'util.php';

$app = AppFactory::create();
$app->setBasePath('/jknapi');
date_default_timezone_set("Asia/Jakarta");

/*--------------ROUTING--------------------*/
// REFERENSI
$app->post('/refDiag', 'refDiagnosa');
$app->post('/refPoli', 'refPoli');
$app->post('/refFaskes', 'refFaskes');
$app->post('/refDPJP', 'refDPJP');
$app->post('/refPropinsi', 'refPropinsi');
/*--------------ROUTING--------------------*/
$app->run();

/*--------------KODING--------------------*/
/* REFERENSI */
function refDiagnosa($request, $response, $args){
    $data = $request->getParsedBody();       
    $getCari = '/referensi/diagnosa/' . $data['diagnosa'];
    $data = kirimws($getCari, 'GET');
    $response->getBody()
        ->write($data);
    return $response;
}
function refPoli($request, $response, $args){
    $data = $request->getParsedBody();
    $getCari = '/referensi/poli/' . $data['poli'];
    $data = kirimws($getCari, 'GET');
    $response->getBody()
        ->write($data);
    return $response;
}
function refFaskes($request, $response, $args){
    $data = $request->getParsedBody();
    $getCari = '/referensi/faskes/'.$data['nama'].'/'.$data['jenispelayanan'];
    $data = kirimws($getCari, 'GET');
    $response->getBody()
        ->write($data);
    return $response;
}
function refDPJP($request, $response, $args){
    $data = $request->getParsedBody();
    $getCari = '/referensi/dokter/pelayanan/'.$data['jenispelayanan'].'/tglPelayanan/'.$data['tglpelayanan'].'/Spesialis/'.$data['kodespesialis'];
    $data = kirimws($getCari, 'GET');
    $response->getBody()
        ->write($data);
    return $response;
}
function refPropinsi($request, $response, $args){    
    $getCari = '/referensi/propinsi';
    $data = kirimws($getCari, 'GET');
    $response->getBody()
        ->write($data);
    return $response;
}
function refKabupaten($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/kabupaten/propinsi/'.$data['kodePropinsi'];
    $data = kirimws($getCari, 'GET');
    $response->getBody()
        ->write($data);
    return $response;
}
function refKecamatan($request, $response, $args){    
    $data = $request->getParsedBody();
    $getCari = '/referensi/kecamatan/kabupaten/'.$data['kodeKabutapen'];
    $data = kirimws($getCari, 'GET');
    $response->getBody()
        ->write($data);
    return $response;
}

/* REFERENSI */
/*--------------KODING--------------------*/
