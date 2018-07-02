<style>
	/* .totop {position: fixed;bottom: 50px;right: 50px;cursor: pointer;display: none;color: #fff;height: 50px;line-height: 50px;
		padding: 0 30px;font-size: 18px;height:50px;margin-right:-55px;
	} */
	#back-to-top {
    position: fixed;bottom: 50px;right: 50px;cursor: pointer;display: none;color: #fff;height: 50px;line-height: 50px;
		padding: 0 30px;font-size: 18px;height:50px;margin-right:-55px;
}

#back-to-top.show {
    opacity: 1;
}
</style>
	
	<!-- <a href="#" id="back-to-top" title="Back to top">&uarr;</a> -->
	<img src="<?=base_url('assets/top.png')?>" id="back-to-top" alt="" class="img img-responsive">

		<!-- Start footer -->
		<footer class="footer" style="height:20px;margin:0;">
			<div class="container" style="height:20px;margin-top:-25px;">
				<div class="row">
					<div class="col-md-12" style="height:20px;text-center;margin:0px;">
							<p class="text-center;">COPYRIGHT &copy; MAGZ <?php echo date('Y');?>. ALL RIGHT RESERVED.</p>					
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->
		<!-- <script>
        $('.totop').tottTop({
            scrollTop: 100
        });
    </script> -->
		<!-- JS -->
		<script src="<?=base_url('assets/front/js/jquery.js')?>"></script>
		<script src="<?=base_url('assets/front/js/jquery.migrate.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/bootstrap/bootstrap.min.js')?>"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="<?=base_url('assets/front/scripts/jquery-number/jquery.number.min.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/owlcarousel/dist/owl.carousel.min.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/magnific-popup/dist/jquery.magnific-popup.min.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/easescroll/jquery.easeScroll.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/sweetalert/dist/sweetalert.min.js')?>"></script>
		<script src="<?=base_url('assets/front/scripts/toast/jquery.toast.min.js')?>"></script>
		<!-- <script src="<?=base_url('assets/front/js/demo.js')?>"></script> -->
		<script src="<?=base_url('assets/front/js/e-magz.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/moment-with-locales.min.js')?>"></script>
		<!--JAM-->
		<script src="<?php echo base_url('assets/jam/jqClock.min.js')?>"></script>
		<script type="text/javascript">
			if ($('#back-to-top').length) {
				var scrollTrigger = 100, // px
				backToTop = function () {
					var scrollTop = $(window).scrollTop();
					if (scrollTop > scrollTrigger) {
						$('#back-to-top').addClass('show');
					}else{
						$('#back-to-top').removeClass('show');
					}
				};
				backToTop();
				$(window).on('scroll', function () {
					backToTop();
				});
				$('#back-to-top').on('click', function (e) {
					e.preventDefault();
					$('html,body').animate({
							scrollTop: 0
					}, 700);
				});
			}

			$(document).ready(function(){    
				$("#jam").clock({"format":"24","calendar":"false"});
			});    
		</script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js'></script>
		<script>
			$(document).on('click', '[data-toggle="lightbox"]', function(event) {
				event.preventDefault();
				$(this).ekkoLightbox();
			});
		</script>
	</body>
</html>