// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict';

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation');

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach((form) => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();


// for uplode profile pic
const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');


imgDiv.addEventListener("mouseenter", function () {
  uploadBtn.style.display = "block"
})
imgDiv.addEventListener("mouseleave", function () {
  uploadBtn.style.display = "none"
})

// file.addEventListener('change', function () {


//   const choosedFile = this.files[0];

//   if (choosedFile) {

//     const reader = new FileReader(); //FileReader is a predefined function of JS

//     reader.addEventListener('load',  ()=> {
//       img.setAttribute('src', reader.result);
//     });

//     reader.readAsDataURL(choosedFile);
//   }
// })
const WIDTH = 150

file.addEventListener('change', (event) => {
  let image_file = event.target.files[0]


  const reader = new FileReader()
  reader.readAsDataURL(image_file)

  reader.onload = (e) => {
    let image_url = e.target.result
    img.src = image_url

    img.onload = (e) => {
      let canvas = document.createElement("canvas")
      let ratio = WIDTH / e.target.width
      canvas.width = WIDTH
      canvas.height = e.target.height * ratio

      const context = canvas.getContext("2d")
      context.drawImage(img, 0, 0, canvas.width, canvas.height)
      let new_image_url = context.canvas.toDataURL("image/jpeg",90)

     
       img.src = new_image_url
    }
  }

})




//department
