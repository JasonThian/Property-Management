<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - Project Management System</title>
	<link rel="stylesheet" href="style/style.css"/>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<?php
		include "navbar.php";
	?>
	
	<div class="user-list">
		<div class="top-bar">
			<i id="searchbar" class="fa fa-search"></i><input name="searchbar" type="text" placeholder="Search for user">
		</div>
		
		<div class="pagination-container">
			<nav>
				<ul class="pagination"></ul>
			</nav>
		</div>
		
		<div class="chatbox">
			  <div class="col-md-12 border-bottom" id="livechat-resident">		
				
			  </div>
		  </div>
	</div>
	<script type="text/javascript">
	/* Redirect function */
//	document.getElementsByClassName('friend-drawer').onclick = function(){
//		location.href("chatbox.html");
//	};
		
	/* Pagination */
//		$('#pagination-demo').twbsPagination({
//	  totalPages: 5,
//	  // the current page that show on start
//	  startPage: 1,
//
//	  // maximum visible pages
//	  visiblePages: 5,
//
//	  initiateStartPageClick: true,
//
//	  // template for pagination links
//	  href: false,
//
//	  // variable name in href template for page number
//	  hrefVariable: '{{number}}',
//
//	  // Text labels
//	  first: 'First',
//	  prev: 'Previous',
//	  next: 'Next',
//	  last: 'Last',
//
//	  // carousel-style pagination
//	  loop: false,
//
//	  // callback function
//	  onPageClick: function (event, page) {
//		$('.page-active').removeClass('page-active');
//		$('#page'+page).addClass('page-active');
//	  },
//
//	  // pagination Classes
//	  paginationClass: 'pagination',
//	  nextClass: 'next',
//	  prevClass: 'prev',
//	  lastClass: 'last',
//	  firstClass: 'first',
//	  pageClass: 'page',
//	  activeClass: 'active',
//	  disabledClass: 'disabled'
//
//	});
//	})
	</script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-functions.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase-storage.js"></script>
<script src="firebase.js"></script>
<script src="auth(logged in).js"></script>
<script src="livechat_list.js"></script>
</body>
</html>