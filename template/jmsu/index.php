<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>
		<?php echo $OJ_NAME ?>
	</title>
	<?php include "template/$OJ_TEMPLATE/css.php";?>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

	<div class="container">
		<?php include "template/$OJ_TEMPLATE/nav.php";?>
		<!-- Main component for a primary marketing message or call to action -->
		<div class="jumbotron">
			<!-- 提交数统计图表-->
			<p>
				<center> 最近提交 :
					<?php echo $speed ?> .
					<div id=submission style="width:80%;height:300px"></div>
				</center>
			</p>
			<!--2020-01-20重写 公告以列表形式 + bs4模态框展现-->
			<div class="card" style="width:80%;margin:0 auto">
				<div class="card-body">
					<table class="table table-responsive">
						<thead>
							<tr><th style="width:60%">公告</th><th class="width:20%"></th><th class="width:20%"></th></tr>
						</thead>
						<tbody>
							<?php echo $news_list; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!--2020-01-21重写 原为view_news，改为输出模态框内容news_modals-->
			<?php echo $news_modals ?>
		</div>

	</div>
	<!-- /container -->


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php include "template/$OJ_TEMPLATE/js.php";?>
	<script language="javascript" type="text/javascript" src="<?php echo $OJ_CDN_URL ?>include/jquery.flot.js"></script>
	<script type="text/javascript">
		$( function () {
			var d1 = <?php echo json_encode($chart_data_all) ?>;
			var d2 = <?php echo json_encode($chart_data_ac) ?>;
			$.plot( $( "#submission" ), [ {
				label: "<?php echo $MSG_SUBMIT ?>",
				data: d1,
				lines: {
					show: true
				}
			}, {
				label: "<?php echo $MSG_AC ?>",
				data: d2,
				bars: {
					show: true
				}
			} ], {
				grid: {
					backgroundColor: {
						colors: [ "#f5f5f5", "#f5f5f5" ]
					}
				},
				xaxis: {
					mode: "time" //,
						//max:(new Date()).getTime(),
						//min:(new Date()).getTime()-100*24*3600*1000
				}
			} );
		} );
		//alert((new Date()).getTime());
	</script>
</body>
</html>