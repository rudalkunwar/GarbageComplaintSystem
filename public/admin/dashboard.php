<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="../style.css">
</head>

<body>
	<div class="flex">
		<?php include('dashlayout.php');

		$qry1 = "SELECT * FROM collections WHERE collection_status = 'Completed'";
		$res1 = mysqli_query($con, $qry1);
		$row1 = mysqli_num_rows($res1);

		$qry2 = "SELECT * FROM complaints WHERE complain_status = 'Rejected'";
		$res2 = mysqli_query($con, $qry2);
		$row2 = mysqli_num_rows($res2);

		$qry3 = "SELECT * FROM complaints WHERE complain_status = 'new'";
		$res3 = mysqli_query($con, $qry3);
		$row3 = mysqli_num_rows($res3);

		$qry4 = "SELECT * FROM complaints WHERE complain_status = 'In progress,Driver Assigned.'";
		$res4 = mysqli_query($con, $qry4);
		$row4 = mysqli_num_rows($res4);
	
		?>
		<div class="h-full w-full p-5 ml-14 md:ml-64">
			<div class="w-full p-5">
				<h2 class="text-3xl border-b-2 border-blue-600">Dashboard</h2>
			</div>
			<div class="flex flex-wrap -mx-4">
				<!-- Card for pending pickups -->
				<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" onclick="window.location.href='usercomplain.php'">
					<div class="bg-white rounded-lg shadow-md p-6 hover:bg-red-100">
						<h2 class="text-lg font-semibold mb-4">Complaints</h2>
						<div class="flex justify-between">
							<div class="text-gray-500">Total</div>
							<div class="text-2xl font-bold"><?php echo $row3 ?></div>
						</div>
					</div>
				</div>

				<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" onclick="window.location.href='cancelledcomplain.php'">
					<div class="bg-white rounded-lg shadow-md p-6 hover:bg-gray-200">
						<h2 class="text-lg font-semibold mb-4">Cancelled Complaints</h2>
						<div class="flex justify-between">
							<div class="text-gray-500">Total</div>
							<div class="text-2xl font-bold"><?php echo $row2 ?> </div>
						</div>
					</div>
				</div>
				<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" onclick="window.location.href='pendingcomplain.php'">
					<div class="bg-white rounded-lg shadow-md p-6 hover:bg-green-100">
						<h2 class="text-lg font-semibold mb-4">Pending Collections</h2>
						<div class="flex justify-between">
							<div class="text-gray-500">Total</div>
							<div class="text-2xl font-bold"><?php echo $row4 ?> </div>
						</div>
					</div>
				</div>
				<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" onclick="window.location.href='completedcomplain.php'">
					<div class="bg-white rounded-lg shadow-md p-6 hover:bg-green-100">
						<h2 class="text-lg font-semibold mb-4">Collected Bins</h2>
						<div class="flex justify-between">
							<div class="text-gray-500">Total</div>
							<div class="text-2xl font-bold"><?php echo $row1 ?> </div>
						</div>
					</div>
				</div>

				<?php
				$qry = "SELECT * FROM garbagebins";
				$result = mysqli_query($con, $qry);
				?>
				<!-- Table for pickups -->
				<div class="w-full p-5">
					<h2 class="text-3xl border-b-2 border-blue-600">Active Bins</h2>
				</div>
				<div class="container max-w-full px-4 mx-auto sm:px-8">
					<div class="py-8">
						<div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
							<div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
								<table class="min-w-full leading-normal">
									<thead>
										<tr>
											<th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
												Bin ID
											</th>
											<th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
												Location
											</th>
											<th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
												Bin Type
											</th>

											<th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
												Capacity
											</th>
											<th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
												Status
											</th>
									</thead>
									<tbody>
										<?php
										while ($data = mysqli_fetch_assoc($result)) {
										?>
											<tr>
												<td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
													<p class="text-gray-900 whitespace-no-wrap">
													<p class="text-gray-900 whitespace-no-wrap">
														<?php echo $data['bin_id'] ?>
													</p>
													</p>
												</td>
												<td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
													<p class="text-gray-900 whitespace-no-wrap">
														<?php echo $data['location'] ?>
													</p>
												</td>
												<td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
													<p class="text-gray-900 whitespace-no-wrap">
														<?php echo $data['type'] ?>
													</p>
												</td>
												<td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
													<p class="text-gray-900 whitespace-no-wrap">
														<?php echo $data['capacity'] ?>

													</p>
												</td>

												<td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
													<span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
														<span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full opacity-50">
														</span>
														<span class="relative">
														</span>
													</span>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>