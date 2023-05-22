<link rel="stylesheet" href="style.css">
<div class="w-full container mx-auto">

  <div class="flex justify-center px-6 my-12">
    <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
      <h3 class="pt-4 text-2xl text-center">Add New Driver</h3>
      <form method="post" action="index.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full md:w-[50%] m-[30px_auto] flex flex-wrap">
        <div class="mb-4 w-full md:w-[50%] pr-1">
          <label for="driverid" class="block text-gray-700 text-sm font-bold mb-2">
          Driver ID
          </label>
          <input type="text" id="driverid" placeholder="driverid" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>
        <div class="mb-4 w-full md:w-[50%] pl-1">
          <label for="hs-email" class="block text-gray-700 text-sm font-bold mb-2">
          Name
          </label>
          <input type="email" id="hs-email" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>
        <div class="mb-4 w-full md:w-[50%] pl-1">
          <label for="hs-email" class="block text-gray-700 text-sm font-bold mb-2">
            Email
          </label>
          <input type="email" id="hs-email" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div> <div class="mb-4 w-full md:w-[50%] pl-1">
          <label for="hs-email" class="block text-gray-700 text-sm font-bold mb-2">
            Email
          </label>
          <input type="email" id="hs-email" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
        </div>
        <div class="">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            Send
          </button>
        </div>
      </form>
    </div>
  </div>
</div>