<?php if(!defined('WY_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<title><?php echo $title;?></title>
<title><?php echo isset($title) && $title!='' ? $title.' - ' : '' ?>
<?php echo ''.$this->config['sitename'] ?><?php echo $this->config['sitetitle']!='' ? ' - '.$this->config['sitetitle'] : '' ?></title>
<meta name="description" content="<?php echo $this->config['description'] ?>" />
<meta name="keywords" content="<?php echo $this->config['keyword'] ?>" />
<link rel="stylesheet" href="/tpl/new/Skin/Home/Red/css/index.css" />
<script type="text/javascript" src="/tpl/new/Skin/Home/Red/js/jquery.js"></script>
<script type="text/javascript" src="/tpl/new/Skin/Home/Red/js/index.js"></script>
<script type="text/javascript" src="/tpl/new/Skin/Home/Red/js/jquery-1.6.2.min.js"></script>
		
	</head>
	<body>
		<div class="header">
			<div class="header_nav">
				<div class="nav">
					<div class="logo">
						<img src="/tpl/new/Skin/Home/Red/images/917_logo.png" />
					</div>
					<ul>
						<li>
							<a href="/">
								网站首页							</a>						</li>
						<li>
							<a href="/about.htm">
								关于我们
							</a>
						</li>
						<li>
							<a href="/contact.htm">
								联系我们
							</a>
						</li>
						<li>
							<a href="/faq.htm">
								帮助中心
							</a>
						</li>
						<li>
							<a href="/qiye.htm">
								企业资质
							</a>
						</li>
					</ul>
					<div class="login">
						<ul>
							<li>
								<a id="login_btn" href="/login.htm">
									登录
								</a>
							</li>
							<li>
								<a id="register_btn" href="/sendcode.htm">
									注册
								</a>
							</li>
							<li id="charge">
								<a href="/orderquery.htm">
									交易查询
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="banner">
				<img src="/tpl/new/Skin/Home/Red/images/logo1.jpg" />
				<img src="/tpl/new/Skin/Home/Red/images/logo2.jpg" />
				<img src="/tpl/new/Skin/Home/Red/images/logo3.jpg" />
			</div>
			<div class="btn">
				<ul>
				</ul>
			</div>
		</div>