
1���޸���discuzԴ�����е� 3 ���ļ���
	1) search.php	����������֣�
		�������ȫ�������Ĵ���ʹ��sphinx
		//---------------------------------------------------------------------
			if ($srchtype == 'title' || $srchtype == 'fulltext') {	//ȫ������

				if (!empty($_POST['srchtype'])) {
					unset($_POST['formhash']);
					$sp_url = 'search.php?'.http_build_query($_POST);
					dheader("location: {$sp_url}");
				}
				require DISCUZ_ROOT.'./include/search_sphinx.inc.php';
				exit();

			} else
		//---------------------------------------------------------------------
		
		���http_build_query�����ڣ�����һ���򵥵�http_build_query����
		//---------------------------------------------------------------------
		if (!function_exists('http_build_query')) {
			function http_build_query($data) {
				$param = array();
				foreach ((array)$data as $k => $v) {
					if (is_array($v)) {
						$param[] = http_build_query($v);
					} else {
						$param[] = $k.'='.urlencode($v);
					}
				}
				return join('&', $ret);
			}
		}
		//---------------------------------------------------------------------


	2) templates/default/search.htm
		���һ������Ĭ�ϵ�����ʽ��Ϊ��ض�
			<!-- for fulltext search -->
			<option value="rank" selected="selected">{lang order_rank}</option>
			<!-- /for fulltext search -->


	3) templates/default/templates.lang.php
		���һ������ضȵ�����
			'order_rank' => '��ض�',

2����� 4 ���ļ�
	1) gotopost.php
		����pid��ת����Ӧ������ҳ��
	2) include/search_sphinx.inc.php
		ȫ�������Ĵ������
	3) include/sphinxapi.php
		sphinx��api
	4) templates/default/search_sphinx.htm
		ȫ��������ҳ��
