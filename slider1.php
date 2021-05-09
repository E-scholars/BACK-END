<div>
<link rel="stylesheet" type="text/css" href="css/style1.css">
    <style>
		html{
			background:#fff8de;
			
		}
			.slideshow-container {
				width: 100%;
				position: relative;
				margin: auto;
				z-index:-1;
			}
			img{vertical-align: middle;}
			.prev, .next {
				cursor: pointer;
				position: absolute;
				top: 50%;
				width: auto;
				padding: 16px;
				margin-top: -22px;
				color: white;
				font-weight: bold;
				font-size: 18px;
				transition: 0.6s ease;
				border-radius: 0 3px 3px 0;
				user-select: none;
			}
			.next {
				right: 0;
				border-radius: 3px 0 0 3px;
			}
			.prev:hover, .next:hover {
				background-color: rgba(0,0,0,0.8);
			}
			.text {
				color: #f2f2f2;
				font-size: 15px;
				padding: 8px 12px;
				position: absolute;
				bottom: 8px;
				width: 100%;
				text-align: center;
			}
			.dot {
				height: 15px;
				width: 15px;
				margin: 0 2px;
				background-color: #fff ;
				opacity:.4;
				border-radius: 50%;
				display: inline-block;
				transition: background-color 0.6s ease;
				
				
			}
			.active, .dot:hover {
				background-color: #bbb;
			}
			.fade {
				-webkit-animation-name: fade;
				-webkit-animation-duration: 3s;
				animation-name: fade;
				animation-duration: 3s;
			}
			@-webkit-keyframes fade {
				from {opacity: .5} 
				to {opacity: 1}
			}

			@keyframes fade {
				from {opacity: .5} 
				to {opacity: 1}
			}
			.proceed{
					position: relative;
					width: 100%;
					height: 36px;
					border-radius: 18px;
					background-color: #810000;
					border: solid 1px transparent;
					color: #fff;
					font-size: 18px;
					font-weight: 300;
					cursor: pointer;
					transition: all .1s ease-in-out;}
					:hover{
						background: transparent;
						border-color: #fff;
						transition: all .1s ease-in-out;
					}
				
				.onslider{
					position:absolute;
					width:20%;
					height:300px;
				}
				
            .onslider a{
                height: 36px;
                display:inline-block;
                margin:.5%;
            }
        }		
		</style>
	<div style="height:100%; margin-bottom:0;" >
		<div class="onslider"style="transform: translate(+40%, +15%);">
				<img src="img/logoo.png" style="width:50%;">
		</div>
        
			<div class="text" style="text-align:center;transform: translate(50%,-100%);width:50%;">
			<h1 style="color:#fff;font-weight:solid;font-size:300%;background:rgb(88,00,00,.2);">
			Empowering students to create solutions for tomorrow’s challenges<h1>
			</div>	
            
		<div class="onslider"style="transform: translate(+80%, +20%);width:50%;">
				<a href="admin_login.php"style="width:17%;">
					<button class="proceed">Admin</button>
				</a>
				<a href="class_management_login.php"style="width:23%;">
					<button class="proceed">Class Manager</button>
				</a>			
                <a href="fee_management_login.php"style="width:17%;">
					<button class="proceed">Accountant</button>
				</a>
                <a href="teacher_login.php"style="width:17%;">
					<button class="proceed">Teacher</button>
				</a>
                <a href="student_login.php"style="width:17%;">
					<button class="proceed">Student</button>
				</a>
		</div>
		<div class="slideshow-container">

			<div class="mySlides fade">
				<img src="img/bg111.jpg" style="width:100%;max-height:90vh;">
			</div>

			<div class="mySlides fade">
				<img src="img/bg22.jpg" style="width:100%;max-height:90vh;">
			</div>

			<div class="mySlides fade">
				<img src="img/bg33.jpg" style="width:100%;max-height:90vh;">
			</div>

			<div class="mySlides fade">
				<img src="img/bg44.jpg" style="width:100%;max-height:90vh;">
			</div>
			<!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a> -->
		</div>
		<br>

		<div style="text-align:center;transform: translate(0,-300%);">
			<span class="dot"></span> 
			<span class="dot"></span> 
			<span class="dot"></span> 
			<span class="dot"></span> 

		</div>
		
		
		

<script>
				var slideIndex = 0;
				showSlides();

				function showSlides() {
					var i;
					var slides = document.getElementsByClassName("mySlides");
					var dots = document.getElementsByClassName("dot");
					for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";  
					}
					slideIndex++;
					if (slideIndex > slides.length) {slideIndex = 1}    
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					}
					slides[slideIndex-1].style.display = "block";  
					dots[slideIndex-1].className += " active";
					setTimeout(showSlides, 3000); // Change image every 2 seconds
				}
	</script>
	</div>
</div>