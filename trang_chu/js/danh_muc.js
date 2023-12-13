let categoryStatus = false;
document.querySelector('.category_button').addEventListener('click', ()=>{
  if(categoryStatus === true){
    document.querySelector('.category').style='display: none;';
    categoryStatus = false;
  }
  else{
    document.querySelector('.category').style='display: block;';
    categoryStatus = true;
  } 
});