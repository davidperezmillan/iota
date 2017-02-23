<?php
		include('./db.class.php'); // call db.class.php
		include('./properties.php'); // call db.class.php
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
		
		$container = array("data" => array());
		$rows = array();	
		foreach($links as $link) { // display the list
			$rows['id'] = $link['id'];
			$serie = str_replace("-", " ", explode("/", $link['serie'])[2]);
			$rows['serie'] = $serie;
			$rows['title'] = $link['title'];
			$rows['season'] = $link['season'];
			$rows['episode'] = $link['episode'];
			$rows['link_8'] = $link['link_8'];
			$rows['link_36'] = $link['link_36'];
			array_push($container['data'], $rows);
		}
		echo json_encode($container);
		
?>
