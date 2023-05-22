<?php
session_start();
if (!isset($_SESSION['auth'])) {
	header('location:alogin.php');
}
?>
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

	<?php include('../layout/dashlayout.php') ?>
	<div class="h-full w-full p-5 ml-14 md:ml-64 ">
		<div class="w-full my-5">
			<h2 class="text-3xl border-b-2 border-blue-600">Dashboard</h2>
		</div>
		<div class="flex flex-wrap -mx-4">
			<!-- Card for pending pickups -->
			<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
				<div class="bg-white rounded-lg shadow-md p-6 hover:bg-red-100">
					<h2 class="text-lg font-semibold mb-4">Pending Pickups</h2>
					<div class="flex justify-between">
						<div class="text-gray-500">Total</div>
						<div class="text-2xl font-bold">10</div>
					</div>
				</div>
			</div>

			<!-- Card for collected pickups -->
			<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
				<div class="bg-white rounded-lg shadow-md p-6 hover:bg-green-100">
					<h2 class="text-lg font-semibold mb-4">Collected Pickups</h2>
					<div class="flex justify-between">
						<div class="text-gray-500">Total</div>
						<div class="text-2xl font-bold">50</div>
					</div>
				</div>
			</div>

			<!-- Card for cancelled pickups -->
			<div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
				<div class="bg-white rounded-lg shadow-md p-6 hover:bg-gray-200">
					<h2 class="text-lg font-semibold mb-4">Cancelled Pickups</h2>
					<div class="flex justify-between">
						<div class="text-gray-500">Total</div>
						<div class="text-2xl font-bold">5</div>
					</div>
				</div>
			</div>

			<!-- Table for pickups -->
			<div class="w-full p-5">
			<h2 class="text-3xl border-b-2 border-blue-600">Active Bins</h2>
		</div>
			<?php
			$con = mysqli_connect('localhost', 'root', '', 'gcs_database');
			if ($con === false) {
				die("Eroor connection");
			}
			$qry = "SELECT * FROM garbagebins";
			$result = mysqli_query($con, $qry);
			?>
			<div class="container max-w-3xl px-4 mx-auto sm:px-8">
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
													<?php echo $data['id'] ?>
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
							<div class="flex flex-col items-center px-5 py-5 bg-white xs:flex-row xs:justify-between">
								<div class="flex items-center">
									<button type="button" class="w-full p-4 text-base text-gray-600 bg-white border rounded-l-xl hover:bg-gray-100">
										<svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
											<path d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z">
											</path>
										</svg>
									</button>
									<button type="button" class="w-full px-4 py-2 text-base text-indigo-500 bg-white border-t border-b hover:bg-gray-100 ">
										1
									</button>
									<button type="button" class="w-full p-4 text-base text-gray-600 bg-white border-t border-b border-r rounded-r-xl hover:bg-gray-100">
										<svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
											<path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
											</path>
										</svg>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>