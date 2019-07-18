<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#ekle').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route('yonetim.kategori') }}',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#ana-table').prepend(
                    '<tr id="tr-'+ data["data"]["ID"] +'">' +
                    '<td>'+ data["data"]["kategori_adi"] +'</td>' +
                    '<td>'+ 'Alt kategorisi yok' +'</td>' +
                    '<td>'+ data["data"]["kategori_link"] +'</td>' +
                    '<td>'+ data["data"]["olusturma_tarihi"] +'</td>' +
                    '<td>'+ '<a onclick="edit('+ data["data"]["ID"] +')" id="guncelle-'+ data["data"]["ID"] +'" class="edit btn btn-default" data-toggle="modal" data-target="#guncelle_form">Güncelle <i class="icon-pencil7"></i></a>' +'</td>' +
                    '<td>'+ '<a onclick="deleted('+ data["data"]["ID"] +')" id="sil-'+ data["data"]["ID"] +'" class="delete btn btn-default">Sil <i class="icon-trash"></i></a>' +'</td>' +
                    '</tr>'
                );
            },
            error: function (data) {
                console.log(data);
            }

        });
    });
    $('#guncelle').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route('yonetim.kategori') }}',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#tr-'+data['data']["ID"]).find('td:eq(0)').text("").text(data['data']['kategori_adi']);
                $('.close').trigger('click');
            },
            error: function (data) {
                console.log(data);
            }

        });
    });
    $('#kategori_adi').on('keyup', function () {
        $('#kategori_link').val("").val(ToSeoUrl($(this).val()));
    });
    $('.edit').on('click', function () {
        var ID = $(this).attr('id').split('-')[1];
        edit(ID);
    });
    function edit(ID) {
        //kategori adi
        var kategori_adi = $('#tr-'+ID).find('td:eq(0)').text();
        $('#guncelle').find('.form-group').eq(0).find('input').val("").val(kategori_adi);

        //ana kategorisi
        var ana_kategori = $('#tr-'+ID).find('td:eq(1)').text();
        $('#guncelle').find('.form-group').eq(1).find('input').val("").val(ana_kategori);

        //kategori id
        $('#guncelle').find('.form-group').eq(2).find('input').val("").val(ID);
    }
    $('.delete').on('click', function (e) {
        e.preventDefault();
        var ID = $(this).attr('id');
        swal({
            title: 'Bu kategoriyi',
            text: "Silmek istediğinizden eminmisiniz?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.value) {
                deleted(ID.split('-')[1]);
            }
        });
    });
    function deleted(ID) {
        $.ajax({
            type: 'POST',
            url: '{{ route('yonetim.kategorisil') }}',
            data: {
                ID: ID
            },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                swal(
                    'Silindi!',
                    'Kategori başarıyla silindi!.',
                    'success'
                );
                $('#tr-'+ID).remove();
            },
            error: function (data) {
                console.log(data);
            }

        });

    }
</script>