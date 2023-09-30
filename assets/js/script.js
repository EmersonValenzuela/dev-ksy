/*! -----------------------------------------------------------------------------------
        01. password show hide
        02. Background Image js
        03. sidebar filter
        04. Language js
        05. Translate js

 --------------------------------------------------------------------------------- */

(function ($) {
	"use strict";
	$(document).on("click", function (e) {
		var outside_space = $(".outside");
		if (
			!outside_space.is(e.target) &&
			outside_space.has(e.target).length === 0
		) {
			$(".menu-to-be-close").removeClass("d-block");
			$(".menu-to-be-close").css("display", "none");
		}
	});

	$(".prooduct-details-box .close").on("click", function (e) {
		var tets = $(this).parent().parent().parent().parent().addClass("d-none");
	});

	if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
		$(".sidebar-list").hover(
			function () {
				$(this).addClass("hoverd");
			},
			function () {
				$(this).removeClass("hoverd");
			}
		);
		$(window).on("scroll", function () {
			if ($(this).scrollTop() < 600) {
				$(".sidebar-list").removeClass("hoverd");
			}
		});
	}

	/*----------------------------------------
     password show hide
     ----------------------------------------*/
	$(".show-hide").show();
	$(".show-hide span").addClass("show");

	$(".show-hide span").click(function () {
		if ($(this).hasClass("show")) {
			$('input[name="password"]').attr("type", "text");
			$(this).removeClass("show");
		} else {
			$('input[name="password"]').attr("type", "password");
			$(this).addClass("show");
		}
	});
	$('form button[type="submit"]').on("click", function () {
		$(".show-hide span").addClass("show");
		$(".show-hide")
			.parent()
			.find('input[name="password"]')
			.attr("type", "password");
	});

	/*=====================
      02. Background Image js
      ==========================*/
	$(".bg-center").parent().addClass("b-center");
	$(".bg-img-cover").parent().addClass("bg-size");
	$(".bg-img-cover").each(function () {
		var el = $(this),
			src = el.attr("src"),
			parent = el.parent();
		parent.css({
			"background-image": "url(" + src + ")",
			"background-size": "cover",
			"background-position": "center",
			display: "block",
		});
		el.hide();
	});

	$(".mega-menu-container").css("display", "none");
	$(".header-search").click(function () {
		$(".search-full").addClass("open");
	});
	$(".close-search").click(function () {
		$(".search-full").removeClass("open");
		$("body").removeClass("offcanvas");
	});
	$(".mobile-toggle").click(function () {
		$(".nav-menus").toggleClass("open");
	});
	$(".mobile-toggle-left").click(function () {
		$(".left-header").toggleClass("open");
	});
	$(".bookmark-search").click(function () {
		$(".form-control-search").toggleClass("open");
	});
	$(".filter-toggle").click(function () {
		$(".product-sidebar").toggleClass("open");
	});
	$(".toggle-data").click(function () {
		$(".product-wrapper").toggleClass("sidebaron");
	});
	$(".form-control-search input").keyup(function (e) {
		if (e.target.value) {
			$(".page-wrapper").addClass("offcanvas-bookmark");
		} else {
			$(".page-wrapper").removeClass("offcanvas-bookmark");
		}
	});
	$(".search-full input").keyup(function (e) {
		if (e.target.value) {
			$("body").addClass("offcanvas");
		} else {
			$("body").removeClass("offcanvas");
		}
	});

	$("body").keydown(function (e) {
		if (e.keyCode == 27) {
			$(".search-full input").val("");
			$(".form-control-search input").val("");
			$(".page-wrapper").removeClass("offcanvas-bookmark");
			$(".search-full").removeClass("open");
			$(".search-form .form-control-search").removeClass("open");
			$("body").removeClass("offcanvas");
		}
	});
	$(".mode").on("click", function () {
		const bodyModeDark = $("body").hasClass("dark-only");

		if (!bodyModeDark) {
			$(".mode").addClass("active");
			localStorage.setItem("mode-cuba", "dark-only");
			$("body").addClass("dark-only");
			$("body").removeClass("light");
		}
		if (bodyModeDark) {
			$(".mode").removeClass("active");
			localStorage.setItem("mode-cuba", "light");
			$("body").removeClass("dark-only");
			$("body").addClass("light");
		}
	});
	$("body").addClass(
		localStorage.getItem("mode-cuba")
			? localStorage.getItem("mode-cuba")
			: "light"
	);
	$(".mode").addClass(
		localStorage.getItem("mode-cuba") === "dark-only" ? "active" : " "
	);

	// sidebar filter
	$(".md-sidebar .md-sidebar-toggle ").on("click", function (e) {
		$(".md-sidebar .md-sidebar-aside ").toggleClass("open");
	});

	$(".loader-wrapper").fadeOut("slow", function () {
		$(this).remove();
	});

	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 600) {
			$(".tap-top").fadeIn();
		} else {
			$(".tap-top").fadeOut();
		}
	});

	$(".tap-top").click(function () {
		$("html, body").animate(
			{
				scrollTop: 0,
			},
			600
		);
		return false;
	});
	(function ($, window, document, undefined) {
		"use strict";
		var $ripple = $(".js-ripple");
		$ripple.on("click.ui.ripple", function (e) {
			var $this = $(this);
			var $offset = $this.parent().offset();
			var $circle = $this.find(".c-ripple__circle");
			var x = e.pageX - $offset.left;
			var y = e.pageY - $offset.top;
			$circle.css({
				top: y + "px",
				left: x + "px",
			});
			$this.addClass("is-active");
		});
		$ripple.on(
			"animationend webkitAnimationEnd oanimationend MSAnimationEnd",
			function (e) {
				$(this).removeClass("is-active");
			}
		);
	})(jQuery, window, document);

	// active link

	$(".chat-menu-icons .toogle-bar").click(function () {
		$(".chat-menu").toggleClass("show");
	});

	$(document).ready(function () {
		if (localStorage.getItem("primary") != null) {
			var primary_val = localStorage.getItem("primary");
			$("#ColorPicker1").val(primary_val);
			var secondary_val = localStorage.getItem("secondary");
			$("#ColorPicker2").val(secondary_val);
		}

		$(document).click(function (e) {
			$(".translate_wrapper, .more_lang").removeClass("active");
		});
		$(".translate_wrapper .current_lang").click(function (e) {
			e.stopPropagation();
			$(this).parent().toggleClass("active");

			setTimeout(function () {
				$(".more_lang").toggleClass("active");
			}, 5);
		});
	});

	$(".mobile-title svg").click(function () {
		$(".header-mega").toggleClass("d-block");
	});

	$(".onhover-dropdown").on("click", function () {
		$(this).children(".onhover-show-div").toggleClass("active");
	});

	$("#flip-btn").click(function () {
		$(".flip-card-inner").addClass("flipped");
	});

	$("#flip-back").click(function () {
		$(".flip-card-inner").removeClass("flipped");
	});

	//INPUTS

	$(".input_numb").on("input", function () {
		this.value = this.value.replace(/[^0-9.]/g, "");
	});
})(jQuery);

function alert_type(t, h, i, d) {
	const url_base = $("#url_base").val();
	const audio = new Audio(url_base + "assets/sounds/alert.mp3");
	audio.play();
	$.toast({
		text: t, // Text that is to be shown in the toast
		heading: h, // Optional heading to be shown on the toast
		icon: i, // Type of toast icon
		showHideTransition: "plain", // fade, slide or plain
		allowToastClose: true, // Boolean value true or false
		hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
		stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
		position: "top-right", // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values

		textAlign: "left", // Text alignment i.e. left, right or center
		loader: true, // Whether to show loader or not. True by default
		loaderBg: "#ffff",
	});
}
