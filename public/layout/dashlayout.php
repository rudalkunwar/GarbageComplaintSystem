<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dahboard Layout</title>
	</div>
	<script src="https://kit.fontawesome.com/62f9066fa7.js" crossorigin="anonymous"></script>
</head>

<body>
	<div class="flex">
		<div class="fixed h-screen flex flex-col w-14 hover:w-64 md:w-64 bg-gray-300 transition-all duration-300 border-none z-10 sidebar">
			<div class="my-2">
				<img src="../images/logo.png" class="w-1/2 mx-auto  py-2 rounded-lg" alt="">
			</div>

			<div>
				<a href="../admin/dashboard.php" class="text-xl border-b-2 border-blue-600 block  hover:bg-blue-500 hover:text-white p-2"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
				<a href="../bins/bins.php" class="text-xl border-b-2 border-blue-600 block  hover:bg-blue-500 hover:text-white p-2"><i class="fa-sharp fa-solid fa-dumpster"></i> Bins</a>
				<a href="../driver/driver.php" class="text-xl border-b-2 border-blue-600 block  hover:bg-blue-500 hover:text-white p-2"><i class="fa-solid fa-car-side"></i></i> Drivers</a>
				<a href="" class="text-xl border-b-2 border-blue-600 block  hover:bg-blue-500 hover:text-white p-2"><i class="fa-solid fa-envelope"></i> User Request</a>
				<a href="../admin/logout.php" class="text-xl border-b-2 border-blue-600 block  hover:bg-blue-500 hover:text-white p-2"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
			</div>
		</div>