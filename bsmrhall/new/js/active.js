// const activePage = window.location.pathname;
// const navLinks = document.querySelectorAll('nav a').forEach(link => {
//   if(link.href.includes(`${activePage}`)){
//     link.classList.add('active');
//     console.log(link);
//   }
// })

// $(document).on('click','#nav-menu ul li',function(){
//   $(this).addClass('active').siblings().removeClass('active')
// });


$(document).ready(function () {
  // typing animation script
  var typed = new Typed(".typing", {
    strings: ["Hall Outside View"],
    typeSpeed: 190,
    backSpeed: 150,
    loop: true
  });
  var typed = new Typed(".typing-2", {
    strings: ["Hall Inside View"],
    typeSpeed: 160,
    backSpeed: 85,
    loop: true
  });
  var typed = new Typed(".typing-3", {
    strings: ["Janak Jyotirmoy"],
    typeSpeed: 190,
    backSpeed: 150,
    loop: true
  });

});