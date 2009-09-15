		</div>
		<div id="menu">
			<div class="border_t"></div>
			<div class="side_borders">
				<h2>Ваше меню:</h2>
				<ul>
					{foreach from=$MENU_WEB item=m name=menu}
					<li {if $MENU_SD==$m.name}class="active"{/if}><a href="{$m.url}">{$m.title}</a></li>
					{/foreach}
				</ul>
				{if $ACCOUNT}<p class="exit"><a class="button" href="logout.php">Выйти</a></p>{/if}
			</div>
			<div class="border_b"></div>			
		</div>
		
		<div id="sub_menu">
			{if $ACCOUNT}
			<p class="balanc"><span>{$ACCOUNT.balance}</span>руб. на балансе</p>
			<ul>
				<li><a href="help.php">Справка</a></li>
				<li><a href="contacts.php">Контакты</a></li>
				<li><a href="faq.php">FAQ</a></li>
			</ul>
			<p class="user_type">Веб-мастер: <a href="#n">Рекламодатель</a></p>
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
		<p>&copy; <a href="/">adnets.ru</a> 2009</p>
	</div>
	<div id="show_error"></div>
</body>
</html>
