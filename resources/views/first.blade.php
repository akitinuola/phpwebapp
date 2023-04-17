<!DOCTYPE html>
<html>
<head>
	<title>Image Slideshow</title>
	<style>
		/* Set width and height of slideshow container */
		.slideshow {
			width: 100%;
			height: 400px;
			overflow: hidden;
		}

		/* Style the slideshow images */
		.slideshow img {
			width: 100%;
			height: 400px;
			object-fit: cover;
		}
	</style>
</head>
<body>
	<div class="slideshow">
		<img class="slide" src="phelps.jpg">
		<img class="slide" src="swim.jpg">
		<img class="slide" src="swam.jpg">
	</div>

	<script>
		// Set the slide index to 0
		var slideIndex = 0;
		// Get all the slideshow images
		var slides = document.getElementsByClassName("slide");
		// Set the time interval for the slideshow to change images
		var interval = setInterval(changeSlide, 2000);

		// Function to change the slide index and display the corresponding image
		function changeSlide() {
			// Hide all the slideshow images
			for (var i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			// Increment the slide index
			slideIndex++;
			// If the slide index is greater than the number of images, reset it to 1
			if (slideIndex > slides.length) {
				slideIndex = 1;
			}
			// Display the corresponding image based on the slide index
			slides[slideIndex-1].style.display = "block";
		}
	</script>
</body>
</html>