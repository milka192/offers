<?php
	
			
			$host = 'localhost';
			$user = 'root';
			$password = 'dcplico';
			$dbName = 'produkty';
			
			$polacz = mysql_connect($host, $user, $password) or die('Błąd połączenia');
			$db = mysql_select_db($dbName, $polacz) or die(mysql_error());			
			
			
			$czas=date("Y-m-d H:i:s");
			$link = $_GET['link'];
			$klient = $_GET['klient'];
			$oferta = $_GET['oferta'];	
			
			$piece='adr';
			$total=$piece.'_produktu';
			$sql = "SELECT $total FROM linki WHERE link_id=".$link;
			$rezultat = mysql_query($sql, $polacz) or die(mysql_error());
			$wiersz = mysql_fetch_array( $rezultat );
			$adres=$wiersz['adr_produktu'];
			
			
			
			if(trim($link)!= '' &&trim($klient)!= '' && trim($oferta)!= '')
			{		
				$tab='wybory';
				$sql = "INSERT INTO $tab (czas, link, klient, oferta) VALUES ('$czas','$link','$klient','$oferta')";			
				$rezultat = mysql_query($sql, $polacz) or die(mysql_error());	
				
				header("Location: ".$adres);
			}

			else
			{
				echo "Dane są niekompletne";
			}
			
	   mysql_close($polacz);	 
	   
	   
?>
	