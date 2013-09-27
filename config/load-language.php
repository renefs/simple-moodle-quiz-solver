<?php 
	$locale='';
	$siteLanguages=array("es","us");
	//Si se pone de manera manual, debe tener preferencia.
	//Se asigna a la sesión el idioma seleccionado
	$languageTemp='es_ES';
	if(isset($_COOKIE['lang_miw_rfs']))
		$languageTemp=stripcslashes($_COOKIE['lang_miw_rfs']);
	//Si el usuario ha pulsado el botón
	if (isset($_GET['lang'])){
		
		setcookie("lang_miw_rfs", stripcslashes($_GET['lang']));
		$languageTemp = stripcslashes($_GET['lang']);
	}
	
	//Si ya se ha definido el idioma anteriormente
	if (isset($_COOKIE['lang_miw_rfs']) || $languageTemp!=''){
    
    	$language= $languageTemp;
		//$_SESSION['lang'] =$locale;
		
	}else{
		
		//Por defecto se muestra el idioma de las cabeceras HTTP
		if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		    // break up string into pieces (languages and q factors)
		    preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $lang_parse);
		
		    if (count($lang_parse[1])) {
		        // create a list like "en" => 0.8
		        $langs = array_combine($lang_parse[1], $lang_parse[4]);
		    	
		        // set default to 1 for any without q factor
		        foreach ($langs as $lang => $val) {
		            if ($val === '') $langs[$lang] = 1;
		        }
		
		        // sort list based on value	
		        arsort($langs, SORT_NUMERIC);
		    }
		}
		
		$acceptedLanguages=array();
		
		$siteLanguageFound=false;
		foreach ($langs as $lang => $val) {
			$acceptedLanguages[]=$lang;
			
			if(in_array($lang, $siteLanguages)){
				setcookie("lang_miw_rfs", $lang);
				$siteLanguageFound=true;
				$language = $lang;
			}
		}
		
		//Si no se ha encontrado ningún idioma compatible, se pone en inglés.
		if(!$siteLanguageFound){
			setcookie("lang_miw_rfs", 'en');
			$language = 'en';
		}
		
	}
	
	switch($language){
		
		case 'es':
			$locale = 'es_ES';
		break;
		
		case 'en':
		default:
			$locale = 'en_US';

	}
	
	putenv("LC_MESSAGES=$locale");
	setlocale(LC_MESSAGES, $locale);
	bindtextdomain("messages", "locale");
	bind_textdomain_codeset('messages', 'UTF-8');
	textdomain("messages");
	
	?>