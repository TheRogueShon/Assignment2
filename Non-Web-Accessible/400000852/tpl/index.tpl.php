<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="/"><img src="images/logo.png" alt="Quwius"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<div id="lead-in">
		<h1>Feed Your Curiosity,<br>
				Take Online Courses from UWI</h1>

			<form name="course_search" method="post" action="index.php?controller=">
				<div class="wide-thick-bordered" >
				<input class="c-banner-search-input" type="text" name="formSearch" value="" placeholder="Find the right course for you">
				<button class="c-banner-search-button"></button>
				</div>
			</form>
		</div>
		<header></header>
		<main>
			<h1>Most Popular</h1>
			<?php
				$i = -1;
				$j = 0;
				foreach($popular as $k=>$c):
					$i++;
					$j++;
				if(($i % 4) == 0): ?>
					<div class="centered">
				<?php
				endif; ?>
				<section>
				<a href="#"><img src="images/<?php echo $c[5]?>" alt="<?php echo $c[1]?>" title="<?php echo $c[1]?>">
				<span class="course-title"><?php echo $c[1]?></span>
				<span><?php echo $instructors[$j][1];?></span></a>
				</section>
				<?php
					if (($i % 4) == 3): ?>
					</div>
				<?php
					endif;
				endforeach;
			?>
			<h1>Learner Recommended</h1>
			<?php
				$i = -1;
				$j = 0;
				foreach($recommended as $k=>$c):
					$i++;
					$j++;
				if(($i % 4) == 0): ?>
					<div class="centered">
				<?php
				endif; ?>
				<section>
				<a href="#"><img src="images/<?php echo $c[5]?>" alt="<?php echo $c[1]?>" title="<?php echo $c[1]?>">
				<span class="course-title"><?php echo $c[1]?></span>
				<span><?php echo $instructors[$j][1];?></span></a>
				</section>
				<?php
					if (($i % 4) == 3): ?>
					</div>
				<?php
					endif;
				endforeach;
				?>
			<footer>
				<nav>
					<ul>
						<li>&copy;2018 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>