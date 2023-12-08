menuButton = document.querySelector('.menu_button');
sidebarElement = document.querySelector('.sidebar');
bodyElement = document.querySelector('.body');
let sidebarStatus = true;
menuButton.addEventListener('click', () => {
  if(sidebarStatus === true){
    sidebarElement.style.left='-225px';
    bodyElement.style.marginLeft='85px';
    sidebarStatus = false;
  }else{
    sidebarElement.style.left='0';
    bodyElement.style.marginLeft='310px';
    sidebarStatus = true;
  }
});