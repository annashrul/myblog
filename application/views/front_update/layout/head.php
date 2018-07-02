<!DOCTYPE html>
<html>
	<head>
	<link rel="shortcut icon" href="<?=base_url('assets/logo.jpg') ?>">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Magz is a HTML5 & CSS3 magazine template is based on Bootstrap 3.">
		<meta name="author" content="annashrul yusuf, anasrulysf, acuy, blogku, nenek mellow, aromanis simping">
		<meta name="keywords" content="<?=$seo?>">
    	<meta name="description" content="<?=$seo?>">
		<!-- Shareable -->
		<meta property="og:title" content="<?=$title?>" />
		<meta property="og:type" content="<?=$seo?>" />
		<meta property="og:url" content="https://anasrulysf.com" />
		<meta property="og:image" content="https://raw.githubusercontent.com/nauvalazhar/Magz/master/images/preview.png" />
		<title><?=$title?></title>
		<link rel="stylesheet" href="<?=base_url('assets/css/eko-lightbox.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/css/font-awesome.min.css')?>">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/bootstrap/bootstrap.min.css')?>">
		<!-- IonIcons -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/ionicons/css/ionicons.min.css')?>">
		<!-- Toast -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/toast/jquery.toast.min.css')?>">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/owlcarousel/dist/assets/owl.carousel.min.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/owlcarousel/dist/assets/owl.theme.default.min.css')?>">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/magnific-popup/dist/magnific-popup.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/front/scripts/sweetalert/dist/sweetalert.css')?>">
		<!-- Custom style -->
		<link rel="stylesheet" href="<?=base_url('assets/front/css/style.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/front/css/skins/all.css')?>">
		<link rel="stylesheet" href="<?=base_url('assets/front/css/demo.css')?>">
		<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5abbb7b71243c10013440c3f&product=inline-share-buttons' async='async'></script>
  
  <script src="<?=base_url('assets/js/jquery.js')?>"></script>
	<script src="<?=base_url('assets/js/totop.min.js')?>"></script>
  
	</head>
	<style type="text/css">
		/*INSTAGRAM*/
		/* Body for this page */
		/* Instagrid.css */
		instagrid-title, h2, p {text-align: center;font-family: 'Open Sans';} 
		strong {font-weight:800;}
		/* Instagrid.css media queries */
		@media screen and (max-width : 480px) {
			#ody li{width:25%}
			#ody li:nth-child(1){width:50%}
		}
		#ody{width:100%;display:block;margin:0;padding:0;line-height:0}
		#ody img{height:100%;width:100%;margin: 1px 1px;}
		#ody a{padding:0;margin:0;position:relative;display:inline-block}
		#ody li{width:16.66%;display:inline-block;position:relative;margin:0!important;padding:0px!important;float:left}
		#ody li:nth-child(1){width:33.33%}
		/*#ody li:nth-child(2) {
		    width: 33.33%; 
		}*/
		#ody .instagrid-z{width:100%;height:100%;margin-top:-100%;opacity:0;letter-spacing:1px;background:rgba(0,0,0,0.7);position:absolute;font:normal 600 12px Catamaran, sans-serif;color:#ffffff;line-height:normal}
		#ody a:hover .instagrid-z{opacity:1;zoom:1;filter:alpha(opacity=100);}
		.instagrids{display:table;vertical-align:middle;height:100%;width:100%}
		.instagrid-outter{display:table-cell;vertical-align:middle;height:100%;width:100%;text-align:center;}
		#instagridz.widget.insta h2.title{text-align:center;}
		#instagridz.widget.insta h2.title:before{content:&#39;&#39;;border-top:0px solid #efefef;left:0;right:0;position:absolute;top:50%}
		#instagridz.widget.insta h2.title p{display:inline-block;background:#000;padding:0 20px;position:relative}}
		/*END INSTAGRAM*/
	</style>
	<script type='text/javascript'>
  	(function(){var e,t;e=function(){function e(e,t){var n,r;this.options={target:"ody",get:"popular",resolution:"thumbnail",sortBy:"none",links:!0,mock:!1,useHttp:!1};if(typeof e=="object")for(n in e)r=e[n],this.options[n]=r;this.context=t!=null?t:this,this.unique=this._genKey()}return e.prototype.hasNext=function(){return typeof this.context.nextUrl=="string"&&this.context.nextUrl.length>0},e.prototype.next=function(){return this.hasNext()?this.run(this.context.nextUrl):!1},e.prototype.run=function(t){var n,r,i;if(typeof this.options.clientId!="string"&&typeof this.options.accessToken!="string")throw new Error("Missing clientId or accessToken.");if(typeof this.options.accessToken!="string"&&typeof this.options.clientId!="string")throw new Error("Missing clientId or accessToken.");return this.options.before!=null&&typeof this.options.before=="function"&&this.options.before.call(this),typeof document!="undefined"&&document!==null&&(i=document.createElement("script"),i.id="ody-fetcher",i.src=t||this._buildUrl(),n=document.getElementsByTagName("head"),n[0].appendChild(i),r="odyCache"+this.unique,window[r]=new e(this.options,this),window[r].unique=this.unique),!0},e.prototype.parse=function(e){var t,n,r,i,s,o,u,a,f,l,c,h,p,d,v,m,g,y,b,w,E,S;if(typeof e!="object"){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,"Invalid JSON data"),!1;throw new Error("Invalid JSON response")}if(e.meta.code!==200){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,e.meta.error_message),!1;throw new Error("Error from Instagram: "+e.meta.error_message)}if(e.data.length===0){if(this.options.error!=null&&typeof this.options.error=="function")return this.options.error.call(this,"No images were returned from Instagram"),!1;throw new Error("No images were returned from Instagram")}this.options.success!=null&&typeof this.options.success=="function"&&this.options.success.call(this,e),this.context.nextUrl="",e.pagination!=null&&(this.context.nextUrl=e.pagination.next_url);if(this.options.sortBy!=="none"){this.options.sortBy==="random"?d=["","random"]:d=this.options.sortBy.split("-"),p=d[0]==="least"?!0:!1;switch(d[1]){case"random":e.data.sort(function(){return.5-Math.random()});break;case"recent":e.data=this._sortBy(e.data,"created_time",p);break;case"liked":e.data=this._sortBy(e.data,"likes.count",p);break;case"commented":e.data=this._sortBy(e.data,"comments.count",p);break;default:throw new Error("Invalid option for sortBy: '"+this.options.sortBy+"'.")}}if(typeof document!="undefined"&&document!==null&&this.options.mock===!1){a=e.data,this.options.limit!=null&&a.length>this.options.limit&&(a=a.slice(0,this.options.limit+1||9e9)),n=document.createDocumentFragment(),this.options.filter!=null&&typeof this.options.filter=="function"&&(a=this._filter(a,this.options.filter));if(this.options.template!=null&&typeof this.options.template=="string"){i="",o="",l="",v=document.createElement("div");for(m=0,b=a.length;m<b;m++)s=a[m],u=s.images[this.options.resolution].url,this.options.useHttp||(u=u.replace("http://","//")),o=this._makeTemplate(this.options.template,{model:s,id:s.id,link:s.link,image:u,caption:this._getObjectProperty(s,"caption.text"),likes:s.likes.count,comments:s.comments.count,location:this._getObjectProperty(s,"location.name")}),i+=o;v.innerHTML=i,S=[].slice.call(v.childNodes);for(g=0,w=S.length;g<w;g++)h=S[g],n.appendChild(h)}else for(y=0,E=a.length;y<E;y++)s=a[y],f=document.createElement("img"),u=s.images[this.options.resolution].url,this.options.useHttp||(u=u.replace("http://","//")),f.src=u,this.options.links===!0?(t=document.createElement("a"),t.href=s.link,t.appendChild(f),n.appendChild(t)):n.appendChild(f);document.getElementById(this.options.target).appendChild(n),r=document.getElementsByTagName("head")[0],r.removeChild(document.getElementById("ody-fetcher")),c="odyCache"+this.unique,window[c]=void 0;try{delete window[c]}catch(x){}}return this.options.after!=null&&typeof this.options.after=="function"&&this.options.after.call(this),!0},e.prototype._buildUrl=function(){var e,t,n;e="https://api.instagram.com/v1";switch(this.options.get){case"popular":t="media/popular";break;case"tagged":if(typeof this.options.tagName!="string")throw new Error("No tag name specified. Use the 'tagName' option.");t="tags/"+this.options.tagName+"/media/recent";break;case"location":if(typeof this.options.locationId!="number")throw new Error("No location specified. Use the 'locationId' option.");t="locations/"+this.options.locationId+"/media/recent";break;case"user":if(typeof this.options.userId!="number")throw new Error("No user specified. Use the 'userId' option.");if(typeof this.options.accessToken!="string")throw new Error("No access token. Use the 'accessToken' option.");t="users/"+this.options.userId+"/media/recent";break;default:throw new Error("Invalid option for get: '"+this.options.get+"'.")}return n=""+e+"/"+t,this.options.accessToken!=null?n+="?access_token="+this.options.accessToken:n+="?client_id="+this.options.clientId,this.options.limit!=null&&(n+="&count="+this.options.limit),n+="&callback=odyCache"+this.unique+".parse",n},e.prototype._genKey=function(){var e;return e=function(){return((1+Math.random())*65536|0).toString(16).substring(1)},""+e()+e()+e()+e()},e.prototype._makeTemplate=function(e,t){var n,r,i,s,o;r=/(?:\{{2})([\w\[\]\.]+)(?:\}{2})/,n=e;while(r.test(n))i=n.match(r)[1],s=(o=this._getObjectProperty(t,i))!=null?o:"",n=n.replace(r,""+s);return n},e.prototype._getObjectProperty=function(e,t){var n,r;t=t.replace(/\[(\w+)\]/g,".$1"),r=t.split(".");while(r.length){n=r.shift();if(!(e!=null&&n in e))return null;e=e[n]}return e},e.prototype._sortBy=function(e,t,n){var r;return r=function(e,r){var i,s;return i=this._getObjectProperty(e,t),s=this._getObjectProperty(r,t),n?i>s?1:-1:i<s?1:-1},e.sort(r.bind(this)),e},e.prototype._filter=function(e,t){var n,r,i,s,o;n=[],i=function(e){if(t(e))return n.push(e)};for(s=0,o=e.length;s<o;s++)r=e[s],i(r);return n},e}(),t=typeof exports!="undefined"&&exports!==null?exports:window,t.ody=e}).call(this);
	</script>
