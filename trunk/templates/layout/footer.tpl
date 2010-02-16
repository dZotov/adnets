		</div>
		<div id="menu">
			<div class="border_t"></div>
			<div class="side_borders">
				<h2>Ваше меню:</h2>
				<ul>
					{foreach from=$MENU item=m name=menu}
					<li {if $MENU_SD==$m.name}class="active"{/if}><a href="{$m.url}">{$m.title}</a></li>
					{/foreach}
				</ul>
				{if $ACCOUNT}<p class="exit"><a class="button" href="logout.php">Выйти</a></p>{/if}
			</div>
			<div class="border_b"></div>			
		</div>
		
		<div id="sub_menu">
			{if $ACCOUNT}
			<p class="balanc"><b><span>{$ACCOUNT.balance}</span>руб.</b> на балансе</p>
			<ul>
				<li><a href="about.php">Справка</a></li>
				<li><a href="contact.php">Контакты</a></li>
				<li><a href="faq.php">FAQ</a></li>
			</ul>
			{if $smarty.cookies.user_type==2}
			<p class="user_type"><a href="?user_type=1">Веб-мастер</a> Рекламодатель:</p>
			{else}
			<p class="user_type">Веб-мастер: <a href="?user_type=2">Рекламодатель</a></p>
			{/if}
			<p class="email"><a href="profile.php">профиль {$ACCOUNT.email}</a></p>
			<p class="exit"><a class="button" href="logout.php">Выйти</a></p>
			{else}
			{*
				<p class="registration"><a class="button" href="registration.php">Регистрация</a></p>
				<form id="login_m">
					<label for="e_mail_m">e-mail </label>
					<input type="text" name="e_mail_m" id="e_mail_m" />
					<label for="password_m">Пароль </label><a href="#n" id="remember_password">?</a>
					<input type="text" name="password_m" id="password_m" />
				</form>
				<p class="exit"><a class="button" href="logon.php">Войти</a></p>
			*}
			{/if}
		</div>

	</div>

	<div id="footer">
		<div class="pad5">
			<table border="0" width="100%">
				<tr>
					<td>
						<!-- begin WebMoney Transfer : accept label -->
		<a href="http://passport.webmoney.ru/asp/certview.asp?wmid=261679884014" target="_blank"><img src="http://www.megastock.ru/Doc/88x31_accept/blue_rus.gif" alt="www.webmoney.ru" border="0"></a>
		<!-- end WebMoney Transfer : accept label -->
					</td>
					
					<td  class="ar padr15">&copy; <a href="/">adnets.ru</a> 2009</td>
				</tr>
			</table>
		</div>
	</div>
	<div id="show_error"></div>
	<div id="show_abs"></div>
	<div id="show_block_result_id"></div>
	<div id="show_block"></div>
</body>
</html>
