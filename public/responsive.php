<table class="min-w-full leading-normal fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 backdrop-blur-sm">
        <thead>
            <tr>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                    Assigned Date
                </th>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                    Bin ID
                </th>
                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                    Message
                </th>

                <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                    Assigned Driver
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            mysqli_data_seek($res, 0);
            while ($d = mysqli_fetch_assoc($res)) {
            ?>
                <tr>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                        <p class="text-gray-900 whitespace-no-wrap">
                            <?php echo $d['timestamp'] ?>
                        </p>
                        </p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            <?php echo $d['bin_id'] ?>
                        </p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            <?php echo $d['description'] ?>

                        </p>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <p class="text-gray-900 whitespace-no-wrap">
                            <?php echo $d['assigned_driver'] ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>