//App.start();

//Test API Rest

Rest.get({
    table: "product",
    id: 1,
    where: " active = false ",
    orderby: " title ASC "
}).done((resp) => {
    $('#main').hide().html(resp).fadeIn();
})

// Rest.post({
//     table: "product",
//     fields: {
//         title: "titre du produit",
//         active: true,
//         onsale: false
//     }
// }).done((resp) => {
//     $('#main').hide().html(resp).fadeIn();
// })

// Rest.put({
//     table: "product",
//     id: 1,
//     fields: {
//         //id : 2,
//         title: "nouveau titre 2"         
//     }
// }).done((resp) => {
//     $('#main').hide().html(resp).fadeIn();
// })

// Rest.delete({
//     table: "product",
//     id: 125
// }).done((resp) => {
//     $('#main').hide().html(resp).fadeIn();
// })