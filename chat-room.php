<?php 

// system("cls");
function banner()
{
	echo "welcome bitch \n";
}

function match($str)
{
	$re = '/<b>(.*?)<\/b>/m';
	preg_match($re, $str, $matches, PREG_OFFSET_CAPTURE, 0);

	return $matches[1][0];
}


function daftar($nick,$username,$password)
{
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://realsupplementadvisor.com/chat_room/daftar.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "nick=".$nick."&username=".$username."&password=".$password."&submit=");
curl_setopt($ch, CURLOPT_USERAGENT, "terminal");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

$cek = match($server_output);
print $cek;

}

function login($username,$password)
{
		$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://realsupplementadvisor.com/chat_room/chat.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "username=".$username."&password=".$password);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

print $server_output;
}

function chat($username,$password,$chat)
{
		$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://realsupplementadvisor.com/chat_room/chat.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "username=".$username."&password=".$password."&isichat=".$chat."");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

print $server_output;

}

function update($username,$password)
{
			$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://realsupplementadvisor.com/chat_room/chat.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "username=".$username."&password=".$password."&update=");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);

print $server_output;

}

function menu()
{
system("clear"); 
    echo "\033[91m    ██████╗██╗  ██╗ █████╗ ████████╗    ██████╗  ██████╗  ██████╗ ███╗   ███╗\n";
    echo "\033[91m   ██╔════╝██║  ██║██╔══██╗╚══██╔══╝    ██╔══██╗██╔═══██╗██╔═══██╗████╗ ████║\n";
    echo "\033[91m   ██║     ███████║███████║   ██║       ██████╔╝██║   ██║██║   ██║██╔████╔██║\n";
    echo "\033[97m   ██║     ██╔══██║██╔══██║   ██║       ██╔══██╗██║   ██║██║   ██║██║╚██╔╝██║\n";
    echo "\033[97m   ╚██████╗██║  ██║██║  ██║   ██║       ██║  ██║╚██████╔╝╚██████╔╝██║ ╚═╝ ██║\n";
    echo "\033[97m    ╚═════╝╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝       ╚═╝  ╚═╝ ╚═════╝  ╚═════╝ ╚═╝     ╚═╝\n";
    echo "\033[91m   |                Coded By\033[93m Rijone01\033[91m From\033[93m PhobiaXploit\033[91m                     |\n";                    
    echo "\033[97m   --------------------------------------------------------------------------\n";
    echo "\033[95m   Note: Ketik 'Update' Di Message Jika Mau Refresh Layar\n\n";
	echo "\033[93m       [\033[91m1\033[93m]\033[96m Register Account \n";
	echo "\033[93m       [\033[91m2\033[93m]\033[96m Login + chatting \n";
	echo "\033[93m       [\033[91mE\033[93m]\033[96m Exit \n\033[91m";
}

banner();


menu();


echo "Option: \033[97m";
$command = trim(fgets(STDIN, 1024));

if($command == 1){
	echo "masukan nick : ";
	$nick = trim(fgets(STDIN, 1024));
	echo "masukan username : ";
	$username = trim(fgets(STDIN, 1024));
	echo "masukan password : ";
	$password = trim(fgets(STDIN, 1024));
	echo "\n";
	daftar($nick,$username,$password);
	echo "\n";
} elseif ($command == 2) {
	echo "masukan username : ";
	$username = trim(fgets(STDIN, 1024));
	echo "masukan password : ";
	$password = trim(fgets(STDIN, 1024));
	login($username,$password);
	while (true) {
	    update($username,$password);
		echo "send message : ";
		$message = trim(fgets(STDIN, 1024));
		system("clear");
		if(trim($message) == "update")
		{
			update($username,$password);
		} else {
			chat($username,$password,$message);	
			update($username,$password);
		} 
		if(trim($message) == "exit")
		{
		    break;
		}    
		sleep(1);
		

	}
} elseif ($command == "E") {
    exit;
}    


 ?>
