<?php
$cookie = $_GET['cookie'];
$serectkey = $_GET['serectkey'];
$encrypted = $_GET['data'];
// $cookie = "zpw_sek=GfEx.291263581.a0.0-5PDE9Qlmo_3kCTmrg_39buscV0O9ruYoFMHj5YqpIk2yLOioxrFzPixtYpPu8kdprTzFpiuRJWMomVE0I_30";
// $serectkey ="tiyiJ38l8LQzTQtJ346PtQ==";
// $encrypted = "wzcrlLGBNNb23fWVBe0UiJBBzhfcYCupZdCF8OF7WA4foano1Gr/yt1pNE0cxL2ltWAcTjc4bzYJDrNnYGOD6d/pgx8oh4wGStFImo1hDUBgfUhWAH1odWpxPvgwEcnb04u/68TJJapObV7s6GHLtry3C/7YNUnsZtyJ0hdwIOPv6DTPXo8rWiYNNChNhCq7W+sC6dB7kzA+BMO16Da7OPVWMGWvWDLmjvMRUGsgc64/tIW8SQ/a2WUPCIm1DjP70P2dGeVTXXXK7cTGTPOH/9r6F6KE2McbUH1XrhK+hykeqczaCnoMREugFdDke/UZrs5q4IpqzBfyAZitGktWTsNaYqzX1xinB9AXAwNbV0SHl6V0V2ijPhENQuvB4+3Ym+EIV17HR/qR/DCzmQqn8xM+Hv3h1HXSSk+9gM0nw5W2H5jvgFCFyyv/OArLuSCG+Mx53S6axjRROYgCrXAzFlktjcu/SLGfefYd6SbS+P+ULqtDF2rlPVNvRuT26lDgxI8+TG/RTe38Bt5nftwxKfTv5KhvsvaWENGE2x3MkhxrJfqXj9yEw9LEH2v4PPtG74vxTarmYN+EYTEvi7aw73ODHNd8rdzmBbwnUnQfAIo=";


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://files-wpa.chat.zalo.me/api/group/photo_original/send?zpw_ver=51&zpw_type=30&nretry=0",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "params=".urlencode($encrypted),
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
		    "cookie: ".$cookie."",
		    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36"
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		var_dump($response);



?>