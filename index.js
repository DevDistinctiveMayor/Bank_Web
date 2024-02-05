
let divs = ["Div1", "Div2", "Div3", "Div4", "Div5"];
    let visibleDivId = null;
    function divVisibility(divId) {
      if(screen.width <= 935) {
      if(visibleDivId === divId) {
        visibleDivId = null;
      
      } else {
        visibleDivId = divId;
      }
      hideNonVisibleDivs();
    }
  }

    function hideNonVisibleDivs() {
      if(screen.width <= 935) {
      let i, divId, div;
      for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        if(visibleDivId === divId) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }
      }
    }
  }


      const carousel = document.querySelector(".carousel");
  const backgroundImage = document.querySelector(".bg-image");

  const leftArrow = document.querySelector(".left-arrow");
  const rightArrow = document.querySelector(".right-arrow");

  let currentIndex = 0;
  let prevIndex;
  const images = document.querySelectorAll(".carousel-image");

  const totalImages = Object.keys(images).length;

  // Use this in your project, if you're doing it locally
  // const imageWidth = images[1].getBoundingClientRect().x;

  const imageWidth = 520;
  console.log("getbounding1", images[1].getBoundingClientRect());

  leftArrow.addEventListener("click", () => {
    prevIndex = currentIndex;
    currentIndex = (currentIndex - 1 + totalImages) % totalImages;
    carousel.style.transform = `translateX(-${imageWidth}px)`;
    carousel.insertBefore(images[currentIndex], carousel.firstChild);

    setTimeout(() => {
      carousel.style.transform = "";
      carousel.classList.add("sliding-transition");
      backgroundImage.src = images[currentIndex].src.slice(0, -6) + "1000";
    }, 0);

  // setTimeout(() => {
  //   carousel.classList.remove("sliding-transition");
  // }, 500);
});

rightArrow.addEventListener("click", () => {
  carousel.classList.add("sliding-transition");

  prevIndex = currentIndex;
  currentIndex = (currentIndex + 1) % totalImages;

  // carousel.style.transform = `translateX(-${imageWidth}px)`;
  // backgroundImage.src = images[currentIndex].src.slice(0, -3) + "1000";

  setTimeout(() => {
    carousel.appendChild(images[prevIndex]);
    carousel.classList.remove("sliding-transition");
    carousel.style.transform = "";
  }, 500);
});




      let slideIndex = 0;
      let timeoutId = null;
      const slides = document.getElementsByClassName("mySlides");
      const dots = document.getElementsByClassName("dot");
      
      showSlides();
      function currentSlide(index) {
           slideIndex = index;
           showSlides();
      }
     function plusSlides(step) {
        
        if(step < 0) {
            slideIndex -= 2;
            
            if(slideIndex < 0) {
              slideIndex = slides.length - 1;
            }
        }
        
        showSlides();
     }
      function showSlides() {
        for(let i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
          dots[i].classList.remove('active');
        }
        slideIndex++;
        if(slideIndex > slides.length) {
          slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].classList.add('active');
         if(timeoutId) {
            clearTimeout(timeoutId);
         }
        timeoutId = setTimeout(showSlides, 2000); // Change image every 5 seconds
      } 
   
           
           function calculateAmount(val) {  
               let naira = "&#8358;"
               var tot_price = val * (5);
               var divobj = document.getElementById('tot_amount');  
               divobj.value = 
               document.getElementById("nai").innerHTML = naira + tot_price.toLocaleString();
           }  
           

const carousel_1 = document.querySelector(".carousel1");
const backgroundImage_1 = document.querySelector(".bg-image");

const leftArrow_1 = document.querySelector(".left-arrow1");
const rightArrow_1 = document.querySelector(".right-arrow1");

let currentIndex_1 = 0;
let prevIndex_1;
const images_1 = document.querySelectorAll(".carousel-image1");

const totalImages_1 = Object.keys(images_1).length;


const imageWidth_1 = 520;
console.log("getbounding1", images[1].getBoundingClientRect());

leftArrow_1.addEventListener("click", () => {
  prevIndex_1 = currentIndex_1;
  currentIndex_1 = (currentIndex_1 - 1 + totalImages_1) % totalImages_1;
  carousel_1.style.transform = `translateX(-${imageWidth_1}px)`;
  carousel_1.insertBefore(images_1[currentIndex_1], carousel_1.firstChild);

  setTimeout(() => {
    carousel_1.style.transform = "";
    carousel_1.classList.add("sliding-transition");
    backgroundImage.src = images_1[currentIndex_1].src.slice(0, -3) + "1000";
  }, 10);

  // setTimeout(() => {
  //   carousel.classList.remove("sliding-transition");
  // }, 490);
});

rightArrow_1.addEventListener("click", () => {
  carousel_1.classList.add("sliding-transition");

  prevIndex_1 = currentIndex_1;
  currentIndex_1 = (currentIndex_1 - 1 + totalImages_1) % totalImages_1;

  // carousel.style.transform = `translateX(-${imageWidth}px)`;
  // backgroundImage.src = images[currentIndex].src.slice(0, -3) + "1000";

  setTimeout(() => {
    carousel_1.appendChild(images_1[prevIndex_1]);
    carousel_1.classList.remove("sliding-transition");
    carousel_1.style.transform = "";
  }, 500);
});

 

   



