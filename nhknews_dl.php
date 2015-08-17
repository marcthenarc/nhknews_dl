<?php
/*
	  "THE BEER-WARE LICENSE" (Minimal revision no.: 6% ABV)


Marc St-Jacques <marc@geekchef.com> wrote this file. It comes without any
warranty, to the extent permitted by applicable law. As long as you retain this
notice you can do whatever you want with this stuff. If we meet some day, and
you think this stuff is worth it, you can buy me a beer in return.
*/

	# Get file for the NHK website.
	$xml = file_get_contents(
		"http://www.nhk.or.jp/r-news/podcast/nhkradionews.xml");

	# Parse file for all http:// references to mp3 files.
	preg_match_all("/http:\/\/.*\.mp3/", $xml, $out, PREG_SET_ORDER);

	# For each reference ...
	foreach ($out as $values) {
		# Keep the URL.
		$url = $values[0];

		# We much know the name of each individual file so that we check if we
		# already have it.  Split each url from slashes.  The last one is it. 
		$slashes = explode('/', $url); $filename = array_pop($slashes);

		# If we don't already have this file, execute wget to retrieve it.
		if (file_exists($filename) === false) system("wget " . $v[0]); }

	# Enjoy your daily dose of Japanese news. :-)
?>
