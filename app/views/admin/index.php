<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css" />
    <!-- DataTables Tailwind CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.tailwind.css" />
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
</head>
<body class="bg-gray-100">
    <div>
        <div class="flex justify-between items-center flex-wrap">
            <div class=""></div>
            <div class="text-4xl md:text-6xl font-bold text-center">
                Dashboard
            </div>
            <div class="mb-10 mt-10">
                <div id="logoutButton" class="border border-black p-3 bg-white hover:bg-red-500 hover:font-bold transition duration-300 ease-in-out cursor-pointer">
                    Logout
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between mt-2">
            <div class="absensi w-full md:w-1/2 ms-2">
                <div class="text-center text-2xl font-semibold">
                    Kehadiran pimpinan
                </div>
                <div class="absen border border-black h-[740px] p-3 m-2 bg-white overflow-auto">
                    <form action="" class="mt-4">
                        <table id="table1" class="w-full border border-gray-300 bg-gray-200 text-center">
                            <thead class="border border-gray-300">
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="border border-gray-300">
                                <?php 
                                $no = 1;
                                foreach ($data['pimpinan'] as $pimpinan) :
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $pimpinan['nip'] ?></td>
                                    <td><?= $pimpinan['nama'] ?></td>
                                    <td>
                                        <a href="<?= BASEURL . '/Admin/cs/' . $pimpinan['id_pimpinan']?>" onclick="return confirmAttendance(event, this)" class="inline-block px-4 py-2 text-black <?= $pimpinan['kehadiran'] == 1 ? 'bg-green-400 hover:bg-green-500 w-32' : 'bg-red-400 hover:bg-red-500 w-32'?> font-bold rounded transition duration-300 ease-in-out">
                                            <?= $pimpinan['kehadiran'] == 1 ? "Hadir" : "Tidak Hadir"?>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                endforeach;?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="kegiatan w-full md:w-1/2 me-2 mt-10 md:mt-0">
                <div class="text-center text-2xl font-semibold">
                    Kegiatan pimpinan
                </div>
                <input type="hidden" name="id" id="id_pimpinan">

                <div class="border border-black p-3 m-2 h-[740px] bg-white overflow-auto">
                    <div class="block p-4 text-center">
                        <select id="pimpinanDropdown" class="text-xl text-black p-2 rounded-md border border-black">
                            <option value="" class="text-gray-400" disabled selected>
                                Pilih pimpinan Hadir
                            </option>
                            <?php foreach($data['pimpinan'] as $pimpinan) :
                            ?>
                            <option value="<?= $pimpinan['id_pimpinan']?>"><?= $pimpinan['nama']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <form action="">
                        <div class="overflow-x-auto max-h-[550px]">
                            <table id="kegiatanTable" class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md text-center">
                                <thead class="bg-gray-200 sticky top-0">
                                    <tr>
                                        <th class="px-6 py-3 border-b border-gray-300 text-center text-sm font-medium text-gray-700 uppercase tracking-wider">
                                            No
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-300 text-center text-sm font-medium text-gray-700 uppercase tracking-wider">
                                            Nama Kegiatan
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-300 text-center text-sm font-medium text-gray-700 uppercase tracking-wider">
                                            Jam
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-300 text-center text-sm font-medium text-gray-700 uppercase tracking-wider">
                                            Lokasi
                                        </th>
                                        <th class="px-6 py-3 border-b border-gray-300 text-center text-sm font-medium text-gray-700 uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="kegiatanTableBody" class="overflow-y-auto max-h-96">
                                    <!--  -->
                                </tbody>
                            </table>
                        </div>
                        <div class="flex justify-center mt-4">
                            <button type="button" onclick="addRow()" class="bg-green-400 text-black px-10 py-2 text-2xl rounded hover:bg-blue-600 transition duration-300">
                                +
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="pimpinan mb-36 flex flex-col justify-center items-center">
            <div class="font-bold text-4xl p-10 mt-10 text-center">
                Tambah pimpinan
            </div>
            <div class="w-full md:w-[1200px] border border-black m-3 p-3 bg-white flex justify-center">
                <form action="<?= BASEURL . '/admin/add' ?>" method="post" enctype="multipart/form-data">
                    <div class="flex flex-col justify-center items-center">
                        <input name="nip" type="text" placeholder="NIP" class="p-4 border border-black w-full md:w-[600px] mt-10 mb-6" required />
                        <input name="nama" type="text" placeholder="Nama Lengkap" class="p-4 border border-black w-full md:w-[600px] mb-6" required />
                        <input name="jabatan" type="text" placeholder="Jabatan" class="p-4 border border-black w-full md:w-[600px] mb-6" required />
                        <input name="path_foto" type="file" placeholder="masukkan foto" class="p-4 border border-black w-full md:w-[600px] mb-6" />
                        <button type="submit" onclick="confirmAdd()" class="bg-green-300 hover:bg-green-400 p-4 border border-black w-full md:w-[200px] font-semibold hover:font-bold">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="block text-center mb-6">
        <p class="copyright">© 2024 Iclabs FIKOM</p>
    </footer>

    <!-- jQuery -->
    <script src="<?= BASEURL . '/js/script.js' ?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Initialize DataTables -->
    <script>
        var BASEURL = 'https://localhost/web-schedule/public';

        $(document).ready(function () {
            $('#table1').DataTable();
            $('#table2').DataTable();
        });

        function confirmAttendance(event, button) {
            event.preventDefault();
            const row = button.closest('tr');
            const nama = row.cells[2].innerText;

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: `Atas nama "${nama}" <?= $pimpinan['kehadiran'] == 1 ? "Hadir" : "Tidak Hadir"?> dan berada di kampus saat ini?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, <?= $pimpinan['kehadiran'] == 1 ? "Hadir" : "Tidak Hadir"?>',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = button.href;
                }
            });

            return false;
        }

        function confirmDelete(button) {
            const id_kegiatan = button.id;
            console.log(id_kegiatan);

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda akan menghapus kegiatan ini.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    const row = button.closest('tr');

                    $.ajax({
                        url: BASEURL + '/admin/ds',
                        data: { id: id_kegiatan },
                        method: 'post',
                        dataType: 'json',
                        success: function (data) {
                            console.log('success');
                        }
                    });

                    row.remove();
                    Swal.fire(
                        'Dihapus!',
                        'Kegiatan telah dihapus.',
                        'success'
                    );
                }
            });
        }

        function confirmAdd() {
            Swal.fire({
                title: 'Success!',
                text: 'Form has been successfully submitted.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }

        function addRow() {
            const tableBody = document.getElementById('kegiatanTableBody');
            const newRow = document.createElement('tr');
            newRow.classList.add(
                'hover:bg-gray-100',
                'transition',
                'duration-300',
                'ease-in-out'
            );

            newRow.innerHTML = `
                <td class="px-6 py-4 border-b border-gray-300 text-center">-</td>
                <td class="px-6 py-4 border-b border-gray-300 text-center">
                    <input name="kegiatan" type="text" placeholder="Nama Kegiatan" class="p-2 border border-gray-300 rounded" />
                </td>
                <td class="px-6 py-4 border-b border-gray-300 text-center">
                    <input name="time_start" type="time" placeholder="Start Time" class="p-2 border border-gray-300 rounded mb-2" />
                    <input name="time_end" type="time" placeholder="End Time" class="p-2 border border-gray-300 rounded" />
                </td>
                <td class="px-6 py-4 border-b border-gray-300 text-center">
                    <input name="lokasi" type="text" placeholder="Lokasi Kegiatan" class="p-2 border border-gray-300 rounded" />
                </td>
                <td class="px-6 py-4 border-b border-gray-300 text-center">
                    <button id="xyz" type="button" onclick="saveRow(this)" class="inline-block px-4 py-2 text-black bg-green-400 hover:bg-green-500 rounded transition duration-300 ease-in-out">Simpan</button>
                    <button type="button" onclick="cancelRow(this)" class="inline-block px-4 py-2 text-black bg-red-400 hover:bg-red-500 rounded transition duration-300 ease-in-out">Cancel</button>
                </td>
            `;
            tableBody.appendChild(newRow);
        }

        function saveRow(button) {
            const row = button.closest('tr');
            const id_pimpinan = document.getElementById('id_pimpinan').value;
            const namaKegiatan = row.querySelector(
                'input[placeholder="Nama Kegiatan"]'
            ).value;
            const lokasi = row.querySelector(
                'input[placeholder="Lokasi Kegiatan"]'
            ).value;
            const startTime = row.querySelector(
                'input[placeholder="Start Time"]'
            ).value;
            const endTime = row.querySelector(
                'input[placeholder="End Time"]'
            ).value;

            if (namaKegiatan && startTime && endTime) {
                $.ajax({
                    url: BASEURL + '/admin/as',
                    data: {
                        id_pimpinan: id_pimpinan,
                        kegiatan: namaKegiatan,
                        waktu_start: startTime,
                        waktu_end: endTime,
                        lokasi: lokasi
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(response) {
                    }
                });

                row.innerHTML = `
                    <td class="px-6 py-4 border-b border-gray-300 text-center">-</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-center">${namaKegiatan}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-center">${startTime} - ${endTime}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-center">${lokasi}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-center">
                        <a href="#" onclick="confirmEdit(this)" class="inline-block px-4 py-2 text-black bg-green-400 hover:bg-green-500 rounded transition duration-300 ease-in-out">Ubah</a>
                        <a href="#" onclick="confirmDelete(this)" class="inline-block px-4 py-2 text-black bg-red-400 hover:bg-red-500 rounded transition duration-300 ease-in-out">Hapus</a>
                    </td>
                `;

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Mohon isi semua bidang.',
                });
            }
        }

        function cancelRow(button) {
            const row = button.closest('tr');
            row.remove();
        }
    </script>
</body>
</html>
