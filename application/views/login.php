<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Manajemen e-Ternak</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="assets/css/sky-forms.css">
        <link rel="stylesheet" href="assets/css/login_002.css">
        <style type="text/css"></style>
		<style>
			blink {
				-webkit-animation-name: blink; 
				-webkit-animation-iteration-count: infinite; 
				-webkit-animation-timing-function: cubic-bezier(1.0,0,0,1.0);
				-webkit-animation-duration: 1s;
			}
		</style>
	</head>
        <!-- <body class="bg-lines"> -->
        <!-- <body class="bg-vertical-lines"> -->
        <!-- <body class="bg-dots"> -->
        <!--body class="bg-metal2"-->
        <!--body class="bg-carbon"-->
        <body class="bg-small-dots">
		
        <div class="body body-s">
            <form action="<?php echo site_url('login/auth')?>" method="post" class="sky-form">
                <header class="header" style="background-image:url(assets/images/bg-tosca.jpg); background-size: 500px 100px;">
                    <div style="background-size: 35px 35px; padding-left: 50px;">Manajemen Ternak Domba</div>
                </header>
                <fieldset>                  
                    <section>
                        <div class="row">
                            <label class="label col col-4">Username</label>
                            <div class="col col-8">
                                <label class="input">
                                    <i class="icon-append icon-user"></i>
                                    <input name="_username" type="text">
                                </label>
                            </div>
                        </div>
                    </section>
                    
                    <section>
                        <div class="row">
                            <label class="label col col-4">Password</label>
                            <div class="col col-8">
                                <label class="input">
                                    <i class="icon-append icon-lock"></i>
                                    <input name="_password" value="" type="password">
                                </label>
                                <!-- <div class="note"><a href="resources/demo-login.html#">Lupa password?</a></div> -->
                            </div>
                        </div>
                    </section>
                    
                    <section>
                        <div class="row">
                            <div class="col col-4"></div>
                            <div class="col col-8">

                                <!-- <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked=""><i></i>Tetap login</label> -->
                            </div>
                        </div>
                    </section>
                </fieldset>
                <footer>
                    <button type="submit" class="button">Masuk</button>
                    <a href="./" class="button" style="background:yellow;color:black;">Kembali</a>
                    
                </footer>
            </form>
            <blink><h3 id="error" style='text-align:center;'>
			<?php 
				if(isset($_SESSION['err'])) echo $_SESSION['err'];
			?></h3></blink>
        </div>
    <?php $_SESSION['err']="";?>
</body></html>