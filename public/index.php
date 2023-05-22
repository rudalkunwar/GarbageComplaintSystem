<link rel="stylesheet" href="style.css">
<?php include('./layout/header.php') ?>

<body>
    <section class="bg-gradient-to-r from-violet-200 to-blue-300 h-screen flex justify-center items-center">
        <div class="container flex flex-col md:flex-row items-center">
            <div class="flex flex-col w-full lg:w-1/2  p-5 justify-center items-center">
                <div class="flex flex-col justify-center items-center h-full ">
                    <h1 class="block font-bold text-3xl my-4">Welcome to the Garbage Collection System</h1>
                    <p class="leading-normal mb-4"> A modern way to manage garbage collection and disposal.</p>
                </div>

                <div class="mt-5 flex justify-center">
                    <div class="inline-flex rounded-md shadow">
                        <a href="./user/uregister.php" class="px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-500 hover:bg-green-600">
                            Get Started
                        </a>
                    </div>
                    <div class="ml-3 inline-flex">
                        <a href="#about" class="px-5 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 lg:py-6 text-center p-5 lg:mt-5">
                <img src="images/main.png" alt=" " class="w-full object-cover">
            </div>
        </div>
    </section>
    <section class="pt-10 lg:pt-32 pb-12 lg:pb-24 bg-gradient-to-r from-blue-300 to-violet-400">
        <div class="container mx-auto ">
            <div class="flex flex-wrap -mx-2">
                <div class="w-full px-4">
                    <div class="text-center mx-auto mb-12 lg:mb-16 max-w-[510px]">
                        <h2 class="font-bold text-3xl sm:text-4xl md:text-5xl text-dark mb-4">
                            Our Services
                        </h2>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-2">
                <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class="ml-2 p-8 md:p-10 rounded-[10px] bg-green-300 shadow-md hover:shadow-lg mb-8 text-center">
                        <div class="w-full h-[250px] flex items-center justify-center bg-slate-500 rounded-md">
                            <img src="images/truck.png" alt="Feature 1" class="w-full h-full object-cover">


                        </div>
                        <h4 class="font-semibold text-xl sm:text-2xl md:text-xl lg:text-2xl text-dark mb-3 bg-yellow-200 p-2 mt-2">
                            Efficient Waste Management
                        </h4>
                        <p class="text-body-color">
                            Our system uses modern technology to efficiently manage waste disposal, reducing environmental impact and promoting sustainability.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class="p-8 md:p-10 rounded-[10px] shadow-md hover:shadow-lg mb-8 text-center bg-green-300">
                        <div class="w-full h-[250px] flex items-center justify-center bg-slate-500 rounded-md">
                            <img src="images/c.png" alt="Feature 2" class="w-full h-full object-cover rounded-md">
                        </div>
                        <h4 class="font-semibold text-xl sm:text-2xl md:text-xl lg:text-2xl text-dark mb-3 bg-yellow-200 p-2 mt-2">
                            Customizable Scheduling
                        </h4>
                        <p class="text-body-color">
                            We offer customizable scheduling options to fit the unique needs of each client, ensuring that waste is collected in a timely and efficient manner.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class="p-8 md:p-10 rounded-[10px] bg-green-300 shadow-md hover:shadow-lg mb-8 text-center">
                        <div class="w-full h-[250px] flex items-center justify-center bg-blue-200 rounded-md">
                            <img src="images/echofriend.jpg" alt="Feature 3" class="w-full h-full object-cover rounded-md">
                        </div>
                        <h4 class="font-semibold text-xl sm:text-2xl md:text-xl lg:text-2xl text-dark mb-3 bg-yellow-200 p-2 mt-2">
                            Environmentally Friendly
                        </h4>
                        <p class="text-body-color">
                            Our system is designed to be environmentally friendly, reducing waste and promoting recycling and other sustainable practices.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="bg-gradient-to-r from-sky-100 to-blue-200">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-lg">
            <div class="container mx-auto px-4 py-8">
                <div class="flex flex-col lg:flex-row">
                    <div class="lg:w-1/2">
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 lg:mb-6">
                            About Garbage Collection System
                        </h1>
                        <p class="text-lg leading-7 text-gray-700 mb-4">
                            Garbage Collection System is a leading waste management company that provides efficient and reliable collection and disposal of waste materials. Our goal is to offer high-quality services to our customers while minimizing the impact on the environment.
                        </p>
                        <p class="text-lg leading-7 text-gray-700 mb-4">
                            We provide a wide range of services, including residential, commercial, and industrial waste collection, recycling, and composting. Our team of trained professionals is dedicated to delivering excellent customer service and ensuring that all waste materials are properly handled and disposed of.
                        </p>
                        <p class="text-lg leading-7 text-gray-700 mb-4">
                            At Garbage Collection System, we are committed to sustainability and reducing our carbon footprint. We continuously seek ways to improve our operations and minimize our impact on the environment.
                        </p>
                    </div>
                    <div class="lg:w-1/2 lg:pl-10 mt-8 lg:mt-0">
                        <img class="block mx-auto rounded-md shadow-md" src="images/gtruck1.avif" alt="Garbage Collection System truck">
                    </div>
                </div>
            </div>

            <div class="mt-12">
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 lg:mb-6">
                    Our Team
                </h1>
                <p class="mt-4 leading-7 text-gray-700">
                    Our team is made up of experienced professionals who are passionate about waste management and sustainability. We believe that our team is our most valuable asset, and we invest in their training and development to ensure that they have the knowledge and skills to provide the best service to our customers.
                </p>
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div class="text-white card mx-auto bg-violet-300 rounded-lg max-w-sm w-full">
                        <br>
                        <img class="w-32 mx-auto rounded-full" src="images/basanta.png" alt="">

                        <div class="text-center mt-2 text-3xl font-medium">Poudel Basanta</div>
                        <div class="px-6 py-5 text-center mt-2 font-semibold text-md"> Customer Service Representative</div>
                    </div>




                    <div class="text-white card mx-auto bg-sky-300 rounded-lg max-w-sm w-full">
                        <br>
                        <img class="w-32 mx-auto rounded-full" src="images/prateek.png" alt="">
                        <div class="text-center mt-2 text-3xl font-medium ">Prza Prateek</div>
                        <div class="px-6 py-5 text-center mt-2 font-semibold text-md"> Driver</div>


                    </div>



                    <div class="text-white card mx-auto bg-sky-300 rounded-lg max-w-sm w-full">
                        <br>
                        <img class="w-32 mx-auto rounded-full" src="images/aakash2.jpg" alt="">

                        <div class="text-center mt-2 text-3xl font-medium">Aakash Kandel</div>
                        <div class="px-6 py-5 text-center mt-2 font-semibold text-md"> Driver</div>
                    </div>
                </div>
            </div>

            <div class="mt-12">
                <h2 class="text-xl lg:text-2xl font-bold text-gray-900">Our Mission</h2>
                <p class="mt-4 leading-7 text-gray-700">
                    Our mission is to provide efficient and reliable waste management services while minimizing the impact on the environment. We believe that waste management is an essential service that has a direct impact on public health and the environment, and we are committed to providing the best service possible to our customers.
                </p>
            </div>
        </main>
    </section>
    <section id="contact">
        <div class="text-center bg-red-100">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl p-10">
                <span class="block">Contact Us</span>
            </h2>
            <p class="mt-4 text-lg text-gray-600">
                Have any questions or concerns? Reach out to us!
            </p>
        </div>
        </div>
        <div class="bg-gray-300">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-lg mx-auto">
                    <form class="grid grid-cols-1 gap-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" class="py-3 px-4 block w-full shadow-sm focus:ring-green-500 focus:border-green-500 border-gray-300 rounded-md" />
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" class="py-3 px-4 block w-full shadow-sm focus:ring-green-500 focus:border-green-500 border-gray-300 rounded-md" />
                            </div>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <div class="mt-1">
                                <textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-green-500 focus:border-green-500 border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                        <div>
                            <button type="submit" id="submitBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php include('./layout/footer.php') ?>
</body>