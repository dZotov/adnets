		</div>
		<div id="menu">
			<div class="border_t"></div>
			<div class="side_borders">
				<h2>���� ����:</h2>
				<ul>
					{foreach from=$MENU item=m name=menu}
					<li><a href="{$m.url}">{$m.title}</a></li>
					{/foreach}
					{*
					<li><a href="statistics.html">����������</a></li>
					<li><a href="payment.html">�������</a></li>
					<li class="active"><a href="tickets.html">������</a></li>
					<li><a href="profile.html">�������</a></li>
					<li><a href="news.html">�������</a></li>
					<li><a href="top10.html">��� 10</a></li>
					*}
				</ul>
				{if $ACCOUNT}<p class="exit"><a class="button" href="logout.php">�����</a></p>{/if}
			</div>
			<div class="border_b"></div>			
		</div>
		
		<div id="sub_menu">
			{if $ACCOUNT}
			<p class="balanc"><span>0</span>���. �� �������</p>
			<ul>
				<li><a href="#n">�������</a></li>
				<li><a href="#n">��������</a></li>
				<li><a href="#n">��������� ������</a></li>
			</ul>
			<p class="user_type">���-������: <a href="#n">�������������</a></p>
			<p class="email">email@mail.ru</p>
			<p class="exit"><a class="button" href="#n">�����</a></p>
			{else}
			<p class="registration"><a class="button" href="registration.php">�����������</a></p>
			<form id="login_m">
				<label for="e_mail_m">e-mail </label>
				<input type="text" name="e_mail_m" id="e_mail_m" />
				<label for="password_m">������ </label><a href="#n" id="remember_password">?</a>
				<input type="text" name="password_m" id="password_m" />
			</form>
			<p class="exit"><a class="button" href="logon.php">�����</a></p>
			{/if}
		</div>

	</div>

	<div id="footer">
		<p>&copy; <a href="/">adnets.ru</a> 2009</p>
	</div>
</body>
</html>
