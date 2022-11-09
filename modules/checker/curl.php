<?php 
error_reporting(0);
date_default_timezone_set('America/Bogota');
$hora = date('j M Y, h:i:s A');
$DX = rand(1,5122);
$cook = dirname(__FILE__).'Cookie'.$DX.'.txt';

function Gets($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}




function Bin($bin){
    $curl = new Vyper();
    $fim = $curl->get("https://lookup.binlist.net/$bin");  
    $bank = getStr($fim, '"bank":{"name":"', '"');
    $pais = getStr($fim, '"name":"', '"');
    $level = getStr($fim, '"brand":"', '"');
    $sheme = getStr($fim, '"scheme":"', '"');
    $abr = getStr($fim, '"alpha2":"', '"');
    $prepaid = getStr($fim, '"prepaid":"', '"');
    $phone = getStr($fim, '"phone":"', '"');
    $tipo = getStr($fim, '"type":"', '"');
    $binli = ''.$sheme.'             '.$tipo.'                 '.$level.'                              '.$prepaid.'                    '.$bank.'                       '.$pais.'                      '.$abr.'                   '.$phone.'';
    $binimax = strtoupper($binli);
    $curl->close();
    return $binimax;
}




class Vyper{

    public $Vyper;

    public function __construct()
    {
        if(!extension_loaded('curl')){
            throw new \RuntimeException('La extension Curl no existe');
        }
        
        global $cook;
        if(file_exists($cook)){
            unlink($cook);
        }
        
        $this->Vyper = curl_init();
        $agente = $this->get_agent();
        $this->setopt(CURLOPT_USERAGENT, $agente);
        $this->setopt(CURLOPT_HEADER, true);
        $this->setopt(CURLOPT_RETURNTRANSFER, true);
        $this->setopt(CURLOPT_SSL_VERIFYHOST, false);
        $this->setopt(CURLOPT_SSL_VERIFYPEER, false);
        $this->setopt(CURLOPT_TIMEOUT, 90);
        $this->setopt(CURLOPT_CONNECTTIMEOUT, 16);
        $this->setopt(CURLOPT_FOLLOWLOCATION,true);
        $this->setopt(CURLOPT_COOKIESESSION, true);
        $this->setopt(CURLOPT_COOKIEJAR, $cook);
        $this->setopt(CURLOPT_COOKIEFILE, $cook);
      //  $this->setopt(CURLOPT_COOKIE, $cook);
        return $this;
    }
    protected function preparepayload($data)
    {
        $this->setopt(CURLOPT_POST, true);
        if (is_array($data) || is_object($data)) {
            $skip = false;
            foreach ($data as $key => $value) {
                if ($value instanceof \CurlFile) {
                    $skip = true;
                }
            }
            if (!$skip) {
                $data = http_build_query($data);
            }
        }
        $this->setopt(CURLOPT_POSTFIELDS, $data);
    }

    protected function preparejsonpayload(array $data){
        $this->setopt(CURLOPT_POST, true);
        $this->setopt(CURLOPT_POSTFIELDS, json_encode($data));
    }

    public function exec(){
        return curl_exec($this->Vyper);
    }
  public function socks(){
                   $usrprx = 'g360c:g52x98bb';
            $this->setopt(CURLOPT_PROXY, '169.197.83.75:10080');
            $this->setopt(CURLOPT_PROXYUSERPWD, $usrprx);
            return $this;
    }
      public function sock(){
             $usrprx = 'ciorbpnl-rotate:h3nq5ilw0blr';
            $this->setopt(CURLOPT_PROXY, 'http://p.webshare.io:80');
            $this->setopt(CURLOPT_PROXYUSERPWD, $usrprx);
            return $this;
    }
    private function get_agent(){
           $ua =  array(
            "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:83.0) Gecko/20100101 Firefox/83.0",
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0",
            "Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0",
            "Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0",
            "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0",
            "Mozilla/5.0 (X11; Linux x86_64; rv:80.0) Gecko/20100101 Firefox/80.0",
            "Mozilla/5.0 (X11; Linux x86_64; rv:75.0) Gecko/20100101 Firefox/75.0",
            "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:79.0) Gecko/20100101 Firefox/79.0",
            "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:77.0) Gecko/20100101 Firefox/77.0",
            "Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.8) Gecko/20060110 Debian/1.5.dfsg-4 Firefox/1.5",
            "Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36",
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36 Edge/15.15063",
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299",
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36",
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36",
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36 OPR/49.0.2725.64",
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36",
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36"
    
           );
            return $ua[rand(0,17)];
        }
    
    
    public function setopt($opcion,$valor){
        return curl_setopt($this->Vyper, $opcion, $valor);
    }

    public function headers($header){
        return $this->setopt(CURLOPT_HTTPHEADER, $header);
    }

    public function post($url, $data = array(), $asJson = false)
    {
        $this->setopt(CURLOPT_URL, $url);
        if ($asJson) {
            $this->preparejsonPayload($data);
        } else {
            $this->preparepayload($data);
        }   
        return $this->exec();
    }

    

    public function close()
    {
        global $cook;
     if (is_resource($this->Vyper) || $this->Vyper instanceof \CurlHandle) {
                curl_close($this->Vyper);
        }
      if(file_exists($cook)){
           unlink($cook);
      } 
        $this->Vyper = null;
        return $this;
    }

    public function __destruct()
    {
        $this->close();
    }

    public function reset()
    {
        $this->close();
        $this->__construct();
        return $this;
    }


    public function setreferer($referer)
    {
        $this->setopt(CURLOPT_REFERER, $referer);
        return $this;
    }



    public function get($url)
    {
        $this->setopt(CURLOPT_URL, $url);
        $this->setopt(CURLOPT_HTTPGET, true);
        return $this->exec();
    }

    public function put($url, $data = array(), $payload = false)
    {
        if (! empty($data)) {
            if ($payload === false) {
                $url .= '?'.http_build_query($data);
            } else {
                $this->preparepayload($data);
            }
        }
        $this->setopt(CURLOPT_URL, $url);
        $this->setopt(CURLOPT_CUSTOMREQUEST, 'PUT');
        return $this->exec();
    }

    public function patch($url, $data = array(), $payload = false)
    {
        if (!empty($data)) {
            if ($payload === false) {
                $url .= '?'.http_build_query($data);
            } else {
                $this->preparepayload($data);
            }
        }
        $this->setopt(CURLOPT_URL, $url);
        $this->setopt(CURLOPT_CUSTOMREQUEST, 'PATCH');
        return $this->exec();
    }

    public function delete($url, $data = array(), $payload = false)
    {
        if (! empty($data)) {
            if ($payload === false) {
                $url .= '?'.http_build_query($data);
            } else {
                $this->preparepayload($data);
            }
        }

        $this->setopt(CURLOPT_URL, $url);
        $this->setopt(CURLOPT_CUSTOMREQUEST, 'DELETE');
        return $this->exec();
    }

}


?>