<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>jadwal</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .carousel {
                position: relative;
                width: 100%;
                overflow: hidden;
            }

            .carousel-inner {
                display: flex;
                transition: transform 1s ease-in-out;
            }

            .carousel-item {
                min-width: 100%;
                box-sizing: border-box;
            }
            .fade-in {
                animation: fadeIn 1s;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
        </style>
        <script>
            function updateTime() {
                const timeElements = document.querySelectorAll('.current-time');
                const now = new Date();
                const timeString =
                    now.toLocaleTimeString('en-GB', {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit',
                    }) + ' WITA';

                timeElements.forEach((timeElement) => {
                    timeElement.innerText = timeString;
                });
            }

            setInterval(updateTime, 1000);

            let currentIndex = 0;

            function updateCarousel() {
                const carouselInner = document.querySelector('.carousel-inner');
                const items = document.querySelectorAll('.carousel-item');
                const totalItems = items.length;

                if (currentIndex < totalItems - 1) {
                    // Normal transition to next item
                    currentIndex++;
                    carouselInner.style.transition = 'transform 1s ease-in-out';
                    carouselInner.style.transform = `translateX(-${
                        currentIndex * 100
                    }%)`;
                    // Remove the fade-in effect from all items on normal transition
                    items.forEach((item) => item.classList.remove('fade-in'));
                } else {
                    // Reset to first item without delay
                    setTimeout(() => {
                        carouselInner.style.transition = 'none'; // Disable transition for instant reset
                        currentIndex = 0;
                        carouselInner.style.transform = `translateX(0%)`;
                        items[0].classList.add('fade-in'); // Add fade-in class to the first item
                    }, 1000); // Delay this reset until after the last item has been shown for 1s
                }
            }

            setInterval(updateCarousel, 4000); // Update carousel every 4 seconds
        </script>
    </head>

    <body
        class="min-h-screen flex flex-col items-center justify-center text-center bg-gray-100"
    >
    <div class="judul font-semibold text-7xl pb-10">Daftar Hadir Dosen</div>
        <div class="current-time text-5xl font-bold mb-10">--:--:-- WITA</div>
        <div class="carousel w-[90%] mx-4 bg-white shadow-lg rounded-lg">
            <div class="carousel-inner">
                <?php foreach($data['dosen'] as $dosen) :
                if ($dosen['kehadiran'] == 0) continue;
                ?>
                <div
                    class="carousel-item flex flex-col md:flex-row justify-between p-10"
                >
                    <div class="flex flex-col items-center md:mr-10">
                        <img
                            src="<?= BASEURL . '/assets/' . $dosen['path_foto']?>"
                            alt=""
                            class="w-[300px] md:w-[500px] h-[400px] md:h-[700px] object-cover rounded-md"
                        />
                        <div class="mt-4 text-center">
                            <p class="font-bold text-2xl">
                                <?= $dosen['nama']?>
                            </p>
                            <p class="text-gray-600 text-xl">(<?= $dosen['jabatan']?>)</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-start w-[900px]">
                        <!-- <div class="text-3xl font-semibold mb-4">
                            Status Kehadiran: <?= (($dosen['kehadiran'] == 1) ? "Hadir" : "Tidak Hadir")?>
                        </div> -->
                        <div class="mb-4">
                            <h2 class="text-2xl font-bold mb-4">Schedule</h2>
                            <table
                                class="table-auto border-collapse w-[800px] text-2xl bg-white shadow-md rounded-lg"
                            >
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="border border-gray-300 px-6 py-4">No</th>
                                        <th class="border border-gray-300 px-6 py-4">Kegiatan</th>
                                        <th class="border border-gray-300 px-6 py-4">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no_schedule = 1;
                                    foreach($data['schedule'] as $schedule) :
                                    if ($schedule['id_dosen'] != $dosen['id_dosen']) continue;
                                    ?>
                                    <tr class="even:bg-gray-100">
                                        <td class="border border-gray-300 px-6 py-4"><?= $no_schedule?></td>
                                        <td class="border border-gray-300 px-6 py-4"><?= $schedule['kegiatan']?></td>
                                        <td class="border border-gray-300 px-6 py-4"><?= $schedule['waktu_start'] . '-' . $schedule['waktu_end']?></td>
                                    </tr>
                                    <?php
                                    $no_schedule++;
                                    endforeach;?>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="">
                            <div class="text-3xl font-semibold mt-4">
                                Waktu Saat Ini
                            </div>
                            <div class="current-time text-5xl font-bold mt-2">--:--:-- WITA</div>
                        </div> -->
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- Add more carousel items as needed -->
            </div>
        </div>
    </body>
</html>