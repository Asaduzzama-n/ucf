const showNav = () => {
    var nav = document.getElementById('nav');
    // nav.style.display = "none";

    if (nav.style.display === "none") {
        nav.style.display = "block";

    } else {
        nav.style.display = "none";
    }

}



const displayForm = () => {
    const from = document.getElementById('campaignForm');
    from.style.display = 'block';
}

document.getElementById('closeBtn').addEventListener('click', () => {
    document.getElementById('formContainer').style.display = 'none';
    document.getElementById('donateNowBtn').style.display = 'block';

})


