<?php

/**
 * ��$_GET['pid']������ظ���ȷ�е�ַ������ת��������ҳ��
 * @author jayeeliu <jayeeliu@gmail.com>
 * @version $Id$
 */

if(!defined('CURSCRIPT')) {
	define('CURSCRIPT', 'gotopost');
}

require_once './include/common.inc.php';

$pid = abs((int)$pid);
if ($pid) {
	$query = $db->query("SELECT pp.pid, pp.tid FROM {$tablepre}posts p, {$tablepre}posts pp WHERE pp.tid=p.tid AND p.pid={$pid} ORDER BY pp.pid ASC");

	$i = 1;
	while ($row = $db->fetch_array($query)) {
		if ($row['pid'] == $pid) {
			$tid = $row['tid'];
			break;
		} else {
			$i++;
		}
	}

	!$tid && showmessage('thread_nonexistence');
	$ppp	= isset($_DSESSION['ppp']) ? $_DSESSION['ppp'] : 10;
	//ҳ��
	$page	= ceil($i / $ppp);
	//���ʹ��rewrite��д��url���ǵ��޸�����
	dheader("Location: viewthread.php?tid={$tid}&page={$page}#pid{$pid}", true, 301);
} else {
	showmessage('thread_nonexistence');
}
