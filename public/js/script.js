$(document).ready(function() {
    BASEURL = 'https://localhost/web-schedule/public';

    function handleDosenChange(id_dosen) {
        $.ajax({
            url: BASEURL + '/admin/getscheduledosen',
            data: { id: id_dosen },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_dosen').val(id_dosen);
                const tbody = $('#kegiatanTableBody');
                tbody.empty();

                data.forEach((row, index) => {
                    const tr = $('<tr>').addClass('hover:bg-gray-100 transition duration-300 ease-in-out');
                    const startTime = row.waktu_start.substring(0, 5);
                    const endTime = row.waktu_end.substring(0, 5);
                    tr.html(`
                        <td class="px-6 py-4 border-b border-gray-300 text-center">${index + 1}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-center">${row.kegiatan}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-center">${startTime} - ${endTime}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-center">
                            <a href="#" onclick="confirmEdit(this)" id="${row.id_kegiatan}" class="inline-block px-4 py-2 text-black bg-green-400 hover:bg-green-500 rounded transition duration-300 ease-in-out">Ubah</a>
                            <a href="#" onclick="confirmDelete(this)" id="${row.id_kegiatan}" class="inline-block px-4 py-2 text-black bg-red-400 hover:bg-red-500 rounded transition duration-300 ease-in-out">Hapus</a>
                        </td>
                    `);
                    tbody.append(tr);
                });
            }
        });
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

    $('#dosenDropdown').on('change', function() {
        handleDosenChange($(this).val());
    });

    $('#xyz').on('click', function() {
        handleDosenChange($("#id_dosen").val());
    });
})