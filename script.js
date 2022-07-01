
/*This function is used when the website is open in mobile view 
and the "sandwitch" drop down menu shows the sub-menus in a smooth slideshow effect*/
function slideshow(){
    var x = document.getElementById('check-class');
    if(x.style.display === "none"){
        x.style.display="block";
    }else{
        x.style.display="none";
    }
}	

            
/*Javascript Function for the Grid and the flexboxes at the recipie part*/
const portfolioItems = document.querySelectorAll('.portfolio-item-wrapper');

  portfolioItems.forEach(portfolioItem => {
    portfolioItem.addEventListener('mouseover', () => {
      console.log(portfolioItem.childNodes[1].classList)
      portfolioItem.childNodes[1].classList.add('image-blur');
    });

    portfolioItem.addEventListener('mouseout', () => {
      console.log(portfolioItem.childNodes[1].classList)
      portfolioItem.childNodes[1].classList.remove('image-blur');
    });
  });