<?php

include('init.php');

$week = date("W") - 1;

$period = DateByWeek($week);

$ad = new Adwerts();

$a = $ad->GetManyByCond("status='" . STATE_ACTIVE . "'");

foreach ($a as $k => $v) {
    $t = new TeaserStat();
    $r = new Refstat();
    $balance = $t->SelectSum("amdst", "ad_id='{$v['id']}' and date BETWEEN '{$period['date_begin']}' AND '{$period['date_end']}'");
    $ref_balance = $r->SelectSum("amount", "adid='{$v['id']}' and date BETWEEN '{$period['date_begin']}' AND '{$period['date_end']}'");

    $ad = new Adwerts($v['id']);

    $ad->Set('balance', $balance + $ref_balance);
    $ad->Save();
}
?>