<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>FIKOM Dekanat</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
            rel="stylesheet"
        />
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background: url('<?= BASEURL ?> . /assets/latar.jpg') no-repeat center center fixed;
                background-size: 100% 100%;
                margin: 0;
                padding: 0;
            }
            .navbar {
                background-color: black;
                color: white;
                padding: 20px 0;
            }
            .navbar-content {
                margin: 0 auto;
                width: 100%;
                max-width: 2300px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 40px;
            }
            .main-content-wrapper {
                position: relative;
                width: 100%;
                max-width: 2300px;
                margin: 20px auto;
                padding: 20px;
                background: rgba(255, 255, 255, 0.4);
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                min-height: calc(100vh - 160px);
                overflow: hidden;
            }
            .main-content {
                display: none;
                position: absolute;
                width: 100%;
                top: 0;
                left: 0;
                transition: transform 1s ease-in-out;
            }
            .main-content.active {
                display: block;
            }
            .slide-right-enter {
                transform: translateX(100%);
            }
            .slide-right-enter-active {
                transform: translateX(0%);
            }
            .slide-right-exit {
                transform: translateX(0%);
            }
            .slide-right-exit-active {
                transform: translateX(-100%);
            }
        </style>
    </head>
    <body>
        <!-- Header -->
        <div class="navbar">
            <div class="navbar-content">
                <div class="flex items-center">
                    <img src="<?= BASEURL?>/assets/umi.png" alt="UMI Logo" class="h-16 mr-4" />
                    <img src="<?= BASEURL?>/assets/fikom.png" alt="FIKOM Logo" class="h-16" />
                </div>
                <h1 class="text-4xl font-bold">DEKANAT FIKOM</h1>
                <div id="clock" class="text-3xl font-semibold">
                    00 : 00 : 00 WITA
                </div>
            </div>
        </div>

        <!-- Main Content Wrapper -->
        <div class="main-content-wrapper">
            <!-- Main Content 1 -->
            <div id="dekan" class="main-content active">
                <div class="flex">
                    <!-- Profile Section -->
                    <div class="w-1/3 flex flex-col items-center p-8 relative">
                        <div class="text-center">
                            <div class="text-3xl font-bold">Dekan</div>
                            <div class="text-2xl">Fakultas Ilmu Komputer</div>
                        </div>
                        <div class="relative w-3/4">
                            <img
                                src="<?= BASEURL?>/assets/foto_pimpinan/dekan.png"
                                alt="Dekan"
                                class="rounded-lg w-full h-auto mb-4"
                            />
                            <div
                                class="absolute inset-x-0 bottom-[-5px] bg-green-500 text-white font-semibold text-center rounded-lg py-1 px-4 mx-auto text-2xl"
                                style="width: fit-content"
                            >
                                Status : Hadir
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <div class="text-3xl font-semibold mb-10">
                                Ir. Purnawansyah, M.Kom., MTA
                            </div>
                            <div
                                class="mt-10 bg-[#FFC81A] text-black text-center py-3 px-4 rounded-lg text-lg font-semibold flex items-center justify-center mx-auto"
                                style="width: fit-content"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 mr-2"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"
                                    />
                                </svg>
                                <span class="lokasi_pimpinan">Lokasi</span>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Table Section -->
                    <div class="w-2/3 p-8">
                        <h2 class="text-2xl font-bold mb-4 text-center">
                            Kegiatan
                        </h2>
                        <table class="w-full border-collapse rounded-md">
                            <thead>
                                <tr>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Hari/Tgl
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Kegiatan
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Jam
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Tempat
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Pelaksana
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-[#E6E6E6] text-black font-semibold text-center"
                                >
                                    <td class="border px-4 py-2">2024-08-07</td>
                                    <td class="border px-4 py-2">
                                        Rapat Kerja Bersama Rektor
                                    </td>
                                    <td class="border px-4 py-2">
                                        10:00-12:00
                                    </td>
                                    <td class="border px-4 py-2">
                                        Ruang Rapat Lantai 1
                                    </td>
                                    <td class="border px-4 py-2">Rektorat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Main Content 2 -->
            <div id="wd-1" class="main-content active">
                <div class="flex">
                    <!-- Profile Section -->
                    <div class="w-1/3 flex flex-col items-center p-8 relative">
                        <div class="text-center">
                            <div class="text-3xl font-bold">Wakil Dekan I</div>
                            <div class="text-2xl">Fakultas Ilmu Komputer</div>
                        </div>
                        <div class="relative w-3/4">
                            <img
                                src="<?= BASEURL?>/assets/foto_pimpinan/wd-1.png"
                                alt="Dekan"
                                alt="Dekan"
                                class="rounded-lg w-full h-auto mb-4"
                            />
                            <div
                                class="absolute inset-x-0 bottom-[-5px] bg-green-500 text-white font-semibold text-center rounded-lg py-1 px-4 mx-auto text-2xl"
                                style="width: fit-content"
                            >
                                Status : Hadir
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <div class="text-3xl font-semibold mb-10">
                                Ir. Yulita Salim, S.Kom., M.T., MTA.
                            </div>
                            <div
                                class="mt-10 bg-[#FFC81A] text-black text-center py-3 px-4 rounded-lg text-lg font-semibold flex items-center justify-center mx-auto"
                                style="width: fit-content"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 mr-2"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"
                                    />
                                </svg>
                                <span class="lokasi_pimpinan">Lokasi</span>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Table Section -->
                    <div class="w-2/3 p-8">
                        <h2 class="text-2xl font-bold mb-4 text-center">
                            Kegiatan
                        </h2>
                        <table class="w-full border-collapse rounded-md">
                            <thead>
                                <tr>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Hari/Tgl
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Kegiatan
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Jam
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Tempat
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Pelaksana
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-[#E6E6E6] text-black font-semibold text-center"
                                >
                                    <td class="border px-4 py-2">2024-08-07</td>
                                    <td class="border px-4 py-2">
                                        Rapat Kerja Bersama Rektor
                                    </td>
                                    <td class="border px-4 py-2">
                                        10:00-12:00
                                    </td>
                                    <td class="border px-4 py-2">
                                        Ruang Rapat Lantai 1
                                    </td>
                                    <td class="border px-4 py-2">Rektorat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Main Content 3 -->
            <div id="wd-2" class="main-content active">
                <div class="flex">
                    <!-- Profile Section -->
                    <div class="w-1/3 flex flex-col items-center p-8 relative">
                        <div class="text-center">
                            <div class="text-3xl font-bold">Wakil Dekan II</div>
                            <div class="text-2xl">Fakultas Ilmu Komputer</div>
                        </div>
                        <div class="relative w-3/4">
                            <img
                                src="<?= BASEURL?>/assets/foto_pimpinan/wd-2.png"
                                alt="Dekan"
                                class="rounded-lg w-full h-auto mb-4"
                            />
                            <div
                                class="absolute inset-x-0 bottom-[-5px] bg-red-500 text-white font-semibold text-center rounded-lg py-1 px-4 mx-auto text-2xl"
                                style="width: fit-content"
                            >
                                Status : Tidak Hadir
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <div class="text-3xl font-semibold mb-10">
                                Dr. Ir. Hj. Harlinda, MM., M.Kom., MTA
                            </div>
                            <div
                                class="mt-10 bg-[#FFC81A] text-black text-center py-3 px-4 rounded-lg text-lg font-semibold flex items-center justify-center mx-auto"
                                style="width: fit-content"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 mr-2"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"
                                    />
                                </svg>
                                <span class="lokasi_pimpinan">Lokasi</span>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Table Section -->
                    <div class="w-2/3 p-8">
                        <h2 class="text-2xl font-bold mb-4 text-center">
                            Kegiatan
                        </h2>
                        <table class="w-full border-collapse rounded-md">
                            <thead>
                                <tr>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Hari/Tgl
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Kegiatan
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Jam
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Tempat
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Pelaksana
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-[#E6E6E6] text-black font-semibold text-center"
                                >
                                    <td class="border px-4 py-2">2024-08-07</td>
                                    <td class="border px-4 py-2">
                                        Rapat Kerja Bersama Rektor
                                    </td>
                                    <td class="border px-4 py-2">
                                        10:00-12:00
                                    </td>
                                    <td class="border px-4 py-2">
                                        Ruang Rapat Lantai 1
                                    </td>
                                    <td class="border px-4 py-2">Rektorat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Main Content 4 -->
            <div id="wd-3" class="main-content active">
                <div class="flex">
                    <!-- Profile Section -->
                    <div class="w-1/3 flex flex-col items-center p-8 relative">
                        <div class="text-center">
                            <div class="text-3xl font-bold">
                                Wakil Dekan III
                            </div>
                            <div class="text-2xl">Fakultas Ilmu Komputer</div>
                        </div>
                        <div class="relative w-3/4">
                            <img
                                src="<?= BASEURL?>/assets/foto_pimpinan/wd-3.png"
                                alt="Dekan"
                                class="rounded-lg w-full h-auto mb-4"
                            />
                            <div
                                class="absolute inset-x-0 bottom-[-5px] bg-red-500 text-white font-semibold text-center rounded-lg py-1 px-4 mx-auto text-2xl"
                                style="width: fit-content"
                            >
                                Status : Tidak Hadir
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <div class="text-3xl font-semibold mb-10">
                                Poetri Lestari Lokapitasari Belluano, S.Kom.,
                                MT., MTA
                            </div>
                            <div
                                class="mt-10 bg-[#FFC81A] text-black text-center py-3 px-4 rounded-lg text-lg font-semibold flex items-center justify-center mx-auto"
                                style="width: fit-content"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 mr-2"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"
                                    />
                                </svg>
                                <span class="lokasi_pimpinan">Lokasi</span>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Table Section -->
                    <div class="w-2/3 p-8">
                        <h2 class="text-2xl font-bold mb-4 text-center">
                            Kegiatan
                        </h2>
                        <table class="w-full border-collapse rounded-md">
                            <thead>
                                <tr>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Hari/Tgl
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Kegiatan
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Jam
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Tempat
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Pelaksana
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-[#E6E6E6] text-black font-semibold text-center"
                                >
                                    <td class="border px-4 py-2">2024-08-07</td>
                                    <td class="border px-4 py-2">
                                        Rapat Kerja Bersama Rektor
                                    </td>
                                    <td class="border px-4 py-2">
                                        10:00-12:00
                                    </td>
                                    <td class="border px-4 py-2">
                                        Ruang Rapat Lantai 1
                                    </td>
                                    <td class="border px-4 py-2">Rektorat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Main Content 5 -->
            <div id="wd-4" class="main-content active">
                <div class="flex">
                    <!-- Profile Section -->
                    <div class="w-1/3 flex flex-col items-center p-8 relative">
                        <div class="text-center">
                            <div class="text-3xl font-bold">Wakil Dekan IV</div>
                            <div class="text-2xl">Fakultas Ilmu Komputer</div>
                        </div>
                        <div class="relative w-3/4">
                            <img
                                src="<?= BASEURL?>/assets/foto_pimpinan/wd-4.png"
                                alt="wakil dekan 4"
                                class="rounded-lg w-full h-auto mb-4"
                            />
                            <div
                                class="absolute inset-x-0 bottom-[-5px] bg-green-500 text-white font-semibold text-center rounded-lg py-1 px-4 mx-auto text-2xl"
                                style="width: fit-content"
                            >
                                Status : Hadir
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <div class="text-3xl font-semibold mb-10">
                                Dr. H. Nukman, M.A
                            </div>
                            <div
                                class="mt-10 bg-[#FFC81A] text-black text-center py-3 px-4 rounded-lg text-lg font-semibold flex items-center justify-center mx-auto"
                                style="width: fit-content"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 mr-2"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"
                                    />
                                </svg>
                                <span class="lokasi_pimpinan">Lokasi</span>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Table Section -->
                    <div class="w-2/3 p-8">
                        <h2 class="text-2xl font-bold mb-4 text-center">
                            Kegiatan
                        </h2>
                        <table class="w-full border-collapse rounded-md">
                            <thead>
                                <tr>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Hari/Tgl
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Kegiatan
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Jam
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Tempat
                                    </th>
                                    <th
                                        class="border px-4 py-2 text-white font-semibold text-center"
                                        style="background-color: #22201f"
                                    >
                                        Pelaksana
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-[#E6E6E6] text-black font-semibold text-center"
                                >
                                    <td class="border px-4 py-2">2024-08-07</td>
                                    <td class="border px-4 py-2">
                                        Rapat Kerja Bersama Rektor
                                    </td>
                                    <td class="border px-4 py-2">
                                        10:00-12:00
                                    </td>
                                    <td class="border px-4 py-2">
                                        Ruang Rapat Lantai 1
                                    </td>
                                    <td class="border px-4 py-2">Rektorat</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Main Content 6 -->
            <div id="content6" class="main-content">
                <div class="flex flex-wrap justify-center">
                    <!-- Row 1: 3 Profiles -->
                    <div class="w-full md:w-1/3 p-2 flex justify-center">
                        <div class="text-center" style="max-width: 300px">
                            <div class="text-xl font-bold">Dekan</div>
                            <div class="text-lg">Fakultas Ilmu Komputer</div>
                            <div class="relative w-full">
                                <img
                                    src="<?= BASEURL?>/assets/foto_pimpinan/dekan.png"
                                    alt="Dekan"
                                    class="rounded-lg w-full h-auto mb-2"
                                />
                                <div
                                    class="absolute inset-x-0 bottom-[-5px] bg-green-500 text-white font-semibold text-center rounded-lg py-1 px-3 mx-auto text-lg"
                                    style="width: fit-content"
                                >
                                    Hadir
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <div class="text-xl font-semibold mb-4">
                                    Ir. Purnawansyah, M.Kom., MTA
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 p-2 flex justify-center">
                        <div class="text-center" style="max-width: 300px">
                            <div class="text-xl font-bold">Wakil Dekan I</div>
                            <div class="text-lg">Fakultas Ilmu Komputer</div>
                            <div class="relative w-full">
                                <img
                                    src="<?= BASEURL?>/assets/foto_pimpinan/wd-1.png"
                                    alt="Dekan I"
                                    class="rounded-lg w-full h-auto mb-2"
                                />
                                <div
                                    class="absolute inset-x-0 bottom-[-5px] bg-green-500 text-white font-semibold text-center rounded-lg py-1 px-3 mx-auto text-lg"
                                    style="width: fit-content"
                                >
                                    Hadir
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <div class="text-xl font-semibold mb-4">
                                    Ir. Yulita Salim, S.Kom., M.T., MTA
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 p-2 flex justify-center">
                        <div class="text-center" style="max-width: 300px">
                            <div class="text-xl font-bold">Wakil Dekan II</div>
                            <div class="text-lg">Fakultas Ilmu Komputer</div>
                            <div class="relative w-full">
                                <img
                                    src="<?= BASEURL?>/assets/foto_pimpinan/wd-2.png"
                                    alt="Dekan II"
                                    class="rounded-lg w-full h-auto mb-2"
                                />
                                <div
                                    class="absolute inset-x-0 bottom-[-5px] bg-red-500 text-white font-semibold text-center rounded-lg py-1 px-3 mx-auto text-lg"
                                    style="width: fit-content"
                                >
                                    Tidak Hadir
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <div class="text-xl font-semibold mb-4">
                                    Dr. Ir. Hj. Harlinda, MM., M.Kom., MTA
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: 2 Profiles -->
                    <div class="w-full md:w-1/3 p-2 flex justify-center">
                        <div class="text-center" style="max-width: 300px">
                            <div class="text-xl font-bold">Wakil Dekan III</div>
                            <div class="text-lg">Fakultas Ilmu Komputer</div>
                            <div class="relative w-full">
                                <img
                                    src="<?= BASEURL?>/assets/foto_pimpinan/wd-3.png"
                                    alt="Dekan III"
                                    class="rounded-lg w-full h-auto mb-2"
                                />
                                <div
                                    class="absolute inset-x-0 bottom-[-5px] bg-green-500 text-white font-semibold text-center rounded-lg py-1 px-3 mx-auto text-lg"
                                    style="width: fit-content"
                                >
                                    Hadir
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <div class="text-xl font-semibold mb-4">
                                    Poetri Lestari Lokapitasari Belluano,
                                    S.Kom., MT., MTA
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 p-2 flex justify-center">
                        <div class="text-center" style="max-width: 300px">
                            <div class="text-xl font-bold">Wakil Dekan IV</div>
                            <div class="text-lg">Fakultas Ilmu Komputer</div>
                            <div class="relative w-full">
                                <img
                                    src="<?= BASEURL?>/assets/foto_pimpinan/wd-4.png"
                                    alt="Dekan IV"
                                    class="rounded-lg w-full h-96 mb-2"
                                />
                                <div
                                    class="absolute inset-x-0 bottom-[-5px] bg-red-500 text-white font-semibold text-center rounded-lg py-1 px-3 mx-auto text-lg"
                                    style="width: fit-content"
                                >
                                    Tidak Hadir
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <div class="text-xl font-semibold mb-4">
                                    Dr. H. Nukman, M.A
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function updateTime() {
                const clockElement = document.getElementById('clock');
                const now = new Date();

                // Create a new date object with the UTC time
                const utcTime = new Date(
                    now.getTime() + now.getTimezoneOffset() * 60000
                );

                // Add 8 hours for WITA (UTC+8)
                const witaTime = new Date(
                    utcTime.setHours(utcTime.getHours() + 8)
                );

                const hours = String(witaTime.getHours()).padStart(2, '0');
                const minutes = String(witaTime.getMinutes()).padStart(2, '0');
                const seconds = String(witaTime.getSeconds()).padStart(2, '0');

                clockElement.textContent = `${hours} : ${minutes} : ${seconds} WITA`;
            }

            setInterval(updateTime, 1000);
            const contents = document.querySelectorAll('.main-content');
            let currentIndex = 0;

            function showContent(index) {
                contents.forEach((content, i) => {
                    content.classList.remove(
                        'active',
                        'slide-right-enter-active',
                        'slide-right-exit-active'
                    );
                    content.classList.add('slide-right-exit');
                    if (i === index) {
                        content.classList.add('active', 'slide-right-enter');
                        setTimeout(() => {
                            content.classList.remove('slide-right-enter');
                            content.classList.add('slide-right-enter-active');
                        }, 10);
                    }
                });
            }

            function nextContent() {
                const nextIndex = (currentIndex + 1) % contents.length;
                showContent(nextIndex);
                currentIndex = nextIndex;
            }

            setInterval(nextContent, 7000);
        </script>
    </body>
</html>
