<h3>��������</h3>
		<script language="JavaScript" type="text/javascript" src="wz_tooltip.js"></script>
		<script language="JavaScript" type="text/JavaScript">
						<!--
						function jumpMenu(selObj){ eval("parent.location='"+selObj.options[selObj.selectedIndex].value+"'"); }
						//-->
		</script>
		<SCRIPT>
			function bg_on(aa) { aa.style.backgroundColor='#FFCC99'; }
			function bg_off(aa, sty) { aa.style.backgroundColor=sty; }
		</SCRIPT>
		<br>
		<p class="anotation">����� ����� ��������/������� ���� �� ������� ����� ��������� ������ � �������� ���.</p> <br />
		<script type="text/javascript" language="JavaScript">
<!--

var confirmMsg  = '�� ������������� ������ ������� ����';

function confirmLink(theLink, theSqlQuery)
{
    // Confirmation is not required in the configuration file
    // or browser is Opera (crappy js implementation)
    if (confirmMsg == '' || typeof(window.opera) != 'undefined') {
        return true;
    }

    var is_confirmed = confirm(confirmMsg + ' :\n' + theSqlQuery);
    if (is_confirmed) {
        if ( typeof(theLink.href) != 'undefined' ) {
            theLink.href += '&is_js_confirmed=1';
        } else if ( typeof(theLink.form) != 'undefined' ) {
            theLink.form.action += '?is_js_confirmed=1';
        }
    }

    return is_confirmed;
} // end of the 'confirmLink()' function
-->
</script>
		<?
		
		if (isset($_GET[delid]) AND ($_GET[is_js_confirmed] == 1)) {
			$query = "DELETE FROM `sites` WHERE `id` = '$_GET[delid]' AND `id_user` = '$id_user'";
			if (insert($query)) {
				$query = "DELETE FROM `blocks` WHERE `id` = '$_GET[delid]'";
				insert($query);
			}
		}
		
		if (isset($_POST[url]) AND isset($_POST[name])) {
			$f_name = filter($_POST[name]);
			$f_url = filter($_POST[url]);
			$query = "INSERT INTO `sites` values('','$id_user','$f_url','$f_name','3', '�� ���������','0','0')";
			insert($query);
		}
		sites($id_user);
		
		?>
				<script type="text/javascript" language="JavaScript">
					<!--

					function CheckLoginForm(form_name) {
						if (!form_name.url.value.match('^[a-zA-Z0-9._-]+$')) {
							alert("������� ��������� URL! \n������������ ������� ���������� ��������, ����� � ����� '-' � '_'!\n�� ����� ���������: http://, www. � '/'");
							form_name.url.focus();
							form_name.url.value = "";
							return false;
						}
						if (!form_name.name.value.match('.+')) {
							alert("�������� �������� �����!");
							form_name.name.focus();
							form_name.name.value = "";
							return false;
						}
						return true;
					}

					-->
				</script>
				<form method='post'  id="profile" name='registrationForm' onsubmit='return CheckLoginForm(this);'>
					<p class="anotation">�������� ����:</p>
					<label for="domain">�����:&nbsp;<img onmouseover="Tip('������ �������� ���: ��� http://, www � ������.<br><br>��������, moy_site.com.', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</label>
					<input type="text" name="domain" id="domain" value="" />
				
					<label for="title">�������� �����:&nbsp;<img onmouseover="Tip('������� �������� ��� ��������� ����� ��� ����������� � �������. ����������� ����� ��������� ��� ���������� ��������, ������ � ����.<br><br>������: <br><b>��������� �������� �����</b>', DELAY, 0)" src="images/help.png" width="11" height="11">&nbsp;</label>
					<input type='text' name='title' maxLength='128'>
						
					<input type='submit' id="accept" name="accept" value="��������">
						
				</form>
			