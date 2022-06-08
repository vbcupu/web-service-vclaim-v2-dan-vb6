# Bridging VClaim v2 dengan PHP untuk Vb6

Bridging Vclaim v2 dengan PHP untuk Visual basic 6, Karena kemalasan

framework PHP menggunakan SLIM 3, sebelumnya dibuat dengan SLIM 4 tapi malah pusing tracing ketika ada masalah non koding di bridging, maklum aku programmer jadul yang lamban belajar.

service yang tersedia disource ini lumayan banyak karena sudah dipakai implementasi di rumah sakit tempat kerjaku. Kalau cuma buat bikin SEP dan teman2nya insyaallah lancar

# setting consid
buka file util.php, isi parameter dibawah ini:

function configvclaim()
{
    $mode = "prod";    
    if ($mode == 'dev') {
        $consid = "";
        $secretkey = "";
        $userkey = "";
        $url = "https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev";
        $arr = array(
            'consid' => $consid,
            'secretkey' => $secretkey,
            'userkey' => $userkey,
            'url' => $url
        );
        return $arr;
    }else{
        $consid = "";
        $secretkey = "";
        $userkey = "";
        $url = "https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/";
        $arr = array(
            'consid' => $consid,
            'secretkey' => $secretkey,
            'userkey' => $userkey,
            'url' => $url
        );
        return $arr;
    }    
}


