<?php

	function JSclosingpricepoint($fetchtimestamp, $stockkey, $timepoint) 
	{

		$i = 1;
		foreach($stockkey as $stock)
		{
		$st_key = $stock;
		$apiurl = "https://priceapi.moneycontrol.com/techCharts/techChartController/history?symbol=$st_key&resolution=1&from=$fetchtimestamp&to=$fetchtimestamp";
		
		echo $i.') '.$apiurl.'<br>';
		$i++;
		
?>
		<script type="text/javascript">
		
			async function fetchText() 
			{		
				var response = await fetch('<?php echo $apiurl; ?>');
					return response.json();
			}


			var res = fetchText();
			res.then((item)=>{		var x = item.c;	console.log(x[0]);

				var xmlhttp = new XMLHttpRequest();
				
				xmlhttp.open("GET","savelivedatadb.php?key="+'<?php echo $st_key; ?>'+"&price="+x[0]+"&stamp="+'<?php echo $fetchtimestamp; ?>'+"&point="+'<?php echo $timepoint; ?>', true);
				xmlhttp.send();
				
			});
				
			//console.log(x);
			
		</script>
<?php 		

		}	

	}

?>

