<?php 
	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// フォームから送信されたデータを各変数に格納
		$name = $_POST["name"];
		$email = $_POST["email"];
		$tel = $_POST["tel"];
		$company = $_POST["company"];
		$content  = $_POST["content"];
	}

	// 送信ボタンが押されたら
	if (isset($_POST["submit"])) {
		// 送信ボタンが押された時に動作する処理をここに記述する
        
		// 日本語をメールで送る場合のおまじない
        	mb_language("ja");
		mb_internal_encoding("UTF-8");
        
		// ヘッダ情報を変数headerに格納する		
		$header2 = "From: " .mb_encode_mimeheader($name) ."<{$email}>";
        
        //お問合せ通知本文
        
$body2 = <<< EOM
WEBサイトよりお問い合わせが入りました。
問い合わせ元ページ：お問い合わせ（個人情報）

お名前: {$name}<{$email}>
会社名： {$company}
電話番号： {$tel}

お問い合わせ内容:
{$content}

=========================================================
株式会社  マン・マシンインターフェース [MMI]
住所：〒192-0081東京都八王子市横山町６－９　丸多屋ビル３F
　　　　　　　　　　　　　　問い合わせ窓口
TEL：042-631-3531／FAX：042-631-3532
ＨＰ    ：http://www.mmi-sc.co.jp/
=========================================================
EOM;
		
        // お問合せ通知受信先
		mb_send_mail("privacy@mmi-sc.co.jp", "お問合せがありました（個人情報）", $body2, $header2);
        	

        	// カスタマー自動返信タイトル
        	$subject = "お問い合わせ確認メール（自動送信）:株式会社マン・マシンインターフェース";

        	// カスタマー自動返信本文
		$body = <<< EOM
{$name} 様

※このメールはシステムからの自動返信です

お問い合わせを受け付けいたしました。
改めて、担当よりご連絡をさせていただきます。

なお、営業時間は平日9:00～17:00となっております。
時間外のお問い合わせは翌営業日以降にご連絡差し上げます。

ご理解・ご了承の程よろしくお願い致します。


■お問い合わせ内容

お名前: {$name} <{$email}>
会社名： {$company}
電話番号： {$tel}

お問い合わせ内容:
{$content}


=========================================================
株式会社  マン・マシンインターフェース [MMI]
住所：〒192-0081東京都八王子市横山町６－９　丸多屋ビル３F
　　　　　　　　　　　　　　問い合わせ窓口
TEL：042-631-3531／FAX：042-631-3532
ＨＰ    ：http://www.mmi-sc.co.jp/
=========================================================
EOM;
        
		// 送信元のメールアドレスを変数fromEmailに格納
		$fromEmail = "privacy@mmi-sc.co.jp";

		// 送信元の名前を変数fromNameに格納
		$fromName = "株式会社マン・マシンインターフェース";

		// ヘッダ情報を変数headerに格納する		
		$header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

		// メール送信を行う
		mb_send_mail($email, $subject, $body, $header);

 		// サンクスページに画面遷移させる
		header("Location: https://www.mmi-sc.co.jp/support/thanks.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<meta name="robots" content="noindex, nofollow">
<!-- This site is optimized with the Yoast SEO plugin v16.2 - https://yoast.com/wordpress/plugins/seo/ --><title>お問い合わせ | 株式会社マン・マシンインターフェース</title>
<meta name="description" content="こちらは「個人情報」についてのお問い合わせフォームです。">
<meta property="og:locale" content="ja_JP">
<meta property="og:type" content="article">
<meta property="og:title" content="お問い合わせ | 株式会社マン・マシンインターフェース">
<meta property="og:description" content="こちらは「個人情報」についてのお問い合わせフォームです。">
<meta property="og:url" content="https://www.mmi-sc.co.jp/support/form-privacy">
<meta property="og:site_name" content="株式会社マン・マシンインターフェース">
<meta property="article:modified_time" content="2021-06-08T08:05:24+00:00">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:label1" content="推定読書時間">
<meta name="twitter:data1" content="1分">
<script type="application/ld+json" class="yoast-schema-graph">{"@context":"https://schema.org","@graph":[{"@type":"WebSite","@id":"https://www.mmi-sc.co.jp/#website","url":"https://www.mmi-sc.co.jp/","name":"株式会社マン・マシンインターフェース","description":"人（MAN）と機械（MACHINE）をつなぐかけはし（INTERFACE）になる。私たちは、社名の由来でもあるこの志を胸に、日々ソフトウェアの開発・改良に取り組んでいます。","potentialAction":[{"@type":"SearchAction","target":"https://www.mmi-sc.co.jp/?s={search_term_string}","query-input":"required name=search_term_string"}],"inLanguage":"ja"},{"@type":"WebPage","@id":"https://www.mmi-sc.co.jp/support/form-privacy#webpage","url":"https://www.mmi-sc.co.jp/support/form-privacy","name":"お問い合わせ | 株式会社マン・マシンインターフェース","isPartOf":{"@id":"https://www.mmi-sc.co.jp/#website"},"datePublished":"2021-06-08T08:01:29+00:00","dateModified":"2021-06-08T08:05:24+00:00","description":"こちらは「個人情報」についてのお問い合わせフォームです。","breadcrumb":{"@id":"https://www.mmi-sc.co.jp/support/form-privacy#breadcrumb"},"inLanguage":"ja","potentialAction":[{"@type":"ReadAction","target":["https://www.mmi-sc.co.jp/support/form-privacy"]}]},{"@type":"BreadcrumbList","@id":"https://www.mmi-sc.co.jp/support/form-privacy#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"item":{"@type":"WebPage","@id":"https://www.mmi-sc.co.jp/","url":"https://www.mmi-sc.co.jp/","name":"トップ"}},{"@type":"ListItem","position":2,"item":{"@type":"WebPage","@id":"https://www.mmi-sc.co.jp/support","url":"https://www.mmi-sc.co.jp/support","name":"お問い合わせ"}},{"@type":"ListItem","position":3,"item":{"@id":"https://www.mmi-sc.co.jp/support/form-privacy#webpage"}}]}]}</script><!-- / Yoast SEO plugin. --><link rel="dns-prefetch" href="//s.w.org">
<link rel="alternate" type="application/rss+xml" title="株式会社マン・マシンインターフェース &raquo; フィード" href="https://www.mmi-sc.co.jp/feed">
<link rel="alternate" type="application/rss+xml" title="株式会社マン・マシンインターフェース &raquo; コメントフィード" href="https://www.mmi-sc.co.jp/comments/feed">
<link rel="stylesheet" id="wp-block-library-css" href="https://www.mmi-sc.co.jp/wp-includes/css/dist/block-library/style.min.css?ver=5.8" type="text/css" media="all">
<link rel="stylesheet" id="rnworks-style-css" href="https://www.mmi-sc.co.jp/wp-content/themes/mmi/style.css?ver=5.8" type="text/css" media="all">
<link rel="https://api.w.org/" href="https://www.mmi-sc.co.jp/wp-json/">
<link rel="alternate" type="application/json" href="https://www.mmi-sc.co.jp/wp-json/wp/v2/pages/1051">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.mmi-sc.co.jp/xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://www.mmi-sc.co.jp/wp-includes/wlwmanifest.xml">
<meta name="generator" content="WordPress 5.8">
<link rel="shortlink" href="https://www.mmi-sc.co.jp/?p=1051">
<link rel="alternate" type="application/json+oembed" href="https://www.mmi-sc.co.jp/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fhttps://www.mmi-sc.co.jp%2Fsupport%2Fform-privacy">
<link rel="alternate" type="text/xml+oembed" href="https://www.mmi-sc.co.jp/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fhttps://www.mmi-sc.co.jp%2Fsupport%2Fform-privacy&#038;format=xml">
<style type="text/css"></style>
<style type="text/css">.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}</style>
<link rel="icon" href="https://www.mmi-sc.co.jp/wp-content/uploads/2021/07/cropped-icon-32x32.png" sizes="32x32">
<link rel="icon" href="https://www.mmi-sc.co.jp/wp-content/uploads/2021/07/cropped-icon-192x192.png" sizes="192x192">
<link rel="apple-touch-icon" href="https://www.mmi-sc.co.jp/wp-content/uploads/2021/07/cropped-icon-180x180.png">
<meta name="msapplication-TileImage" content="https://www.mmi-sc.co.jp/wp-content/uploads/2021/07/cropped-icon-270x270.png">
<link rel="stylesheet" type="text/css" href="https://www.mmi-sc.co.jp/wp-content/themes/mmi/css/style.css?210816-1643">
<script>console.log("");</script><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://www.mmi-sc.co.jp/wp-content/themes/mmi/css/animate.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com/">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500&display=swap" rel="stylesheet">
<!-- Google recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?render=6LeAuwYcAAAAAPuQfSoahqHG4Wx4B5cFHhESt67J"></script>
<script>
grecaptcha.ready(function () {
    grecaptcha.execute('6LeAuwYcAAAAAPuQfSoahqHG4Wx4B5cFHhESt67J', {action: 'homepage'}).then(function(token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
        recaptchaResponse.value = token;
    });
});
</script>
<!-- Google recaptcha -->
</head>
<body>
<noscript>
<link rel="stylesheet" type="text/css" href="https://www.mmi-sc.co.jp/wp-content/themes/mmi/css/noscript.css">
</noscript>
<script type="text/javascript">

	function getQueryVariable(variable) {
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		for (var i=0;i<vars.length;i++) {
			var pair = vars[i].split("=");
			if(pair[0] == variable)
			{return pair[1];}
		 }
	}

	var site = 155;
	var id = getQueryVariable("id");
	var key = getQueryVariable("key");
	var lpId = getQueryVariable("lpId");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == XMLHttpRequest.DONE) {
			if (xmlhttp.status == 200) {
				var script = document.createElement('script');
				var noscript = document.createElement ("noscript");
				script.setAttribute('type', 'text/javascript');
				script.text = ''+xmlhttp.response.script;
				noscript.text=''+xmlhttp.response.noscript;
				document.getElementsByTagName('head')[0].appendChild(script);
				document.getElementsByTagName('head')[0].appendChild(noscript);
			}
		}
	};

	xmlhttp.open("GET", "https://lead-nurture.com/SpringRest/campaign/trackingVar/get?site="+site+"&id="+id+"&key="+key+"&lpId="+lpId, true);
	xmlhttp.responseType = 'json';
	xmlhttp.send();

</script><div id="page" class="site">
<header id="masthead" class="site-header"><div class="page-width1200 pos-re">
    <div class="site-branding">
      <a href="https://www.mmi-sc.co.jp/" class="custom-logo-link" rel="home"><img src="https://www.mmi-sc.co.jp/wp-content/uploads/2021/07/logo-n.svg" class="custom-logo" alt="株式会社マン・マシンインターフェース"></a>      <p class="site-title"><a href="https://www.mmi-sc.co.jp/" rel="home">
        株式会社マン・マシンインターフェース        </a></p>
            <p class="site-description">人（MAN）と機械（MACHINE）をつなぐかけはし（INTERFACE）になる。私たちは、社名の由来でもあるこの志を胸に、日々ソフトウェアの開発・改良に取り組んでいます。</p>
          </div>
    <!-- .site-branding -->
    <div class="nav-button-wrap">
      <div class="nav-button"> <span></span> <span></span> <span></span> </div>
    </div>
    <nav id="navi" class="navi" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement"><div id="navi-in" class="navi-in">
        <ul class="flex jcc">
<li id="menu-item-15" class="nav-top menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="https://www.mmi-sc.co.jp/">トップページ</a></li>
<li id="menu-item-88" class="nav-company menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-88">
<a href="https://www.mmi-sc.co.jp/about">企業情報</a>
<ul class="sub-menu">
<li id="menu-item-277" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-277">
<a href="https://www.mmi-sc.co.jp/about">企業情報</a>
	<ul class="sub-menu">
<li id="menu-item-93" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-93"><a href="https://www.mmi-sc.co.jp/about/outline">会社概要</a></li>
		<li id="menu-item-92" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-92"><a href="https://www.mmi-sc.co.jp/about/principle">企業方針</a></li>
		<li id="menu-item-91" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-91"><a href="https://www.mmi-sc.co.jp/about/history">沿革</a></li>
		<li id="menu-item-90" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-90"><a href="https://www.mmi-sc.co.jp/about/access">アクセス</a></li>
	</ul>
</li>
	<li id="menu-item-89" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-89"><a href="https://www.mmi-sc.co.jp/about/lduinfo">公開情報</a></li>
	<li id="menu-item-98" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-98"><a href="https://www.mmi-sc.co.jp/about/privacy">プライバシーポリシー</a></li>
</ul>
</li>
<li id="menu-item-97" class="nav-techinfo menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-97">
<a href="https://www.mmi-sc.co.jp/techinfo">技術情報</a>
<ul class="sub-menu">
<li id="menu-item-476" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-476">
<a href="https://www.mmi-sc.co.jp/techinfo">技術情報</a>
	<ul class="sub-menu">
<li id="menu-item-475" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-475"><a href="https://www.mmi-sc.co.jp/techinfo/ee-division">組込みエンジニアリング</a></li>
		<li id="menu-item-642" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-642"><a href="https://www.mmi-sc.co.jp/techinfo/ss-division">S.I.ソリューション</a></li>
		<li id="menu-item-678" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-678"><a href="https://www.mmi-sc.co.jp/techinfo/ps-division">プロダクトソリューション</a></li>
	</ul>
</li>
</ul>
</li>
<li id="menu-item-95" class="nav-eco menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-95">
<a href="https://www.mmi-sc.co.jp/csr">社会貢献</a>
<ul class="sub-menu">
<li id="menu-item-278" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-278"><a href="https://www.mmi-sc.co.jp/csr">社会貢献</a></li>
	<li id="menu-item-96" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-96"><a href="https://www.mmi-sc.co.jp/csr/environment">環境方針</a></li>
	<li id="menu-item-1153" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1153"><a href="https://www.mmi-sc.co.jp/csr/sdgs">SDGs</a></li>
</ul>
</li>
<li id="menu-item-94" class="nav-jobs menu-item menu-item-type-post_type menu-item-object-page menu-item-94"><a href="https://www.mmi-sc.co.jp/recruit">採用情報</a></li>
</ul>
<div class="drawer-logo"><a href="https://www.mmi-sc.co.jp/" class="custom-logo-link" rel="home"><img src="https://www.mmi-sc.co.jp/wp-content/uploads/2021/07/logo-n.svg" class="custom-logo" alt="株式会社マン・マシンインターフェース"></a></div>
      </div>
      <!-- /#navi-in --> 
      
    </nav><!-- /Navigation --><div class="pickup-navi">
      <ul>
<li id="menu-item-99" class="navpick-rpa menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="https://www.mmi-sc.co.jp/rpainfo">取扱商品紹介</a></li>
<li id="menu-item-100" class="navpick-support menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-21 current_page_item menu-item-100"><a href="https://www.mmi-sc.co.jp/support" aria-current="page">お問い合わせ</a></li>
</ul>
</div>
    <!-- /#navi-in --> 
    
  </div>
</header><!-- #masthead --><div id="overlay"></div>

<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-width"><article id="post-21" class="post-21 page type-page status-publish hentry"><header class="entry-header animated invisible" data-animate="fadeInUp"><h1 class="entry-title"><span>お問い合わせ</span></h1>                <span class="page-title-en">SUPPORT</span>
        	</header><!-- .entry-header --><div class="entry-content">
            
<div class="wpcf7">
            
<form action="confirm.php" method="post">
            <input type="hidden" name="recaptchaResponse" id="recaptchaResponse">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="company" value="<?php echo $company; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <input type="hidden" name="tel" value="<?php echo $tel; ?>">
            <input type="hidden" name="content" value="<?php echo $content; ?>">
            <p>お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
            <div class="confirm-wrap">
                <div>
                    <label>お名前</label>
                    <p><?php echo $name; ?></p>
                </div>
                <div>
                    <label>会社名</label>
                    <p><?php echo $company; ?></p>
                </div>
                <div>
                    <label>電話番号</label>
                    <p><?php echo $tel; ?></p>
                </div>
                <div>
                    <label>メールアドレス</label>
                    <p><?php echo $email; ?></p>
                </div>
                <div>
                    <label>お問い合わせ内容</label>
                    <p><?php echo nl2br($content); ?></p>
                </div>
            </div>
     <div class="text-c flex jcc">
		<input type="button" value="内容を修正する" onclick="history.back(-1)" class="back-button" style="margin-right: 1rem;">
		<button type="submit" name="submit">送信する</button>
         </div>
	</form>
    
</div>
            
	</div>
<!-- .entry-content -->

	</article><!-- #post-21 --></main><!-- #main -->
</div>
<!-- #primary -->


	</div>
<!-- #content -->

<footer id="colophon" class="site-footer"><div class="footer-head-wrap animated invisible" data-animate="fadeInUp">
        <a href="https://www.mmi-sc.co.jp/" rel="home" class="footer-logo pos-ab-c"></a>
    </div>
    <div class="footer-nav-wrap">
    <ul class="footer-nav">
<li class="navpick-rpa menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="https://www.mmi-sc.co.jp/rpainfo">取扱商品紹介</a></li>
<li class="navpick-support menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-21 current_page_item menu-item-100"><a href="https://www.mmi-sc.co.jp/support" aria-current="page">お問い合わせ</a></li>
     </ul>
<ul class="footer-nav">
<li id="menu-item-101" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-101"><a href="https://www.mmi-sc.co.jp/about">企業情報</a></li>
<li id="menu-item-105" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-105"><a href="https://www.mmi-sc.co.jp/about/outline">会社概要</a></li>
<li id="menu-item-107" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-107"><a href="https://www.mmi-sc.co.jp/about/principle">企業方針</a></li>
<li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103"><a href="https://www.mmi-sc.co.jp/about/history">沿革</a></li>
<li id="menu-item-102" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-102"><a href="https://www.mmi-sc.co.jp/about/access">アクセス</a></li>
     </ul>
<ul class="footer-nav">
<li id="menu-item-680" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-680"><a href="https://www.mmi-sc.co.jp/about/lduinfo">公開情報</a></li>
<li id="menu-item-679" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-679"><a href="https://www.mmi-sc.co.jp/about/privacy">プライバシーポリシー</a></li>
     </ul>
<ul class="footer-nav">
<li id="menu-item-487" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-487"><a href="https://www.mmi-sc.co.jp/techinfo">技術情報</a></li>
<li id="menu-item-484" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-484"><a href="https://www.mmi-sc.co.jp/techinfo/ee-division">組込みエンジニアリング</a></li>
<li id="menu-item-687" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-687"><a href="https://www.mmi-sc.co.jp/techinfo/ss-division">S.I.ソリューション</a></li>
<li id="menu-item-686" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-686"><a href="https://www.mmi-sc.co.jp/techinfo/ps-division">プロダクトソリューション</a></li>
     </ul>
<ul class="footer-nav footer-nav-bottom">
<li id="menu-item-684" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-684"><a href="https://www.mmi-sc.co.jp/csr">社会貢献</a></li>
<li id="menu-item-685" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-685"><a href="https://www.mmi-sc.co.jp/csr/environment">環境方針</a></li>
<li id="menu-item-1154" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1154"><a href="https://www.mmi-sc.co.jp/csr/sdgs">SDGs</a></li>
<li id="menu-item-688" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-688"><a href="https://www.mmi-sc.co.jp/recruit">採用情報</a></li>
     </ul>
<ul class="sns-link">
<li><a style="width: 60px;" href="https://twitter.com/_M_M_I_" target="_blank"><i class="fab fa-twitter"></i></a></li>    <li><a style="width: 60px;" href="https://www.facebook.com/%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE%E3%83%9E%E3%83%B3%E3%83%9E%E3%82%B7%E3%83%B3%E3%82%A4%E3%83%B3%E3%82%BF%E3%83%BC%E3%83%95%E3%82%A7%E3%83%BC%E3%82%B9-503152396497579/" target="_blank"><i class="fab fa-facebook-square"></i></a></li>          </ul>
</div>
    <div class="site-info">
        <small>&copy; <span id="thisYear"></span> MAN MACHINE INTERFACE,INC.</small>
    </div>
    <!-- .site-info -->
</footer>
</div>
<!-- #page -->

<noscript>
<div id="noscript">
  <div class="noscript-box">
    <p><img src="https://www.mmi-sc.co.jp/wp-content/themes/mmi/images/logo.png" alt="株式会社マン・マシンインターフェース"></p>
    <p>Javascript が無効に設定されています。<br>
      Javascript を有効にして頂き、当サイトをお楽しみください。</p>
  </div>
</div>
</noscript>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script><script type="text/javascript" src="https://www.mmi-sc.co.jp/wp-content/themes/mmi/js/common.js?210816-1643"></script><script type="text/javascript" src="https://www.mmi-sc.co.jp/wp-content/themes/mmi/js/navigation.js?ver=20151215" id="rnworks-navigation-js"></script><script type="text/javascript" src="https://www.mmi-sc.co.jp/wp-content/themes/mmi/js/skip-link-focus-fix.js?ver=20151215" id="rnworks-skip-link-focus-fix-js"></script><script type="text/javascript" src="https://www.mmi-sc.co.jp/wp-includes/js/wp-embed.min.js?ver=5.8" id="wp-embed-js"></script>
<script type="text/javascript" src="contact.js"></script>
</body>
</html>