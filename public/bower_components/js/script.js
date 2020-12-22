



// $("#button-search").on('click', function () {
//     coba();
// });
// $('#button-input').on('keyup', function (e) {
//     if (e.which === 13) {
//         coba()
//     }
// })
// function coba() {
//     $('#error').html('');
//     $.ajax({
//         url: "{{ route('live_search.ajax') }}",
//         type: 'get',
//         dataType: 'json',
//         data: {query:query},
//         success: function (result) {
//             if (result.Error) { 
//                 $('#error').append('Tidak Ditemukan Produk!')
//             } else {
//                 let produk = result.Search;
//                 $.each(produk, function (query) {
//                     $('#error').append(`
//                     <p>`+ query.produk+`</p>`)

//                 })
//             }
//         }
//    })
// }

// $('#error').on('click', '#detail', function () {
//     $.ajax({
//         url: "{{ route('live_search.ajax) }}",
//         type: 'get',
//         dataType: 'json',
//         data: {query:query},
//         success: function (data) {
//             $('#content').html(`<p>`+ query.produk+`</p>`)
//         }
//     })
// });


// // $('#button-search').on('click', function () {
// //     coba();
// // });

// // $('#button-search').on('keyup', function (e) {
// //     if (e.which === 13) {
// //         coba()
// //     }
// // })
// // $(document).on('keyup' , '#search' , function(){
// //     var query = $(this).val();
// //     coba(query);
// // })
// // function coba(query = '') {
// //     $.ajax({
// //         url: "{{ route('live_search.ajax)}}",
// //         type: 'get',
// //         dataType: 'json',
// //         data: {query:query},
// //         success: function (result) {
// //                 $('tbody').html(data.tabel_data);
// //                 $('#total_records').text(data.tabel_data);

// //             }
// //         })
// //     }
