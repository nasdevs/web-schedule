$(document).ready(function() {
    BASEURL = 'https://localhost/web-schedule/public';

    function handlepimpinanChange(id_pimpinan) {
        $.ajax({
            url: BASEURL + '/admin/getschedulepimpinan',
            data: { id: id_pimpinan },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_pimpinan').val(id_pimpinan);
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
                        <td class="px-6 py-4 border-b border-gray-300 text-center">${row.lokasi}</td>
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


    $('#pimpinanDropdown').on('change', function() {
        handlepimpinanChange($(this).val());
    });

    $('#xyz').on('click', function() {
        handlepimpinanChange($("#id_pimpinan").val());
    });
})