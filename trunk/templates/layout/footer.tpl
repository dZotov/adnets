		</div>
		<div id="menu">
			<div class="border_t"></div>
			<div class="side_borders">
				<h2>���� ����:</h2>
				<ul>
					{foreach from=$MENU_WEB item=m name=menu}
					<li {if $MENU_SD==$m.name}class="active"{/if}><a href="{$m.url}">{$m.title}</a></li>
					{/foreach}
				</ul>
				{if $ACCOUNT}<p class="exit"><a class="button" href="logout.php">�����</a></p>{/if}
			</div>
			<div class="border_b"></div>			
		</div>
		
		<div id="sub_menu">
			{if $ACCOUNT}
			<p class="balanc"><span>{$ACCOUNT.balance}</span>���. �� �������</p>
			<ul>
				<li><a href="help.php">�������</a></li>
				<li><a href="contacts.php">��������</a></li>
				<li><a href="faq.php">FAQ</a></li>
			</ul>
			<p class="user_type">���-������: <a href="#n">�������������</a></p>
			<p class="email"><a href="profile.php">������� {$ACCOUNT.email}</a></p>
			<p class="exit"><a class="button" href="logout.php">�����</a></p>
			{else}
			{*
				<p class="registration"><a class="button" href="registration.php">�����������</a></p>
				<form id="login_m">
					<label for="e_mail_m">e-mail </label>
					<input type="text" name="e_mail_m" id="e_mail_m" />
					<label for="password_m">������ </label><a href="#n" id="remember_password">?</a>
					<input type="text" name="password_m" id="password_m" />
				</form>
				<p class="exit"><a class="button" href="logon.php">�����</a></p>
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
