
<div id="menu">
	<div class="border_t"></div>
	<div class="side_borders">
		<h2>���� ����:</h2>
		<ul>
			<?if($_COOKIE['type']=='reclam'){?>
			<li <?if($_REQUEST['cat']=='news') echo 'class="active"';?>><a href="news.html">�������</a></li>
			<li <?if($_REQUEST['cat']=='sites') echo 'class="active"';?>><a href="sites.html">��������</a></li>
			<li <?if($_REQUEST['cat']=='ustatistic') echo 'class="active"';?>><a href="ustatistic.html">����������</a></li>
			<li <?if($_REQUEST['cat']=='tizers') echo 'class="active"';?>><a href="tizers.html">������</a></li>
			<li <?if($_REQUEST['cat']=='properties') echo 'class="active"';?>><a href="properties.html">���������</a></li>
			<li <?if($_REQUEST['cat']=='transactions') echo 'class="active"';?>><a href="transactions.html">��������</a></li>
			<li <?if($_REQUEST['cat']=='tickets') echo 'class="active"';?>><a href="tickets.html">������</a></li>
			<?}elseif($_COOKIE['type']=='webmaster'){?>
			<li <?if($_REQUEST['cat']=='news') echo 'class="active"';?>><a href="wnews.html">�������</a></li>
			<li <?if($_REQUEST['cat']=='sites') echo 'class="active"';?>><a href="wsites.html">��������</a></li>
			<li <?if($_REQUEST['cat']=='ustatistic') echo 'class="active"';?>><a href="wstatistic.html">����������</a></li>
			<li <?if($_REQUEST['cat']=='payment') echo 'class="active"';?>><a href="payment.html">�������</a></li>
			<li <?if($_REQUEST['cat']=='properties') echo 'class="active"';?>><a href="wproperties.html">���������</a></li>
			<li <?if($_REQUEST['cat']=='referal') echo 'class="active"';?>><a href="referal.html">��������</a></li>
			<li <?if($_REQUEST['cat']=='top10') echo 'class="active"';?>><a href="top10.html">��� 10</a></li>
			<li <?if($_REQUEST['cat']=='tickets') echo 'class="active"';?>><a href="tickets.html">������</a></li>
			<?}?>
			
		</ul>
		<p class="exit"><a class="button" href="index.html?quit=off">�����</a></p>
	</div>
	<div class="border_b"></div>			
</div>

