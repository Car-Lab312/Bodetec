//Ejecutar función en el evento click
// document.getElementById("btn_open").addEventListener("click", open_close_menu);
// document.getElementById("barra").addEventListener("click", open_close_menu_);
// document.getElementById("btn_open_perfil").addEventListener("click", open_close_perfil);
document.getElementById("NuevoUsuario").addEventListener = ("click", Nuevo_Usuario);
// document.getElementById("NuevoUsuario").innerText = "Nuevo Usuario"
document.getElementById("ListarUsuario").innerText = "Listar Usuario"
// document.getElementById("BuscarUsuario").innerText = "Buscar Usuario"

//Declaramos variables
// let side_menu = document.getElementById("nav-lateral-content");
// let body = document.getElementById("body");
// let btn_open = document.getElementById("btn_open");
// let btn_open_barra = document.getElementById("barra");
// let side_menu_perfil = document.getElementById("menu_side_perfil_");
let Nuevo = document.getElementById("titulo-usuario");


//Evento para mostrar y ocultar menú
    // function open_close_menu(){
        // body.classList.toggle("body_move");
        // btn_open.classList.toggle("name_page_final");
        // side_menu.classList.toggle("nav-lateral-content_");
    // }
    function Nuevo_Usuario(){
        innerText = "Nuevo Usuario"
    }
    
    // function open_close_menu_(){
    //     // body.classList.toggle("body_move");
    //     // btn_open.classList.toggle("name_page_final");
    //     side_menu.classList.toggle("nav-lateral-content_");
    //     // btn_open.classList.add("name_page_barra");
    // }

    // function open_close_perfil(){
    //     // body.classList.toggle("body_move");
    //     side_menu_perfil.classList.toggle("menu_side_move_perfil");
    // }

//Si el ancho de la página es menor a 760px, ocultará el menú al recargar la página

// if (window.innerWidth < 760){

//     body.classList.add("body_move");
//     side_menu.classList.add("menu__side_move");
//     side_menu_perfil.classList.add("menu_side_move_perfil");
//     btn_open.classList.add("name_page_barra");
//     btn_open_barra.classList.add("barra_visible");
// }

// //Haciendo el menú responsive(adaptable)

// window.addEventListener("resize", function(){

//     if (window.innerWidth > 760){
//         body.classList.remove("body_move");
//         side_menu.classList.remove("menu__side_move");
//         side_menu_perfil.classList.remove("menu_side_move_perfil");        
//         // btn_open_barra.classList.add("barra_visible");
//         btn_open.classList.add("name_page_barra");
//         // function mostrarperfil()
//     }
    
//     if (window.innerWidth < 760){
        
//         body.classList.add("body_move");
//         side_menu.classList.add("menu__side_move");
//         side_menu_perfil.classList.add("menu_side_move_perfil");
//         btn_open.classList.add("name_page_barra");
//         btn_open_barra.classList.add("barra_visible");
        
//     }
// });