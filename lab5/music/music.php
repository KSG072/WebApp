<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
		$song_count = 1234;
		?>
		<p>
			I love music.
			I have <?=$song_count?> total songs,
			which is over <?= (int) ($song_count/10) ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
		
			<ol>
			    <?php
				$pages= (int)$_GET["newspages"];
				for($news_pages=11; $news_pages>11-$pages; $news_pages--){
					print '<li><a href="https://www.billboard.com/archive/article/2019'.$news_pages.'">2019-'.$news_pages.'</a></li>';
				}
				?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
				foreach(file("favorite.txt") as $artist){
					$token = explode(" ",$artist);
					$address = implode("_", $token);
					print '<li><a href="http://en.wikipedia.org/wiki/'.$address.'">'.$artist.'</a></li>';
				}?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				$mp3list = array();
				foreach(glob("lab5/musicPHP/songs/*.mp3") as $song){
					$mp3list[floor(filesize($song)/1024)] = basename($song);
				}
				krsort($mp3list);
				foreach($mp3list as $size => $song){
					print '<li class="mp3item">
					    <a href="'.$song.'">'.basename($song).'</a> ('.$size.' KB)';
				}
				?>
				
				<!-- Exercise 8: Playlists (Files) -->
				<?php
				$bigm3ulist = glob("lab5/musicPHP/songs/*.m3u");
				rsort($bigm3ulist);
				foreach($bigm3ulist as $m3ulist){
					print '<li class="playlistitem">'.basename($m3ulist).':</li>
					<ul>';
					$list = file($m3ulist);
					shuffle($list);
					foreach($list as $element){
						if(strpos($element, '#')===false){
							print '<li>'.$element.'</li>';
						}
					}
					print '</ul>';
				}
				?>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
