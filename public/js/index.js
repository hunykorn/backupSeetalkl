let addImg = document.querySelector(".addImage")



addImg.addEventListener("click", () => {
    let url = window.location.href;
    window.location.href(url+"/add_user_img");
})