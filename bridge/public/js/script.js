
  let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

// Cek apakah ada status sidebar yang tersimpan di localStorage saat halaman dimuat
const storedSidebarStatus = localStorage.getItem("sidebarStatus");
if (storedSidebarStatus === "open") {
  sidebar.classList.add("open");
}else{
  sidebar.classList.remove("open");
}

closeBtn.addEventListener("click", () => {
  sidebar.classList.toggle("open");
  updateSidebarStatus(); // Simpan status sidebar saat tombol closeBtn diklik
});


// Fungsi untuk menyimpan status sidebar ke localStorage
function updateSidebarStatus() {
  if (sidebar.classList.contains("open")) {
    localStorage.setItem("sidebarStatus", "open");
  } else {
    localStorage.removeItem("sidebarStatus");
  }
}

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
    if(sidebar.classList.contains("open")){
      closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
    }else {
      closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
    }

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
  
}

function toggleSidebar() {
        var headerContainer = document.getElementById("header-container");
        var sidebar = document.getElementById("sidebar");

        if (sidebar.classList.contains("open")) {
            headerContainer.classList.add("narrow-header");
        } else {
            headerContainer.classList.remove("narrow-header");
        }
    }

