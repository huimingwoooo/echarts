<?php
	header("content-Type: text/json; charset=Utf-8"); 
	$connection=new mysqli("127.0.0.1","root","","woolsey98");//���ӵ����ݿ�
	mysqli_set_charset ($connection,'utf8');
	if(!$connection){
		die("could not connect to the database:</br>".mysqli_connect_error());//������Ӵ���
		exit;
	}
	$cIndustry = $_POST['Industry'];
	$query="select * from test where industry = '$cIndustry'";//������ѯ���
	$result=$connection -> query($query);//ִ�в�ѯ

	$title = array();
	$data = array();
	while($result_row=$result ->fetch_array())//ȡ���������ʾ
	{
		$data = array($result_row[5],$result_row[6],$result_row[7],$result_row[8],$result_row[9]);
		$data = array('value'=>$data,'name'=>$result_row[0]);
		$title[] = $data;
	}
	print_r(json_encode($title));
	$title = array();
	$result->free();
	mysqli_close($connection);//�ر�����
?>