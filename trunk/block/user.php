
<div id="menu">
	<div class="border_t"></div>
	<div class="side_borders">
		<h2>Ваше меню:</h2>
		<ul>
			<?if($_COOKIE['type']=='reclam'){?>
			<li <?if($_REQUEST['cat']=='news') echo 'class="active"';?>><a href="news.html">Новости</a></li>
			<li <?if($_REQUEST['cat']=='sites') echo 'class="active"';?>><a href="sites.html">Площадки</a></li>
			<li <?if($_REQUEST['cat']=='ustatistic') echo 'class="active"';?>><a href="ustatistic.html">Статистика</a></li>
			<li <?if($_REQUEST['cat']=='tizers') echo 'class="active"';?>><a href="tizers.html">Тизеры</a></li>
			<li <?if($_REQUEST['cat']=='properties') echo 'class="active"';?>><a href="properties.html">Настройки</a></li>
			<li <?if($_REQUEST['cat']=='transactions') echo 'class="active"';?>><a href="transactions.html">Переводы</a></li>
			<li <?if($_REQUEST['cat']=='tickets') echo 'class="active"';?>><a href="tickets.html">Тикеты</a></li>
			<?}elseif($_COOKIE['type']=='webmaster'){?>
			<li <?if($_REQUEST['cat']=='news') echo 'class="active"';?>><a href="wnews.html">Новости</a></li>
			<li <?if($_REQUEST['cat']=='sites') echo 'class="active"';?>><a href="wsites.html">Площадки</a></li>
			<li <?if($_REQUEST['cat']=='ustatistic') echo 'class="active"';?>><a href="wstatistic.html">Статистика</a></li>
			<li <?if($_REQUEST['cat']=='payment') echo 'class="active"';?>><a href="payment.html">Выплаты</a></li>
			<li <?if($_REQUEST['cat']=='properties') echo 'class="active"';?>><a href="wproperties.html">Настройки</a></li>
			<li <?if($_REQUEST['cat']=='referal') echo 'class="active"';?>><a href="referal.html">Партнёрка</a></li>
			<li <?if($_REQUEST['cat']=='top10') echo 'class="active"';?>><a href="top10.html">Топ 10</a></li>
			<li <?if($_REQUEST['cat']=='tickets') echo 'class="active"';?>><a href="tickets.html">Тикеты</a></li>
			<?}?>
			
		</ul>
		<p class="exit"><a class="button" href="index.html?quit=off">Выйти</a></p>
	</div>
	<div class="border_b"></div>			
</div>

