		</div>
		<div id="menu">
			<div class="border_t"></div>
			<div class="side_borders">
				<h2>Ваше меню:</h2>
				<ul>
					{foreach from=$MENU item=m name=menu}
					<li><a href="{$m.url}">{$m.title}</a></li>
					{/foreach}
					{*
					<li><a href="statistics.html">Статистика</a></li>
					<li><a href="payment.html">Выплаты</a></li>
					<li class="active"><a href="tickets.html">Тикеты</a></li>
					<li><a href="profile.html">Профиль</a></li>
					<li><a href="news.html">Новости</a></li>
					<li><a href="top10.html">Топ 10</a></li>
					*}
				</ul>
				{if $ACCOUNT}<p class="exit"><a class="button" href="logout.php">Выйти</a></p>{/if}
			</div>
			<div class="border_b"></div>			
		</div>
		
		<div id="sub_menu">
			{if $ACCOUNT}
			<p class="balanc"><span>0</span>руб. на балансе</p>
			<ul>
				<li><a href="#n">Справка</a></li>
				<li><a href="#n">Контакты</a></li>
				<li><a href="#n">Модерация сайтов</a></li>
			</ul>
			<p class="user_type">Веб-мастер: <a href="#n">Рекламодатель</a></p>
			<p class="email">email@mail.ru</p>
			<p class="exit"><a class="button" href="#n">Выйти</a></p>
			{else}
			<p class="registration"><a class="button" href="registration.php">Регистрация</a></p>
			<form id="login_m">
				<label for="e_mail_m">e-mail </label>
				<input type="text" name="e_mail_m" id="e_mail_m" />
				<label for="password_m">Пароль </label><a href="#n" id="remember_password">?</a>
				<input type="text" name="password_m" id="password_m" />
			</form>
			<p class="exit"><a class="button" href="logon.php">Войти</a></p>
			{/if}
		</div>

	</div>

	<div id="footer">
		<p>&copy; <a href="/">adnets.ru</a> 2009</p>
	</div>
</body>
</html>
