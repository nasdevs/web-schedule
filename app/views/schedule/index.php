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
            // jam
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

                updateTableStatus(now);
            }

            setInterval(updateTime, 1000);

            // tanggal
            document.addEventListener('DOMContentLoaded', () => {
                const tanggalElement = document.getElementById('tanggal');
                const today = new Date();
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                };
                tanggalElement.textContent = today.toLocaleDateString(
                    'id-ID',
                    options
                );
            });

            // update status dan highlight row
            function updateTableStatus(now) {
                const rows = document.querySelectorAll(
                    '#kegiatan-table tbody tr'
                );
                rows.forEach((row) => {
                    const waktu = row.children[0].innerText.split('-');
                    const startTime = waktu[0].trim();
                    const endTime = waktu[1].trim();
                    const start = new Date(now);
                    const end = new Date(now);

                    start.setHours(parseInt(startTime.split('.')[0]));
                    start.setMinutes(parseInt(startTime.split('.')[1]));
                    start.setSeconds(0);

                    end.setHours(parseInt(endTime.split('.')[0]));
                    end.setMinutes(parseInt(endTime.split('.')[1]));
                    end.setSeconds(0);

                    const statusCell = row.children[3];

                    if (now >= start && now <= end) {
                        statusCell.innerText = 'Proses';
                        row.classList.add('bg-blue-300', 'text-black');
                        row.classList.remove('bg-gray-300', 'text-gray-700');
                    } else if (now > end) {
                        statusCell.innerText = 'Selesai';
                        row.classList.add('bg-gray-300', 'text-gray-700');
                        row.classList.remove('bg-blue-300', 'text-black');
                    } else {
                        statusCell.innerText = '';
                        row.classList.remove(
                            'bg-blue-300',
                            'text-black',
                            'bg-gray-300',
                            'text-gray-700'
                        );
                    }
                });
            }

            let currentIndex = 0;
            const allDataIndex = 1; // Assuming "all data" is the second item
            const normalInterval = 3000; // 3 seconds
            const allDataInterval = 10000; // 10 seconds

            function updateCarousel() {
                const carouselInner = document.querySelector('.carousel-inner');
                const items = document.querySelectorAll('.carousel-item');
                const totalItems = items.length;
                const allDataItem = document.querySelector('.all-data');
                const allDataIndex = Array.from(items).indexOf(allDataItem);

                if (currentIndex < totalItems - 1) {
                    currentIndex++;
                    carouselInner.style.transition = 'transform 1s ease-in-out';
                    carouselInner.style.transform = `translateX(-${
                        currentIndex * 100
                    }%)`;
                    items.forEach((item) => item.classList.remove('fade-in'));
                } else {
                    setTimeout(() => {
                        carouselInner.style.transition = 'none';
                        currentIndex = 0;
                        carouselInner.style.transform = `translateX(0%)`;
                        items[0].classList.add('fade-in');
                    }, normalInterval);
                }

                const nextInterval =
                    currentIndex === allDataIndex
                        ? allDataInterval
                        : normalInterval;
                setTimeout(updateCarousel, nextInterval);
            }

            setTimeout(updateCarousel, normalInterval);
        </script>
    </head>
    <body
        class="min-h-screen flex flex-col items-center justify-center text-center bg-gray-100"
    >
        <div class="judul font-semibold text-7xl pb-10">Dekanat FIKOM</div>
        <div class="current-time text-5xl font-bold mb-10">--:--:-- WITA</div>
        <div class="carousel w-[90%] mx-4 bg-white shadow-lg rounded-lg">
            <div class="carousel-inner">

                <?php foreach($data['pimpinan'] as $pimpinan) :
                ?>
                <div
                    class="carousel-item flex flex-col md:flex-row justify-between p-10"
                >
                    <div class="flex flex-col items-center m-5 mx-56">
                        <div class="relative flex border-4 border-black">
                            <img
                                src="<?= BASEURL . '/assets/foto_dosen/' . $pimpinan['path_foto']?>"
                                alt=""
                                class="300px] md:w-[500px] h-[400px] md:h-[700px] object-cover"
                            />
                            <div
                                class="absolute w-[70px] bg-[<?= $pimpinan['kehadiran'] == 1 ? '#00A300' : '#A30000'?>] flex items-center justify-center"
                            >
                                <p
                                    class="text-white font-bold text-4xl"
                                    style="
                                        writing-mode: vertical-rl;
                                        transform: rotate(180deg);
                                    "
                                >
                                    <?= $pimpinan['ket_kehadiran']?>
                                </p>
                            </div>
                        </div>
                        <p class="font-bold text-2xl"><?= $pimpinan['jabatan']?></p>
                        <div class="text-center">
                            <p class="font-semibold text-xl">
                                <?= $pimpinan['nama']?>
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col items-start w-[900px]">
                        <div class="mb-4">
                            <h2 class="text-2xl font-bold mb-4">
                                Kegiatan
                                <span
                                    id="tanggal"
                                    class="text-2xl font-bold"
                                ></span>
                            </h2>
                            <table
                                id="kegiatan-table"
                                class="table-auto border-collapse w-[800px] text-2xl bg-white shadow-md rounded-lg"
                            >
                                <thead class="bg-blue-400">
                                    <tr>
                                        <th
                                            class="border border-gray-300 px-6 py-4"
                                        >
                                            Waktu
                                        </th>
                                        <th
                                            class="border border-gray-300 px-6 py-4"
                                        >
                                            Kegiatan
                                        </th>
                                        <th
                                            class="border border-gray-300 px-6 py-4"
                                        >
                                            Lokasi
                                        </th>
                                        <th
                                            class="border border-gray-300 px-6 py-4"
                                        >
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no_schedule = 1;
                                    foreach($data['schedule'] as $schedule) :
                                    if ($schedule['id_pimpinan'] != $pimpinan['id_pimpinan']) continue;
                                    ?>
                                    <tr class="even:bg-gray-100">
                                        <td class="border border-gray-300 px-6 py-4"><?= $schedule['waktu_start'] . '-' . $schedule['waktu_end']?></td>
                                        <td class="border border-gray-300 px-6 py-4"><?= $schedule['kegiatan']?></td>
                                        <td class="border border-gray-300 px-6 py-4"><?= $schedule['lokasi']?></td>
                                        <td class="border border-gray-300 px-6 py-4 isi-status"><?= $schedule['status'] == 1 ? "Selesai" : "Belum Selesai"?>
</td>
                                    </tr>
                                    <?php
                                    $no_schedule++;
                                    endforeach;?>
                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <!-- all data -->
                <div class="carousel-item flex flex-wrap justify-center p-10 all-data">
                    <!-- Item 2 -->
                    <?php foreach($data['pimpinan'] as $pimpinan): ?>
                    <div class="flex flex-col items-center m-5">
                        <div class="flex border-4 border-black">
                            <img
                                src="<?= BASEURL . '/assets/foto_dosen/' . $pimpinan['path_foto']?>"
                                alt=""
                                class="w-[250px] h-[300px] object-cover"
                            />
                            <div
                                class="w-[50px] bg-[#415C40] flex items-center justify-center"
                            >
                                <p
                                    class="text-white font-bold text-2xl"
                                    style="
                                        writing-mode: vertical-rl;
                                        transform: rotate(180deg);
                                    "
                                >
                                    <?= $pimpinan['ket_kehadiran']?>
                                </p>
                            </div>
                        </div>
                        <p class="font-bold text-2xl"><?= $pimpinan['jabatan']?></p>
                        <div class="text-center">
                            <p class="font-semibold text-xl">
                                    <?= $pimpinan['nama']?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </body>
</html>