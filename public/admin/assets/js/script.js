

function btnDelete(section,data) {
    $(this).submit(function(){
        return false;
        });
        var url = "/admin/"+section+"/"+data+"";

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Anda tidak dapat mengembalikan data yang sudah terhapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'post',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: url,
                  data: {
                    '_method': 'delete',
                  },
              }).done(function(res) {
                Swal.fire(
                    'Terhapus!',
                    res.message,
                    'success'
                  ).then(()=>{
                    location.reload();
                  });

              });

        }
      })
}


