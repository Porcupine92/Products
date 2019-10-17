<?php include_once('include/include.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>Products</title>
        <meta CHARSET="UTF-8"/>
		<link rel="stylesheet" href="main.css"/>
    </head>
    <body>
	<?php
		$sql="SELECT concat( repeat('&nbsp&nbsp', COUNT(parent.id) - 1), child.name)AS name, child.id
		FROM category AS child,
		category AS parent
		WHERE child.lft BETWEEN parent.lft AND parent.rgt
		GROUP BY child.id
		ORDER BY child.lft";

		$result=mysqli_query($conn,$sql);
		echo '<div class="category">';
		while($row=mysqli_fetch_array($result)){
			echo $row['name'].'<br>';
		}
		echo '</div>';
			//vd($result);
		
		$sql="SELECT 
			 (SELECT GROUP_CONCAT(parent.name ORDER BY parent.lft SEPARATOR ' > ')
			 FROM category parent
			 WHERE child.lft >= parent.lft
			 AND child.rgt <= parent.rgt
			 ORDER BY lft
			 ) as breadcrumb
			FROM category child
			WHERE child.lft=12";

		$result=mysqli_query($conn,$sql);
		//vd($result);
		echo '<div class="category">';
		while($row=mysqli_fetch_array($result)){
			//vd($row);
			echo $row['breadcrumb'].'<br>';
		}
		echo '</div>';
		
		function sum(){
		//	count($row[
		}
		
		$sql="SELECT c.id, c.name, p.product_id, p.category_id
			FROM category c
			LEFT JOIN product p ON p.category_id=c.id
			GROUP BY c.id
			ORDER BY c.id";
			$result=mysqli_query($conn,$sql);
		
		echo '<table class="table">';
			echo '<thead>';
				echo '<tr>';
					echo '<th>';
						echo 'Category';
					echo '</th>';
					echo '<th>';
						echo 'product_count';
					echo '</th>';
				echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			while($row=mysqli_fetch_array($result)){
				echo '<tr>';
					echo '<td>';
						echo $row['name'];
					echo '</td>';
					echo '<td>';
						echo 
							if($row
						;
					echo '</td>';
				echo '</tr>';
			}
			echo '</tbody>';
		echo '</table>';
			
	?>
	</body>
</html>
