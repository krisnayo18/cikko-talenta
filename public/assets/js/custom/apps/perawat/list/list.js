"use strict";
var KTPerawatList = function() {
    
    var t, e, o, n, c = ()=>{
        n.querySelectorAll('[data-kt-perawat-table-filter="delete_row"]').forEach((e=>{
            e.addEventListener("click", (function(e) {
                e.preventDefault();
                
                const o = e.target.closest("tr")
                  , n = o.querySelectorAll("td")[1].innerText;

                const idPerawat = o.querySelectorAll("td")[5].getAttribute('data-id');
                console.log(idPerawat);
              
                Swal.fire({
                    text: "Apakah Anda yakin untuk menghapus " + n + "?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Iya, hapus!",
                    cancelButtonText: "Tidak, batalkan",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function(e) {
                    e.value ? axios.delete('perawats/' + idPerawat ).then(function (response){
                        console.log(response);
                        if (response) {
                            Swal.fire({
                                text: "Anda berhasil menghapus " + n + "!.",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            })
                            t.row($(o)).remove().draw()
                        }
                        else {
                            Swal.fire({
                                text: "Sorry, please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }

                    }).catch(function(error) {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                        console.log(error);
                    }): "cancel" === e.dismiss && Swal.fire({
                            text: n + " tidak berhasil dihapus.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, dimengerti!",
                            customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }
                ))
            }
            ))
        }
        ))
    }
    , r = ()=>{
        const e = n.querySelectorAll('[type="checkbox"]')
          , o = document.querySelector('[data-kt-perawat-table-select="delete_selected"]');
        e.forEach((t=>{
            t.addEventListener("click", (function() {
                if($(".checkbox-perawat").prop('checked') == true) console.log('iya');
                else console.log('tidak');
                setTimeout((function() {
                    
                    l()
                }
                ), 50)
            }
            ))
        }
        )),
        o.addEventListener("click", (function() {

           

            // const k = o.target.closest("tr");
            console.log(o);
            var idPerawat;
            // e.forEach((e=>{
            //             console.log(t.row());
            //         }
            // ));
            idPerawat =   k.querySelectorAll("[type='checkbox']")[0].getAttribute('data-id');
            console.log(idPerawat);
            
            Swal.fire({
                text: "Apakah anda yakin untuk menghapus data perawat yang dipilih?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((function(o) {
               
                // o.value ? axios.delete('perawats/', $idPerawat ).then(function (response){
                //     console.log(response);
                //     if (response) {
                //         Swal.fire({
                //             text: "Anda berhasil menghapus " + n + "!.",
                //             icon: "success",
                //             buttonsStyling: !1,
                //             confirmButtonText: "Ok, got it!",
                //             customClass: {
                //                 confirmButton: "btn fw-bold btn-primary"
                //             }
                //         })
                //         t.row($(o)).remove().draw()
                //     }
                //     else {
                //         Swal.fire({
                //             text: "Sorry, please try again.",
                //             icon: "error",
                //             buttonsStyling: false,
                //             confirmButtonText: "Ok, got it!",
                //             customClass: {
                //                 confirmButton: "btn btn-primary"
                //             }
                //         });
                //     }

                // }).catch(function(error) {
                //     Swal.fire({
                //         text: "Sorry, looks like there are some errors detected, please try again.",
                //         icon: "error",
                //         buttonsStyling: false,
                //         confirmButtonText: "Ok, got it!",
                //         customClass: {
                //             confirmButton: "btn btn-primary"
                //         }
                //     });
                //     console.log(error);
                // }): "cancel" === e.dismiss && Swal.fire({
                //         text: n + " tidak berhasil dihapus.",
                //         icon: "error",
                //         buttonsStyling: !1,
                //         confirmButtonText: "Ok, dimengerti!",
                //         customClass: {
                //         confirmButton: "btn fw-bold btn-primary"
                //     }
                // })



                // o.value ? Swal.fire({
                //     text: "You have deleted all selected doctors!.",
                //     icon: "success",
                //     buttonsStyling: !1,
                //     confirmButtonText: "Ok, got it!",
                //     customClass: {
                //         confirmButton: "btn fw-bold btn-primary"
                //     }
                // }).then((function() {
                //     e.forEach((e=>{
                //         e.checked && t.row($(e.closest("tbody tr"))).remove().draw()
                //     }
                //     ));
                //     n.querySelectorAll('[type="checkbox"]')[0].checked = !1
                // }
                // )) : "cancel" === o.dismiss && Swal.fire({
                //     text: "Selected nurses was not deleted.",
                //     icon: "error",
                //     buttonsStyling: !1,
                //     confirmButtonText: "Ok, got it!",
                //     customClass: {
                //         confirmButton: "btn fw-bold btn-primary"
                //     }
                // })
            }
            ))
        }
        ))
    };
    const l = ()=>{
        const t = document.querySelector('[data-kt-perawat-table-toolbar="base"]')
          , e = document.querySelector('[data-kt-perawat-table-toolbar="selected"]')
          , o = document.querySelector('[data-kt-perawat-table-select="selected_count"]')
          , c = n.querySelectorAll('tbody [type="checkbox"]');
        let r = !1
          , l = 0;
        c.forEach((t=>{
            t.checked && (r = !0,
            l++)
        }
        )),
        r ? (o.innerHTML = l,
        t.classList.add("d-none"),
        e.classList.remove("d-none")) : (t.classList.remove("d-none"),
        e.classList.add("d-none"))
    }
    ;
    return {
        init: function() {
           
            (n = document.querySelector("#kt_perawat_table")) && (n.querySelectorAll("tbody tr").forEach((t=>{
                const e = t.querySelectorAll("td")
                  , o = moment(e[5].innerHTML, "DD MMM YYYY, LT").format();
                e[5].setAttribute("data-order", o)
            }
            )),
            (t = $(n).DataTable({
                info: !1,
                order: [],
                columnDefs: [{
                    orderable: !1,
                    targets: 0
                }, {
                    orderable: !1,
                    targets: 5
                }]
            })).on("draw", (function() {
                r(),
                c(),
                l(),
                KTMenu.init()
            }
            )),
            r(),
            document.querySelector('[data-kt-perawat-table-filter="search"]').addEventListener("keyup", (function(e) {
                t.search(e.target.value).draw()
            }
            )),
            e = $('[data-kt-perawat-table-filter="month"]'),
            o = document.querySelectorAll('[data-kt-perawat-table-filter="payment_type"] [name="payment_type"]'),
            document.querySelector('[data-kt-perawat-table-filter="filter"]').addEventListener("click", (function() {
                const n = e.val();
                let c = "";
                o.forEach((t=>{
                    t.checked && (c = t.value),
                    "all" === c && (c = "")
                }
                ));
                const r = n + " " + c;
                t.search(r).draw()
            }
            )),
            c(),
            document.querySelector('[data-kt-perawat-table-filter="reset"]').addEventListener("click", (function() {
                e.val(null).trigger("change"),
                o[0].checked = !0,
                t.search("").draw()
            }
            )))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
        KTPerawatList.init()
    }
));
