<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bin Complaint Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/62f9066fa7.js" crossorigin="anonymous"></script>

</head>

<body class="">

    <div class="h-screen">
        <div class="flex flex-col items-center  h-full justify-center px-4 sm:px-0">
            <div class="flex rounded-lg w-full sm:w-3/4 lg:w-10/12 bg-white sm:mx-0" style="height: 500px">
                <div class="md:w-1/2 h-full flex items-center justify-center ">
                    <div class="w-full flex flex-col text-center rounded-lg p-6 md:p-10">
                        <div class="w-full mx-auto mb-6 flex">
                            <div class="w-1/2">
                                <i class="text-5xl fa-solid fa-location-dot"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="text-2xl font-bold">Our Location</h4>
                                <p class="text-gray-600">Bharatpur, Chitwan, Nepal</p>
                            </div>
                        </div>
                        <div class="w-full mx-auto mb-6 flex">
                            <div class="w-1/2">
                                <i class="text-5xl fa-solid fa-phone"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="text-2xl font-bold">Call Us</h4>
                                <p class="text-gray-600">+977 056 527237</p>
                            </div>
                        </div>
                        <div class="w-full mx-auto flex">
                            <div class="w-1/2">
                                <i class="text-5xl fa-solid fa-envelope"></i>
                            </div>
                            <div class="text-left">
                                <h4 class="text-2xl font-bold">Email Us</h4>
                                <p class="text-gray-600">info@gcs.com</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex flex-col w-full md:w-1/2 p-4">
                    <div class="flex flex-col flex-1 justify-center mb-8">
                        <div class="mb-4">
                            <h6 class="text-gray-600 uppercase font-bold mb-2">Need Help?</h6>
                            <h1 class="text-4xl font-bold">Send Us A Message</h1>
                        </div>
                        <div class="w-full mt-4">
                            <form class="form-horizontal mx-auto" method="POST" action="">
                                <div class="mb-6">
                                    <input type="text" class="w-1/2 shadow-md border-1  border-gray-400 rounded-md py-2 px-4 placeholder-gray-400 focus:outline-none focus:border-blue-500" placeholder="Your Name" required="required">
                                </div>
                                <div class="mb-6">
                                    <input type="email" class="w-full shadow-md border-1  border-gray-400 rounded-md py-2 px-4 placeholder-gray-400 focus:outline-none focus:border-blue-500" placeholder="Your Email" required="required">
                                </div>
                                <div class="mb-6">
                                    <textarea class="w-full shadow-md border-1  border-gray-400 rounded-md py-2 px-4 placeholder-gray-400 focus:outline-none focus:border-blue-500" rows="5" placeholder="Message" required="required"></textarea>
                                </div>
                                <div class="w-full text-center">
                                    <button class="w-1/2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-md" type="submit">Send Message</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>











    <div class="bg-violet-300 py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="w-full md:w-1/2">
                    <div class="rounded-lg p-6 md:p-10 bg-red-300 text-center">
                        <div class="mb-6">
                            <h4 class="text-2xl font-bold">Our Location</h4>
                            <p class="text-gray-600">123 Street, New York, USA</p>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-2xl font-bold">Call Us</h4>
                            <p class="text-gray-600">+012 345 6789</p>
                        </div>
                        <div>
                            <h4 class="text-2xl font-bold">Email Us</h4>
                            <p class="text-gray-600">info@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="rounded-lg p-6 md:p-10 bg-white w-10/12 mx-auto">
                        <div class="mb-8">
                            <h6 class="text-gray-600 uppercase font-bold mb-2">Need Help?</h6>
                            <h1 class="text-4xl font-bold">Send Us A Message</h1>
                        </div>
                        <form>
                            <div class="mb-6">
                                <input type="text" class="w-full border border-gray-300 rounded-lg py-2 px-4 placeholder-gray-400 focus:outline-none focus:border-blue-500" placeholder="Your Name" required="required">
                            </div>
                            <div class="mb-6">
                                <input type="email" class="w-full border border-gray-300 rounded-lg py-2 px-4 placeholder-gray-400 focus:outline-none focus:border-blue-500" placeholder="Your Email" required="required">
                            </div>
                            <div class="mb-6">
                                <textarea class="w-full border border-gray-300 rounded-lg py-2 px-4 placeholder-gray-400 focus:outline-none focus:border-blue-500" rows="5" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>