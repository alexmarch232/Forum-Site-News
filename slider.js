$(document).ready(function() {
			$(".btn_slide").click(function() {
				$("#panel").slideToggle("slow");
				$(this).toggleClass("active");
				return false;		
			});
});

		