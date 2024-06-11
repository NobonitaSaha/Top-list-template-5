<?php
	$rowOpts = [
        [
            'sp' => 'https://track.rdtrk.xyz/click/1?clickid={clickid}',
            'mp' => 'https://track.rdtrk.xyz/click/4?clickid={clickid}',
        ],
        [
            'sp' => 'https://track.rdtrk.xyz/click/2?clickid={clickid}',
            'mp' => 'https://track.rdtrk.xyz/click/5?clickid={clickid}',
        ]
	];



	require_once '/app/common/jciredirect.php';
    	$res = jciredirect::init([
    		'lockdown.enabled' => true,
    		'cloaker.tier' => 'tier-1',
    		'cloaker.campaign_id' => '479675',
    		'cloaker.dir' => __DIR__,
   	]);

	if(!isset($_GET['id'])){
		exit;
	}

	$id = $_GET['id'];
	$clickid = $_GET['clickid'];

	if(!isset($rowOpts[$id-1])){
		exit;
	}

	if($res !== FALSE){
		$r = explode( ",", $res );

		if($r[0] == 'true' ){
			$mp = str_replace( '{clickid}', $clickid, $rowOpts[$id-1]['mp']);
			header('Location: ' . $mp, TRUE, 301);
			exit;
		}

	}

	$sp = str_replace( '{clickid}', $clickid, $rowOpts[$id-1]['sp']);
      	header('Location: ' . $sp, TRUE, 301);

?>
