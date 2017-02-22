<?php
		include('model/db.class.php'); // call db.class.php
		include('model/properties.php'); // call db.class.php
		$bdd = new db($propBBDD); // create a new object, class db()
		
		/*
		    $query = $bdd->execute('INSERT INTO users (firstname, lastname) VALUES ("firstname1", "lastname1")');
		*/
		
		$sqlGeneral = "SELECT DISTINCT(tmp.id), 
		    	tmp.serie, tmp.title,tmp.season, tmp.episode,
		    	(select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=8) as link_8, 
		    	(select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=36) as link_36,
		    	tmp.status
		    FROM temporadas tmp
		    WHERE tmp.status = 0
		    and ((select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=8) is not null or (select eml.link from enlaces eml where eml.episode=tmp.id and eml.type=36) is not null)";
		
		
		$links = $bdd->getAll($sqlGeneral);
		
		$container = array();
		$rows = array();	
		foreach($links as $link) { // display the list
			$row['id'] = $link['id'];
			$data = array();
			$serie = str_replace("-", " ", explode("/", $link['serie'])[2]);
			$data[0] = $serie;
			$data[1] = $link['title'];
			$data[2] = $link['season'];
			$data[3] = $link['episode'];
			$data[4] = ($link['link_8']) ?  'Stream - '. $link['link_8'].'^'.$link['link_8']: "";
			$data[5] = ($link['link_36']) ?  'Pow - '. $link['link_36'].'^'.$link['link_36']: "";
			
			$row['data'] = $data;
			array_push($rows,$row);
		}
		$container['rows'] = $rows;
		print json_encode($container, JSON_NUMERIC_CHECK);
		
?>
